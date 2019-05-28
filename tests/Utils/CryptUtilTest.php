<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Utils\CryptUtil;

/**
 * Class CryptTest
 * @package Tenolo\Utilities\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date 20.10.2014
 */
class CryptTest extends \PHPUnit_Framework_TestCase
{

    public function testMd5()
    {
        $result = CryptUtil::md5('test');

        $this->assertEquals('098f6bcd4621d373cade4e832627b4f6', $result);
    }

    public function testSha1()
    {
        $result = CryptUtil::sha1('test');

        $this->assertEquals('a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', $result);
    }

    public function testSha256()
    {
        $result = CryptUtil::sha256('test');

        $this->assertEquals('9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', $result);
    }

    public function testSha512()
    {
        $result = CryptUtil::sha512('test');

        $this->assertEquals('ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', $result);
    }

    public function testGetHash()
    {
        $result = CryptUtil::getHash('test');

        $this->assertEquals(CryptUtil::sha1('test'), $result);
    }
} 
