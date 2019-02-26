<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/11
 * Time: 11:16
 */

namespace Tests\Unit\IPLookup;

use IPLookup\Client\TaobaoClient;
use IPLookup\IPLookupService;
use Symfony\Component\Cache\Simple\ArrayCache;

/**
 * Class IPLookupServiceTest
 * @package Tests\Unit\IPLookup
 */
class IPLookupServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \IPLookup\Exception\InvalidIpException
     */
    public function testLookup()
    {
        $service = new IPLookupService(new TaobaoClient());
        $this->assertEquals($service->lookup('115.60.19.180'), '河南');
    }

    /**
     * @throws \IPLookup\Exception\InvalidIpException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function testLookupWithCache()
    {
        $ip = '115.60.19.180';
        $cache = new ArrayCache(60);
        $service = new IPLookupService(new TaobaoClient($cache));
        $this->assertEquals($service->lookup($ip), '河南');
        $this->assertEquals($cache->get(md5($ip)), '河南');
    }
}
