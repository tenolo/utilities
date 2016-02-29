<?php

namespace Tenolo\Utils\Tests;

use Tenolo\Utils\EntityUtil;

/**
 * Class EntityTest
 * @package Tenolo\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 20.10.2014
 */
class EntityUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testGetMarkerName()
    {
//        $result = EntityUtil::getMarkerName('Tenolo\Bundle\CoreBundle\Tests\Take\FakeClass');
//        $this->assertEquals('FakeClass:marker', $result);
//
//        $result = EntityUtil::getMarkerName(new FakeClass());
//        $this->assertEquals('FakeClass:marker', $result);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetMarkerNameException()
    {
        EntityUtil::getMarkerName('Class\DoNot\Exist');
    }
} 