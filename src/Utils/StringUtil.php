<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class String
 *
 * @package Tenolo\Utilities\Utils
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date    29.04.19
 */
class StringUtil extends BaseUtil
{

    /**
     * Pad a string to a certain length with another string
     *
     * @param string $value
     * @param int    $length
     * @param string $padString
     * @param string $side left|right|both
     *
     * @return    string
     */
    public static function pad($value, $length, $padString, $side = 'left')
    {
        switch (self::toLowerCase($side)) {
            case 'right':
            default:
                return str_pad($value, $length, $padString, STR_PAD_RIGHT);
                break;
            case 'left':
                return str_pad($value, $length, $padString, STR_PAD_LEFT);
                break;
            case 'both':
                return str_pad($value, $length, $padString, STR_PAD_BOTH);
                break;
        }
    }

    /**
     * Creates a random hash.
     *
     * @param int $length
     *
     * @return string
     */
    public static function getRandomID($length = null)
    {
        return CryptUtil::getRandomHash('sha512', $length);
    }

    /**
     * alias to php trim() function
     *
     * @param string $text
     * @param string $charlist
     *
     * @return    string
     */
    public static function trim($text, $charlist = " \t\n\r\0\x0B")
    {
        return trim($text, $charlist);
    }

    /**
     *
     * @param string $text
     * @param string $charlist
     *
     * @return string
     */
    public static function ltrim($text, $charlist = " \t\n\r\0\x0B")
    {
        return ltrim($text, $charlist);
    }

    /**
     *
     * @param string $text
     * @param string $charlist
     *
     * @return string
     */
    public static function rtrim($text, $charlist = " \t\n\r\0\x0B")
    {
        return rtrim($text, $charlist);
    }

    /**
     *
     * @param string $string
     *
     * @return string
     */
    public static function escape($string)
    {
        return addslashes($string);
    }

    /**
     *
     * @param array|object $value
     *
     * @return string
     */
    public static function serialize($value)
    {
        return serialize($value);
    }

    /**
     *
     * @param string $value
     *
     * @return array|object
     */
    public static function unserialize($value)
    {
        return @unserialize($value);
    }

    /**
     * @param $string
     *
     * @return bool
     */
    public static function isSerialized($string)
    {
        return (static::unserialize($string) !== false);
    }

    /**
     * Sorts an array of strings and maintain index association.
     *
     * @param array $array
     * @param int   $sort_flags
     *
     * @return    boolean
     */
    public static function sort(array &$array, $sort_flags = SORT_REGULAR)
    {
        return asort($array, $sort_flags);
    }

    /**
     * alias to php strlen() function.
     */
    public static function length($string)
    {
        return mb_strlen($string);
    }

    /**
     * alias to php strpos() function.
     */
    public static function indexOf($hayStack, $needle, $offset = 0, $encoding = null)
    {
        if ($encoding === null) {
            $encoding = mb_internal_encoding();
        }

        return mb_strpos($hayStack, $needle, $offset, $encoding);
    }

    /**
     * alias to php stripos() function.
     */
    public static function indexOfIgnoreCase($hayStack, $needle, $offset = 0, $encoding = null)
    {
        $hayStack = static::toLowerCase($hayStack);
        $needle = static::toLowerCase($needle);

        return static::indexOf($hayStack, $needle, $offset, $encoding);
    }

    /**
     * alias to php strrpos() function.
     */
    public static function lastIndexOf($hayStack, $needle)
    {
        return mb_strrpos($hayStack, $needle);
    }

