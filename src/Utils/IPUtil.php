<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class IP
 *
 * @package Tenolo\Utilities\Utils
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date    03.11.2014
 */
class IPUtil extends BaseUtil
{

    /**
     * @param $address
     *
     * @return bool
     */
    public static function validIPAddress($address)
    {
        return (bool)filter_var($address, FILTER_VALIDATE_IP);
    }

    /**
     * @param $address
     *
     * @return bool
     */
    public static function validIPv4Address($address)
    {
        return (bool)filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    /**
     * @param $address
     *
     * @return bool
     */
    public static function validIPv6Address($address)
    {
        return (bool)filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }

    /**
     * @param string $ip
     *
     * @return string
     */
    public static function getIpRange($ip)
    {
        $ip = ip2long($ip);
        $ipRangeStart = $ip & 0b11111111111111111111111100000000;
        $ipRangeEnd = $ip | 0b00000000000000000000000011111111;

        return $ipRangeStart.'-'.$ipRangeEnd;
    }
}
