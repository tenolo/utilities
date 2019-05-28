<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Tests\TestAsset\FakeClass;
use Tenolo\Utilities\Tests\TestAsset\FakeTrait;
use Tenolo\Utilities\Utils\ClassUtil;

/**
 * Class ClassesTest
 *
 * @package Tenolo\Utilities\Utils\Tests
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date    29.04.19
 */
class ClassUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testHasTrait()
    {
        $result = ClassUtil::hasTrait(FakeClass::class, FakeTrait::class);
        $this->assertSame(true, $result);

        $result = ClassUtil::hasTrait(FakeClass::class, 'Invalid\Trait');
        $this->assertSame(false, $result);

        $result = ClassUtil::hasTrait(
            '\Tenolo\Utilities\Tests\TestAsset\FakeClass',
            '\Tenolo\Utilities\Tests\TestAsset\FakeTrait'
        );
        $this->assertSame(true, $result);

        $result = ClassUtil::hasTrait(
            '\Tenolo\Utilities\Tests\TestAsset\FakeClass',
            '\Invalid\Trait'
        );
        $this->assertSame(false, $result);

        $result = ClassUtil::hasTrait(new FakeClass(), FakeTrait::class);
        $this->assertSame(true, $result);

        $result = ClassUtil::hasTrait(new FakeClass(), '\Tenolo\Utilities\Tests\TestAsset\FakeTrait');
        $this->assertSame(true, $result);

        $result = ClassUtil::hasTrait(new FakeClass(), 'Invalid\Trait');
        $this->assertSame(false, $result);
    }
}
