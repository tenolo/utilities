<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class Crypt
 *
 * @package Tenolo\Utilities\Utils
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 26.05.14
 */
class CryptUtil extends BaseUtil
{

    /**
     * encrypts the given value.
     *
     * @param    string $value
     * @param    string $method
     *
     * @return    string
     */
    public static function encrypt($value, $method = 'sha512')
    {
        switch ($method) {
            case 'md5':
                return hash('md5', $value);
            case 'crypt':
                return crypt($value);
            case 'sha1':
                return hash('sha1', $value);
            case 'sha256':
                return hash('sha256', $value);
            case 'sha384':
                return hash('sha384', $value);
            default:
            case 'sha512':
                return hash('sha512', $value);
        }
    }

    /**
     *
     */
    public static function md5($value)
    {
        return self::encrypt($value, 'md5');
    }

    /**
     *
     */
    public static function sha1($value)
    {
        return self::encrypt($value, 'sha1');
    }

    /**
     * alias to php sha1() function.
     *
     * @param    string $value
     *
     * @return    string        $hash
     */
    public static function getHash($value)
    {
        return self::sha1($value);
    }

    /**
     *
     */
    public static function sha256($value)
    {
        return self::encrypt($value, 'sha256');
    }

    /**
     *
     */
    public static function sha512($value)
    {
        return self::encrypt($value, 'sha512');
    }

    /**
     * generates a random hash.
     *
     * @param    string $method
     * @param    integer $length
     *
     * @return    string        $hash
     */
    public static function getRandomHash($method = 'sha1', $length = null)
    {
        $hash = static::encrypt(MathUtil::getRandomID(), $method);

        if ($length > 0) {
            $hash = StringUtil::getFirstNChars($hash, $length);
        }

        return $hash;
    }
} 