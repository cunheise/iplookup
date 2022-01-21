<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/11
 * Time: 13:56
 */

namespace Tests\Unit\IPLookup\Client;

use IPLookup\Client\HaolietouClient;

/**
 * Class HaolietouClientTest
 * @package Tests\Unit\IPLookup\Client
 */
class HaolietouClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testLookup()
    {
        $client = new HaolietouClient();
        $this->assertEquals($client->lookup('115.60.19.180'), '河南');
        $this->assertEquals($client->lookup('111.30.29.50'), '天津');
    }
}
