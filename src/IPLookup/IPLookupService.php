<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/11
 * Time: 10:22
 */

namespace IPLookup;

use IPLookup\Client\ClientInterface;

/**
 * Class IPLookupService
 * @package IPLookup
 */
class IPLookupService implements IPLookupServiceInterface
{
    /**
     * IPLookupService constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client = null)
    {
        if (null !== $client) {
            $this->setClient($client);
        }
    }

    /**
     * @var ClientInterface $client ;
     */
    protected $client;

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
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $ip
     * @return string
     */
    public function lookup($ip)
    {
        return $this->getClient()->lookup($ip);
    }

}