<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class Encoding
 *
 * @package Tenolo\Utilities\Utils
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 26.05.14
 */
class EncodeUtil extends BaseUtil
{

    /**
     * @see utf8_encode
     */
    public static function encodeUTF8($string)
    {
        return @utf8_encode($string);
    }

    /**
     * @see utf8_decode
     */
    public static function decodeUTF8($string)
    {
        return @utf8_decode($string);
    }

    /**
     * @see urlencode
     */
    public static function encodeURL($string)
    {
        return @urlencode($string);
    }

    /**
     * @see urldecode
     */
    public static function decodeURL($string)
    {
        $string = StringUtil::replace('&nbsp;', ' ', $string); // convert non-breaking spaces to ascii 32; not ascii 160
        return @urldecode($string);
    }

    /**
     * @see htmlspecialchars
     */
    public static function encodeHTML($string)
    {
        return @htmlspecialchars($string, ENT_COMPAT, 'UTF-8');
    }

    /**
     * @see html_entity_decode
     */
    public static function decodeHTML($string)
    {
        $string = str_ireplace('&nbsp;', ' ', $string); // convert non-breaking spaces to ascii 32; not ascii 160
        return @html_entity_decode($string, ENT_COMPAT, 'UTF-8');
    }
} 