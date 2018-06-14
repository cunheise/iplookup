<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:03
 */


namespace IPLookup\Client;


use IPLookup\Response;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\NullCache;


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
     * @var CacheInterface $cache
     */
    private $cache;

    /**
     * @param string $ip
     * @return Response
     */
    abstract public function request($ip);

    /**
     * @return CacheInterface
     */
    public function getCache()
    {
        if ($this->cache == null) {
            $this->cache = new NullCache();
        }
        return $this->cache;
    }

    /**
     * @param CacheInterface $cache
     * @return AbstractClient
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
        return $this;
    }

}