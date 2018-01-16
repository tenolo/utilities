<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class Encoding
 *
 * @package Tenolo\Utilities\Utils
 * @author  Nikita Loges
 * @company tenolo GbR
 * @date    26.05.14
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

    /**
     * @param $value
     *
     * @return null|string|string[]
     */
    public static function utf8tify($value)
    {
        $encodings = ['UTF-8', 'ISO-8859-1', 'ASCII'];

        mb_internal_encoding('UTF-8');
        mb_substitute_character(0xfffd); //REPLACEMENT CHARACTER
        mb_detect_order($encodings);

        $stringEncoding = mb_detect_encoding($value, $encodings, true);

        if (!$stringEncoding) {
            $value = null;
            throw new \RuntimeException("Unable to identify character encoding in sanitizer.");
        }

        if (static::isUTF8($stringEncoding, $value)) {
            return $value;
        } else {
            $value = mb_convert_encoding($value, 'UTF-8', $stringEncoding);
            $stringEncoding = mb_detect_encoding($value, $encodings, true);

            if (static::isUTF8($stringEncoding, $value)) {
                return $value;
            } else {
                throw new \RuntimeException("Unable to convert character encoding from ISO-8859-1, or ASCII, to UTF-8 in sanitizer.");
            }
        }
    }

    /**
     * @param $encoding
     * @param $value
     *
     * @return bool
     */
    public static function isUTF8($encoding, $value)
    {
        return (($encoding === 'UTF-8') && (utf8_encode(utf8_decode($value)) === $value));
    }
} 