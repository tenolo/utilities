<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Utils\StringUtil;

/**
 * Class StringTest
 * @package Tenolo\Utilities\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 20.10.2014
 */
class StringUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testPad()
    {
        $result = StringUtil::pad('a', 7, 'b');
        $this->assertEquals('bbbbbba', $result);

        $result = StringUtil::pad('a', 7, 'b', 'right');
        $this->assertEquals('abbbbbb', $result);

        $result = StringUtil::pad('a', 7, 'b', 'both');
        $this->assertEquals('bbbabbb', $result);
    }

    public function testTrim()
    {
        $result = StringUtil::trim(' test ');
        $this->assertEquals('test', $result);
    }

    public function testLtrim()
    {
        $result = StringUtil::ltrim(' test ');
        $this->assertEquals('test ', $result);
    }

    public function testRtrim()
    {
        $result = StringUtil::rtrim(' test ');
        $this->assertEquals(' test', $result);
    }

    public function testEscape()
    {
        $result = StringUtil::escape("Ist dein Name wirklich O'reilly?");
        $this->assertEquals("Ist dein Name wirklich O\\'reilly?", $result);
    }

    public function testSerialize()
    {
        $result = StringUtil::serialize(array('test' => 1));
        $this->assertEquals('a:1:{s:4:"test";i:1;}', $result);
    }

    public function testUnserialize()
    {
        $result = StringUtil::unserialize('a:1:{s:4:"test";i:1;}');
        $this->assertEquals(array('test' => 1), $result);
    }

    public function testIsSerialized()
    {
        $result = StringUtil::isSerialized('a:1:{s:4:"test";i:1;}');
        $this->assertEquals(true, $result);

        $result = StringUtil::isSerialized('test');
        $this->assertEquals(false, $result);

        $result = !StringUtil::isSerialized('a:1:{s:4:"test";i:1;}');
        $this->assertEquals(false, $result);

        $result = !StringUtil::isSerialized('test');
        $this->assertEquals(true, $result);
    }

    public function testSort()
    {
        $array = array("Zitrone", "Orange", "Banane", "Apfel");
        $result = StringUtil::sort($array);

        $this->assertEquals(array(
            3 => "Apfel",
            2 => "Banane",
            1 => "Orange",
            0 => "Zitrone"
        ), $array);
        $this->assertEquals(true, $result);
    }

    public function testLength()
    {
        $result = StringUtil::length('test');
        $this->assertSame(4, $result);
    }

    public function testIndexOf()
    {
        $result = StringUtil::indexOf('abbbbaaaaab', 'a', 2);
        $this->assertSame(5, $result);

        $result = StringUtil::indexOf('abbbbAaaaab', 'b');
        $this->assertSame(1, $result);
    }

    public function testIndexOfIgnoreCase()
    {
        $result = StringUtil::indexOfIgnoreCase('abbbbAaaaab', 'a', 2);
        $this->assertSame(5, $result);
    }

    public function testLastIndexOf()
    {
        $result = StringUtil::lastIndexOf('abbbbAaaaab', 'a');
        $this->assertSame(9, $result);
    }

    public function testSubstring()
    {
        $result = StringUtil::substring('Ich bin ein Test', 4, 3);
        $this->assertSame('bin', $result);

        $result = StringUtil::substring('Ich bin ein Test', 12);
        $this->assertSame('Test', $result);
    }

    public function testGetFirstNChars()
    {
        $result = StringUtil::getFirstNChars('Ich bin ein Test', 7);
        $this->assertSame('Ich bin', $result);
    }

    public function testFirstCharToLowerCase()
    {
        $result = StringUtil::firstCharToLowerCase('Ich bin ein Test');
        $this->assertSame('ich bin ein Test', $result);
    }

    public function testFirstCharToUpperCase()
    {
        $result = StringUtil::firstCharToUpperCase('ich bin ein test');
        $this->assertSame('Ich bin ein test', $result);

        $result = StringUtil::firstCharToUpperCase('ich bin ein Test', true);
        $this->assertSame('Ich bin ein test', $result);
    }

    public function testCountSubstring()
    {
        $result = StringUtil::countSubstring('Ich bin ein Test', 'ein');
        $this->assertSame(1, $result);
    }

    public function testWordsToUpperCase()
    {
        $result = StringUtil::wordsToUpperCase('ich bin ein test');
        $this->assertSame('Ich Bin Ein Test', $result);
    }

    public function testReplace()
    {
        $result = StringUtil::replace('ein', 'mehrere', 'Ich bin ein Test');
        $this->assertSame('Ich bin mehrere Test', $result);
    }

    public function testRemove()
    {
        $result = StringUtil::remove('ein', 'Ich bin ein Test');
        $this->assertSame('Ich bin  Test', $result);
    }

    public function testRemoveFromEnd()
    {
        $result = StringUtil::removeFromEnd('ein', 'Ich bin ein Test');
        $this->assertSame('Ich bin ein Test', $result);

        $result = StringUtil::removeFromEnd('Test', 'Ich bin ein Test');
        $this->assertSame('Ich bin ein ', $result);
    }

    public function testRemoveFromStart()
    {
        $result = StringUtil::removeFromStart('Ich', 'Ich bin ein Test');
        $this->assertSame(' bin ein Test', $result);

        $result = StringUtil::removeFromStart('bin', 'Ich bin ein Test');
        $this->assertSame('Ich bin ein Test', $result);
    }

    public function testStartsWith()
    {
        $result = StringUtil::startsWith('Ich bin ein Test', 'Ich');
        $this->assertSame(true, $result);

        $result = StringUtil::startsWith('Ich bin ein Test', 'ich', true);
        $this->assertSame(true, $result);

        $result = StringUtil::startsWith('Ich bin ein Test', 'bin');
        $this->assertSame(false, $result);
    }

    public function testEndsWith()
    {
        $result = StringUtil::endsWith('Ich bin ein Test', 'Test');
        $this->assertSame(true, $result);

        $result = StringUtil::endsWith('Ich bin ein Test', 'test', true);
        $this->assertSame(true, $result);

        $result = StringUtil::endsWith('Ich bin ein Test', 'ein');
        $this->assertSame(false, $result);
    }

    public function testContains()
    {
        $result = StringUtil::contains('Ich bin ein Test', 'Test');
        $this->assertSame(true, $result);

        $result = StringUtil::contains('Ich bin ein Test', 'test', true);
        $this->assertSame(true, $result);

        $result = StringUtil::contains('Ich bin ein Test', 'Wir');
        $this->assertSame(false, $result);
    }
} 