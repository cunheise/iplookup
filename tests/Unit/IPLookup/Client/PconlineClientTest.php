<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/11
 * Time: 13:56
 */

namespace IPLookup\Client;


class PconlineClientTest extends \PHPUnit_Framework_TestCase
{
    public function testLookup()
    {
        $client = new PconlineClient();
        $this->assertEquals($client->lookup('115.60.19.180'), '河南');
    }
}
