<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/26
 * Time: 10:18
 */

namespace Tests\Unit\IPLookup\Client;

use IPLookup\Client\AmapClient;

/**
 * Class AmapClientTest
 * @package Tests\Unit\IPLookup\Client
 */
class AmapClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testLookup()
    {
        $client = new AmapClient(['key' => '5a3db75eff15f6c82fbe7ac5f57bd8a9']);
        $this->assertEquals($client->lookup('115.60.19.180'), '河南');
        $this->assertEquals($client->lookup('111.30.29.50'), '天津');
    }
}
