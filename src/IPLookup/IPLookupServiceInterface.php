<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/11
 * Time: 10:27
 */

namespace IPLookup;


use IPLookup\Client\ClientInterface;

interface IPLookupServiceInterface
{
    /**
     * @param ClientInterface $client
     * @return mixed
     */
    public function setClient(ClientInterface $client);

    /**
     * @return ClientInterface
     */
    public function getClient();

    /**
     * @param string $ip
     * @return string
     */
    public function lookup($ip);
}