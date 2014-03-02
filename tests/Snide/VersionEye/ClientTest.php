<?php

/*
 * This file is part of the Snide osrc-client package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\VersionEye;

use Snide\VersionEye\Hydrator\SimpleHydrator;
use Snide\VersionEye\Model\User;

/**
 * Class ClientTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Client();
    }

    public function testHydrator()
    {
        $this->assertInstanceOf('Snide\VersionEye\Hydrator\SimpleHydrator', $this->object->getHydrator());
        $hydrator = new SimpleHydrator();
        $this->object = new Client(null, $hydrator);
        $this->assertEquals($hydrator, $this->object->getHydrator());
    }
}