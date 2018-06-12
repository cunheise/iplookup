<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 10:49
 */

namespace Tests\Unit\IPLookup\Client;


use IPLookup\Client\TaobaoClient;
use IPLookup\Response;

class TaobaoClientTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $client = new TaobaoClient();
        $response = $client->request('221.6.206.26');
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals($response->region, '江苏');
        $this->assertEquals($response->getIP(), '221.6.206.26');
        $this->assertEquals($response->getCode(), 0);
    }
}
