<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/11
 * Time: 10:22
 */

namespace IPLookup;

use IPLookup\Client\ClientInterface;
use IPLookup\Exception\InvalidIpException;

/**
 * Class IPLookupService
 * @package IPLookup
 */
class IPLookupService
{
    /**
     * @var ClientInterface $client ;
     */
    protected $client;

    /**
     * IPLookupService constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->setClient($client);
    }

    /**
     * @param ClientInterface $client
     * @return IPLookupService
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @param string $ip
     * @return string
     * @throws InvalidIpException
     */
    public function lookup($ip)
    {
        if (!preg_match('/\b(?:\d{1,3}\.){3}\d{1,3}\b/', $ip)) {
            throw new InvalidIpException("'$ip' is invalid");
        }
        return $this->client->lookup($ip);
    }

}