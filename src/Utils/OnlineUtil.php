<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class OnlineUtil
 *
 * @package Tenolo\Utilities\Utils
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
class OnlineUtil extends BaseUtil
{

    /**
     * @param $url
     *
     * @return bool
     */
    public static function urlExist($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }

        curl_close($ch);

        return $status;
    }
}
