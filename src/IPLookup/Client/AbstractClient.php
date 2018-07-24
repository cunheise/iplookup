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
     * @var array $headers
     */
    protected $headers = [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
    ];
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
        if ($cache == null) {
            $cache = new NullCache();
        }
        $this->setCache($cache);
    }

    /**
     * @param CacheInterface $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @param string $ip
     * @return string
     */
    public function lookup($ip)
    {
        $key = md5($ip);
        if ($this->cache->has($key)) {
            $data = $this->cache->get($key);
        } else {
            $data = $this->doLookup($ip);
            $this->cache->set($key, $data);
        }
        return $data;
    }

    /**
     * @param $ip
     * @return string
     */
    abstract protected function doLookup($ip);
}