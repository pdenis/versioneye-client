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
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
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
        $this->object = new User();
        $this->hydrator = new SimpleHydrator();

        $this->json = '{
            "fullname":"Pascal DENIS",
            "username":"pdenis",
            "email":"pascal.denis.75@gmail.com",
            "admin":false,
            "deleted":false,
            "notifications":{"new":0,"total":0}
        }';
    }

    public function testLoad()
    {
        $data = json_decode($this->json, true);
        $this->object = $this->hydrator->hydrate(new User(), $data);

        $this->assertEquals($data['fullname'], $this->object->getFullname());
        $this->assertEquals($data['username'], $this->object->getUsername());
        $this->assertEquals($data['admin'], $this->object->getAdmin());
        $this->assertEquals($data['deleted'], $this->object->getDeleted());
        $this->assertEquals($data['notifications'], $this->object->getNotifications());
    }
}