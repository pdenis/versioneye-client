<?php

/*
 * This file is part of the Snide osrc-httpClient package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\VersionEye;

use Snide\VersionEye\Model\Project;
use Snide\VersionEye\Model\User;
use Snide\VersionEye\Hydrator\SimpleHydrator;
use Guzzle\Http\Client as GuzzleClient;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class Client
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Client
{
    /**
     * API URL
     *
     * @var string
     */
    protected $endpoint = 'https://www.versioneye.com/api';

    /**
     * Object Hydrator
     *
     * @var SimpleHydrator
     */
    protected $hydrator;

    /**
     * Guzzle Client
     *
     * @var \Guzzle\Http\Client
     */
    protected $httpClient;

    /**
     * API Key
     * @var string
     */
    protected $apiKey;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param Hydrator\SimpleHydrator $hydrator
     */
    public function __construct($apiKey = '', SimpleHydrator $hydrator = null)
    {
        if (null === $hydrator) {
            $hydrator = new SimpleHydrator();
        }

        if ($apiKey) {
            $this->setApiKey($apiKey);
        }

        $this->setHydrator($hydrator);

        $this->httpClient = new GuzzleClient($this->endpoint, array());
    }

    /**
     * Fetch data from Projects
     *
     * @return array
     */
    public function fetchProjects()
    {
        $response = $this->getResponse('get', 'v2/projects');
        $projects = array();
        if(is_array($response)) {
            foreach($response as $data) {
                $projects[] = $this->hydrator->hydrate(new Project(), $data);
            }
        }

        return $projects;
    }

    /**
     * Fetch data from Project
     *
     * @param Model\Project $project
     * @return Project
     */
    public function fetchProject(Project $project)
    {
        $response = $this->getResponse(
            'get',
            sprintf('v2/projects/%s', $project->getProjectKey())
        );

        return $this->hydrator->hydrate($project, $response);
    }

    /**
     * Update a project
     *
     * @param Project $project
     * @param string $composerJson path
     * @return array
     */
    public function updateProject(Project $project, $composerJson)
    {
        $response = $this->getResponse(
            'post',
            sprintf('v2/projects/%s', $project->getProjectKey()),
            array(),
            array('project_file' => $composerJson)
        );

        return $this->hydrator->hydrate($project, $response);
    }

    /**
     * Create a project
     *
     * @param string $composerJson
     * @return Project
     */
    public function createProject($composerJson)
    {
        $response = $this->getResponse('post', 'v2/projects', array(), array('upload' => $composerJson));

        return $this->hydrator->hydrate(new Project(), $response);
    }

    /**
     * Fetch me
     *
     * @return User
     */
    public function fetchMe()
    {
        $response = $this->getResponse('get', 'v2/me', array());

        return $this->hydrator->hydrate(new User(), $response);
    }

    /**
     * Fetch a user by username
     *
     * @param User $user
     * @return User
     */
    public function fetchUser(User $user)
    {
        $response = $this->getResponse(
            'get',
            sprintf('v2/users/%s', $user->getUsername())
        );

        return $this->hydrator->hydrate($user, $response);
    }

    /**
     * Ping service API
     *
     * @return boolean
     */
    public function pingService()
    {
        $response = $this->getResponse('get', 'v2/services/ping');

        return $response['success'];
    }

    /**
     * Get API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set API key
     *
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Getter hydrator
     *
     * @return SimpleHydrator
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * Setter hydrator
     *
     * @param SimpleHydrator $hydrator
     */
    public function setHydrator(SimpleHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * Add Http client subscriber
     *
     * @param EventSubscriberInterface $subscriber
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        $this->httpClient->addSubscriber($subscriber);
    }

    /**
     * Get Response from API
     * Response is an array (Result of json_decode)
     *
     * @param string $uri API URI
     * @param array $queryParams Query params
     * @return mixed
     */
    protected function getResponse($method = 'get', $uri, array $queryParams = array(), $postFiles = array())
    {
        $queryParams['api_key'] = $this->apiKey;
        $this->httpClient->setDefaultOption('query', $queryParams);
        $request = $this->httpClient->$method($uri);

        if(!empty($postFiles)) {
            $request->addPostFiles($postFiles);
        }

        print_r(json_encode($request->send()->json()));
        return $request->send()->json();
    }
}
