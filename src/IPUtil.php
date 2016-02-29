<?php

namespace Tenolo\Utils;

/**
 * Class IP
 * @package Tenolo\Utils
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 03.11.2014
 */
class IPUtil extends BaseUtil
{

    /**
     * @param $address
     * @return bool
     */
    public static function validIPAddress($address)
    {
        return (bool)filter_var($address, FILTER_VALIDATE_IP);
    }

    /**
     * @param $address
     * @return bool
     */
    public static function validIPv4Address($address)
    {
        return (bool)filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    /**
     * @param $address
     * @return bool
     */
    public static function validIPv6Address($address)
    {
        return (bool)filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
} 