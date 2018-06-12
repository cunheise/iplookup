<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 10:45
 */

namespace IPLookup\Client;

/**
 * Interface ClientInterface
 * @package IPLookup\Client
 */
interface ClientInterface
{
    /**
     * @param string $ip
     * @return Response
     */
    public function request($ip);
}