<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/11
 * Time: 10:56
 */

namespace IPLookup\Client;

use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\NullCache;

/**
 * Class AbstractClient
 * @package IPLookup\Client
 */
abstract class AbstractClient implements ClientInterface
{
    /**
     * @var CacheInterface $cache ;
     */
    protected $cache;

    /**
     * AbstractClient constructor.
     * @param CacheInterface|null $cache
     */
    public function __construct(CacheInterface $cache = null)
    {
        $this->setCache($cache);
    }

    /**
     * @return CacheInterface
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param CacheInterface $cache
     */
    public function setCache($cache)
    {
        if (null === $cache) {
            $this->cache = new NullCache();
        } else {
            $this->cache = $cache;
        }
        return $this;
    }

    /**
     * @param string $ip
     * @return string
     */
    public function lookup($ip)
    {
        $cache = $this->getCache();
        $key = md5($ip);
        $data = $cache->get($key, null);
        if (null === $data) {
            $data = $this->doLookup($ip);
            $cache->set($key, $data);
        }
        return $data;
    }

    /**
     * @param $ip
     * @return string
     */
    abstract protected function doLookup($ip);
}