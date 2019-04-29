<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class Color
 *
 * @package Tenolo\Utilities\Utils
 * @author  Nikita Loges
 * @date    23.12.2014
 */
class ColorUtil extends BaseUtil
{

    /**
     * @param $hex
     *
     * @return array
     */
    public static function hex2rgb($hex)
    {
        $color = str_replace('#', '', $hex);
        $rgb = [
            'r' => hexdec(substr($color, 0, 2)),
            'g' => hexdec(substr($color, 2, 2)),
            'b' => hexdec(substr($color, 4, 2))
        ];

        return $rgb;
    }

    /**
     * @param     $var1
     * @param int $g
     * @param int $b
     *
     * @return array
     */
    public static function rgb2cmyk($var1, $g = 0, $b = 0)
    {
        if (is_array($var1)) {
            $r = $var1['r'];
            $g = $var1['g'];
            $b = $var1['b'];
        } else {
            $r = $var1;
        }
        $cyan = 255 - $r;
        $magenta = 255 - $g;
        $yellow = 255 - $b;
        $black = min($cyan, $magenta, $yellow);
        $cyan = @(($cyan - $black) / (255 - $black)) * 255;
        $magenta = @(($magenta - $black) / (255 - $black)) * 255;
        $yellow = @(($yellow - $black) / (255 - $black)) * 255;

        return [
            'c' => $cyan / 255,
            'm' => $magenta / 255,
            'y' => $yellow / 255,
            'k' => $black / 255
        ];
    }

    /**
     * @param $c
     * @param $m
     * @param $y
     * @param $k
     *
     * @return array
     */
    public static function cmyk2rgb($c, $m, $y, $k)
    {
        $red = $c + $k;
        $green = $m + $k;
        $blue = $y + $k;
        $red = ($red - 100) * (-1);
        $green = ($green - 100) * (-1);
        $blue = ($blue - 100) * (-1);
        $red = round($red / 100 * 255, 0);
        $green = round($green / 100 * 255, 0);
        $blue = round($blue / 100 * 255, 0);
        $c = [];
        $c['r'] = $red;
        $c['g'] = $green;
        $c['b'] = $blue;

        return $c;
    }

    /**
     * @param $hex
     *
     * @return array
     */
    public static function hex2cmyk($hex)
    {
        return self::rgb2cmyk(self::hex2rgb($hex));
    }

    /**
     *
     * http://serennu.com/colour/rgbtohsl.php
     * @param $hex
     *
     * @return array
     */
    public static function hex2hsl($hex)
    {
        $rgb = self::hex2rgb($hex);
        $var_r = $rgb['r'] / 255;
        $var_g = $rgb['g'] / 255;
        $var_b = $rgb['b'] / 255;

        $var_min = min($var_r, $var_g, $var_b);
        $var_max = max($var_r, $var_g, $var_b);
        $del_max = $var_max - $var_min;

        $l = ($var_max + $var_min) / 2.0;

        if ($del_max == 0) {
            $h = 0;
            $s = 0;
        } else {
            if ($l < 0.5) {
                $s = $del_max / ($var_max + $var_min);
            } else {
                $s = $del_max / (2 - $var_max - $var_min);
            }

            $del_r = ((($var_max - $var_r) / 6) + ($del_max / 2)) / $del_max;
            $del_g = ((($var_max - $var_g) / 6) + ($del_max / 2)) / $del_max;
            $del_b = ((($var_max - $var_b) / 6) + ($del_max / 2)) / $del_max;

            if ($var_r == $var_max) {
                $h = $del_b - $del_g;
            } elseif ($var_g == $var_max) {
                $h = (1 / 3) + $del_r - $del_b;
            } elseif ($var_b == $var_max) {
                $h = (2 / 3) + $del_g - $del_r;
            }

            if ($h < 0) {
                $h += 1;
            }

            if ($h > 1) {
                $h -= 1;
            }
        }

        return [
            'h' => $h,
            's' => $s,
            'l' => $l
        ];
    }
}
