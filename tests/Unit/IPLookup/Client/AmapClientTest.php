<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/26
 * Time: 10:18
 */

namespace Tests\Unit\IPLookup\Client;

use IPLookup\Client\AmapClient;

class AmapClientTest extends \PHPUnit_Framework_TestCase
{
    public function testLookup()
    {
        $client = new AmapClient(['key' => 'ad68165b0fc8484038b1968c5f5cb82e']);
        $this->assertEquals($client->lookup('115.60.19.180'), '河南');
    }
}
