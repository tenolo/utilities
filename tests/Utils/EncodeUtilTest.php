<?php

namespace Tenolo\Utilities\Utils\Tests;

use Tenolo\Utilities\Utils\EncodeUtil;

/**
 * Class EncodingTest
 * @package Tenolo\Utilities\Utils\Tests
 * @author Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date 20.10.2014
 */
class EncodeUtilTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @see utf8_encode
     */
    public function testEncodeURL()
    {
        $result = EncodeUtil::encodeURL('http://php.net/manual/de/function.urlencode.php?a=b&c=d');
        $this->assertSame('http%3A%2F%2Fphp.net%2Fmanual%2Fde%2Ffunction.urlencode.php%3Fa%3Db%26c%3Dd', $result);
    }

    /**
     * @see utf8_encode
     */
    public function testDecodeURL()
    {
        $result = EncodeUtil::decodeURL('http%3A%2F%2Fphp.net%2Fmanual%2Fde%2Ffunction.urlencode.php%3Fa%3Db%26c%3Dd');
        $this->assertSame('http://php.net/manual/de/function.urlencode.php?a=b&c=d', $result);
    }

    /**
     * @see utf8_encode
     */
    public function testEncodeHTML()
    {
        $result = EncodeUtil::encodeHTML('<div>');
        $this->assertSame('&lt;div&gt;', $result);
    }

    /**
     * @see utf8_encode
     */
    public function testDecodeHTML()
    {
        $result = EncodeUtil::decodeHTML('&lt;div&gt;');
        $this->assertSame('<div>', $result);
    }
}
