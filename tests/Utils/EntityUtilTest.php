<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Utils\EntityUtil;

/**
 * Class EntityTest
 * @package Tenolo\Utilities\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date 20.10.2014
 */
class EntityUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testGetMarkerName()
    {
//        $result = EntityUtil::getMarkerName('Tenolo\Utilities\Tests\Take\FakeClass');
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
