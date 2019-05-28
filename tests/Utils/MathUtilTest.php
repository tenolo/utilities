<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Utils\MathUtil;

/**
 * Class MathTest
 * @package Tenolo\Utilities\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date 20.10.2014
 */
class MathUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testIncreaseByPercentage()
    {
        $result = MathUtil::increaseByPercentage(0, 60);
        $this->assertSame(0, $result);

        $result = MathUtil::increaseByPercentage(100, 60);
        $this->assertSame(160, $result);

        $result = MathUtil::increaseByPercentage(62, 37);
        $this->assertSame(84.94, $result);

        $result = MathUtil::increaseByPercentage(-100, 60);
        $this->assertSame(-160, $result);

        $result = MathUtil::increaseByPercentage(-62, 37);
        $this->assertSame(-84.94, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIncreaseByPercentageException()
    {
        $result = MathUtil::increaseByPercentage(0, -1);
    }

    public function testRound()
    {
        $result = MathUtil::round(2.2);
        $this->assertSame(2, $result);

        $result = MathUtil::round(2.5);
        $this->assertSame(3, $result);

        $result = MathUtil::round(2.7);
        $this->assertSame(3, $result);

        $result = MathUtil::round(2.75, 1);
        $this->assertSame(2.8, $result);

        $result = MathUtil::round(2.74, 1);
        $this->assertSame(2.7, $result);
    }

    public function testFloor()
    {
        $result = MathUtil::floor(2.9);
        $this->assertSame(2, $result);
    }

    public function testCeil()
    {
        $result = MathUtil::ceil(2.01);
        $this->assertSame(3, $result);
    }

    public function testSum()
    {
        $result = MathUtil::sum(2, 5);
        $this->assertSame(7, $result);

        $result = MathUtil::sum(2.5, 5);
        $this->assertSame(7.5, $result);

        $result = MathUtil::sum(2, 5, 10);
        $this->assertSame(17, $result);

        $result = MathUtil::sum(2, 5, 'kinder');
        $this->assertSame(7, $result);

        $result = MathUtil::sum(2, 5, '1');
        $this->assertSame(8, $result);

        $result = MathUtil::sum(2.5, 5, '1');
        $this->assertSame(8.5, $result);
    }
} 
