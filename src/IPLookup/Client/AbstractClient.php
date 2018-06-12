<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:03
 */

namespace IPLookup\Client;

/**
 * Class AbstractClient
 * @package IPLookup\Client
 */
abstract class AbstractClient implements ClientInterface
{
    /**
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * @param string $ip
     * @return Response
     */
    abstract public function request($ip);

}