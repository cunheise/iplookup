<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:13
 */

namespace IPLookup;

/**
 * Class Util
 * @package IPLookup
 */
class Util
{
    /**
     * @return string
     */
    public static function getCurrentIP()
    {
        foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED'] as $key) {
            if ($ip = getenv($key)) {
                return $ip;
            }
        }
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    }
}