    /**
     * alias to php substr() function.
     */
    public static function substring($string, $start, $length = null)
    {
        if ($length !== null) {
            return mb_substr($string, $start, $length);
        }

        return mb_substr($string, $start);
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    public static function countWords($string)
    {
        return str_word_count($string);
    }

    /**
     * @param $string
     * @param $limit
     *
     * @return string
     */
    public static function cutWords($string, $limit)
    {
        if (static::countWords($string) > $limit) {
            $words = str_word_count($string, 2);
            $pos = array_keys($words);
            $string = substr($string, 0, $pos[$limit]);
            $string = static::trim($string);
        }

        return $string;
    }

    /**
     * @param string $string
     * @param int    $length
     *
     * @return string
     */
    public static function getFirstNChars($string, $length)
    {
        return static::substring($string, 0, $length);
    }

    /**
     * alias to php strtolower() function.
     */
    public static function toLowerCase($string)
    {
        return mb_strtolower($string);
    }

    /**
     * alias to php strtoupper() function.
     */
    public static function toUpperCase($string)
    {
        return mb_strtoupper($string);
    }

    /**
     * @see lcfirst()
     */
    public static function firstCharToLowerCase($string)
    {
        $string[0] = static::toLowerCase($string[0]);

        return (string)$string;
    }

    /**
     * @see ucfirst()
     */
    public static function firstCharToUpperCase($string, $doFirstAllToLower = false)
    {
        if ($doFirstAllToLower) {
            $string = static::toLowerCase($string);
        }

        $string[0] = static::toUpperCase($string[0]);

        return (string)$string;
    }

    /**
     * @see substr_count()
     */
    public static function countSubstring($hayStack, $needle)
    {
        return mb_substr_count($hayStack, $needle);
    }

    /**
     * @see ucwords()
     */
    public static function wordsToUpperCase($string)
    {
        return mb_convert_case($string, MB_CASE_TITLE);
    }

    /**
     * @see str_replace()
     */
    public static function replace($search, $replace, $subject, &$count = null)
    {
        return str_replace($search, $replace, $subject, $count);
    }

    /**
     * removes a part from a string.
     *
     * @param $search
     * @param $subject
     *
     * @return mixed
     */
    public static function remove($search, $subject)
    {
        return static::replace($search, '', $subject);
    }

    /**
     * removes a part from a string.
     *
     * @param $needle
     * @param $haystack
     *
     * @return string
     */
    public static function removeFromEnd($needle, $haystack)
    {
        if (! static::endsWith($haystack, $needle)) {
            return $haystack;
        }

        $index = (static::lastIndexOf($haystack, $needle));

        return static::substring($haystack, 0, $index);
    }

    /**
     * @param $needle
     * @param $haystack
     *
     * @return string
     */
    public static function removeFromStart($needle, $haystack)
    {
        if (! static::startsWith($haystack, $needle)) {
            return $haystack;
        }

        return static::substring($haystack, static::length($needle));
    }

    /**
     * Checks wether $haystack starts with $needle, or not.
     *
     * @param string       $haystack The string to be checked for starting with $needle
     * @param string|array $needle   The string to be found at the start of $haystack
     * @param boolean      $ci       Case insensitive or not. Default = false.
     *
     * @return    boolean                True, if $haystack starts with $needle, false otherwise.
     */
    public static function startsWith($haystack, $needle, $ci = false)
    {
        if (is_string($needle)) {
            $needle = [$needle];
        }

        if ($ci) {
            $haystack = static::toLowerCase($haystack);

            foreach ($needle as $key => $n) {
                $needle[$key] = static::toLowerCase($n);
            }
        }

        foreach ($needle as $key => $n) {
            if (static::substring($haystack, 0, static::length($n)) === $n) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns true if $haystack ends with $needle or if the length of $needle is 0.
     *
     * @param string  $haystack
     * @param string  $needle
     * @param boolean $ci case insensitive
     *
     * @return    boolean
     */
    public static function endsWith($haystack, $needle, $ci = false)
    {
        if ($ci) {
            $haystack = static::toLowerCase($haystack);
            $needle = static::toLowerCase($needle);
        }

        $length = static::length($needle);

        if ($length === 0) {
            return true;
        }

        return (static::substring($haystack, $length * -1) === $needle);
    }

    /**
     * @param string $haystack
     * @param string $needle
     * @param bool   $ci
     *
     * @return bool
     */
    public static function contains($haystack, $needle, $ci = false)
    {
        $found = false;

        if (! is_array($needle)) {
            $needle = [$needle];
        }

        if (count($needle)) {
            foreach ($needle as $n) {
                if ($ci) {
                    $value = static::indexOfIgnoreCase($haystack, $n);
                } else {
                    $value = static::indexOf($haystack, $n);
                }

                if ($value !== false) {
                    $found = true;
                }
            }
        }

        return $found;
    }

    /**
     * @see preg_replace
     */
    public static function replaceReg($pattern, $replace, $subject, $limit = -1, &$count = null)
    {
        return preg_replace($pattern, $replace, $subject, $limit, $count);
    }

    /**
     * @see stripslashes()
     */
    public static function stripSlashes($str)
    {
        return stripslashes($str);
    }

    /**
     * @see nl2br()
     */
    public static function nl2br($string)
    {
        return nl2br($string);
    }


    /**
     * Convert a value to studly caps case.
     *
     * @param string $str
     *
     * @return string
     */
    public static function studlyCase($str)
    {
        $str = ucwords(static::replace(['-', '_'], ' ', $str));

        return static::replace(' ', '', $str);
    }

    /**
     * Convert a value to camel case.
     *
     * @param string $str
     *
     * @return string
     */
    public static function camelCase($str)
    {
        return lcfirst(static::studlyCase($str));
    }
}
