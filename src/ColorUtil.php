<?php
namespace Tenolo\Utils;

/**
 * Class Color
 * @package Tenolo\Utils
 * @author Nikita Loges
 * @date 23.12.2014
 */
class ColorUtil extends BaseUtil
{

    /**
     * @param $hex
     * @return array
     */
    public static function hex2rgb($hex)
    {
        $color = str_replace('#', '', $hex);
        $rgb = array(
            'r' => hexdec(substr($color, 0, 2)),
            'g' => hexdec(substr($color, 2, 2)),
            'b' => hexdec(substr($color, 4, 2))
        );
        return $rgb;
    }

    /**
     * @param $var1
     * @param int $g
     * @param int $b
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
        return array(
            'c' => $cyan / 255,
            'm' => $magenta / 255,
            'y' => $yellow / 255,
            'k' => $black / 255
        );
    }

    /**
     * @param $c
     * @param $m
     * @param $y
     * @param $k
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
        $c = array();
        $c['r'] = $red;
        $c['g'] = $green;
        $c['b'] = $blue;
        return $c;
    }

    /**
     * @param $hex
     * @return array
     */
    public static function hex2cmyk($hex)
    {
        return self::rgb2cmyk(self::hex2rgb($hex));
    }
}