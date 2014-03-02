<?php

/*
 * This file is part of the Snide osrc-client package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\VersionEye\Model;

use Snide\VersionEye\Hydrator\SimpleHydrator;

/**
 * Class RepositoryTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Project
     */
    protected $object;

    /**
     * Json data
     *
     * @var string
     */
    protected $json;

    /**
     * @var SimpleHydrator
     */
    protected $hydrator;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Project();
        $this->hydrator = new SimpleHydrator();

        $this->json = '
        {
            "id":"53135ec0ec1375fa94000057",
            "project_key":"composer_snide_php_versioneye_client_1",
            "name":"snide\/php-versioneye-client",
            "project_type":"composer",
            "private":false,
            "period":"weekly",
            "source":"upload",
            "dep_number":3,
            "out_number":0,
            "created_at":"2014-03-02T16:39:28Z",
            "updated_at":"2014-03-02T17:04:21Z",
            "dependencies":[{"name":"php","prod_key":"php","group_id":null,"artifact_id":null,"version_current":"5.5.9","version_requested":"5.5.9","comparator":">=","unknown":false,"outdated":false,"stable":null},{"name":"guzzle\/http","prod_key":"guzzle\/http","group_id":null,"artifact_id":null,"version_current":"3.8.1","version_requested":"3.8.1","comparator":"=","unknown":false,"outdated":false,"stable":null},{"name":"phpunit\/phpunit","prod_key":"phpunit\/phpunit","group_id":null,"artifact_id":null,"version_current":"3.7.32","version_requested":"3.7.32","comparator":"=","unknown":false,"outdated":false,"stable":null},{"name":"php","prod_key":"php","group_id":null,"artifact_id":null,"version_current":"5.5.9","version_requested":"5.5.9","comparator":">=","unknown":false,"outdated":false,"stable":null},{"name":"guzzle\/http","prod_key":"guzzle\/http","group_id":null,"artifact_id":null,"version_current":"3.8.1","version_requested":"3.8.1","comparator":"=","unknown":false,"outdated":false,"stable":null},{"name":"phpunit\/phpunit","prod_key":"phpunit\/phpunit","group_id":null,"artifact_id":null,"version_current":"3.7.32","version_requested":"3.7.32","comparator":"=","unknown":false,"outdated":false,"stable":null}]}';
    }

    public function testLoad()
    {
        $data = json_decode($this->json, true);
        $this->object = $this->hydrator->hydrate(new Project(), $data);

        $this->assertEquals($data['id'], $this->object->getId());
        $this->assertEquals($data['project_key'], $this->object->getProjectKey());
        $this->assertEquals($data['name'], $this->object->getName());
        $this->assertEquals($data['project_type'], $this->object->getProjectType());
        $this->assertEquals($data['private'], $this->object->getPrivate());
        $this->assertEquals($data['period'], $this->object->getPeriod());
        $this->assertEquals($data['source'], $this->object->getSource());
        $this->assertEquals($data['dep_number'], $this->object->getDepNumber());
        $this->assertEquals($data['out_number'], $this->object->getOutNumber());
        $this->assertEquals(new \DateTime($data['created_at']), $this->object->getCreatedAt());
        $this->assertEquals(new \DateTime($data['updated_at']), $this->object->getUpdatedAt());
        $this->assertEquals($data['dependencies'], $this->object->getDependencies());
    }
}
