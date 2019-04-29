<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class Math
 * @package Tenolo\Utilities\Utils
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 26.05.14
 */
class MathUtil extends BaseUtil
{

    /**
     * @return int
     */
    public static function getUniqueID()
    {
        return uniqid(mt_rand(), true);
    }

    /**
     * @return string
     */
    public static function getRandomID()
    {
        return microtime() . static::getUniqueID();
    }

    /**
     * @param $value
     * @param $percentage
     */
    public static function increaseByPercentage($value, $percentage)
    {
        if ($percentage < 0) {
            throw new \InvalidArgumentException('percentage has to be greater than 0');
        }

        if ($value == 0) {
            return $value;
        }

        return $value + (($value / 100) * $percentage);
    }

    /**
     * @see round()
     */
    public static function round($value, $precision = 0, $mode = PHP_ROUND_HALF_UP)
    {
        $round = round($value, $precision, $mode);

        if ($precision == 0) {
            $round = (int)$round;
        }

        return $round;
    }

    /**
     * @see floor()
     */
    public static function floor($value)
    {
        return (int)floor($value);
    }

    /**
     * @see ceil()
     */
    public static function ceil($value)
    {
        return (int)ceil($value);
    }

    /**
     * @return int|string
     */
    public static function sum()
    {
        $sum = 0;
        $arguments = func_get_args();

        foreach ($arguments as $argument) {
            if (is_numeric($argument)) {
                $sum += $argument;
            }
        }

        return $sum;
    }
}
