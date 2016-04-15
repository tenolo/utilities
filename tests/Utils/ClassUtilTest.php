<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Utils\ClassUtil;

/**
 * Class ClassesTest
 * @package Tenolo\Utilities\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 20.10.2014
 */
class ClassUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testHasTrait()
    {
        $result = ClassUtil::hasTrait('\Tenolo\Utilities\Tests\Take\FakeClass', 'Tenolo\Utilities\Tests\Take\FakeTrait');
        $this->assertSame(true, $result);

        $result = ClassUtil::hasTrait('\Tenolo\Utilities\Tests\Take\FakeClass', 'Class\DoNot\Exist');
        $this->assertSame(false, $result);

        $result = ClassUtil::hasTrait('Tenolo\Utilities\Tests\Take\FakeClass', 'Tenolo\Utilities\Tests\Take\FakeTrait');
        $this->assertSame(true, $result);

        $result = ClassUtil::hasTrait('Tenolo\Utilities\Tests\Take\FakeClass', 'Class\DoNot\Exist');
        $this->assertSame(false, $result);

//        $result = ClassUtil::hasTrait(new FakeClass(), 'Tenolo\Utilities\Tests\Take\FakeTrait');
//        $this->assertSame(true, $result);
//
//        $result = ClassUtil::hasTrait(new FakeClass(), '\Tenolo\Utilities\Tests\Take\FakeTrait');
//        $this->assertSame(true, $result);
//
//        $result = ClassUtil::hasTrait(new FakeClass(), 'Class\DoNot\Exist');
//        $this->assertSame(false, $result);
    }
} 