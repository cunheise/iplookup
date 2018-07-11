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

    public function testLookup()
    {
        $client = new TaobaoClient();
        $this->assertEquals($client->lookup('221.6.206.26'), '江苏');
    }
}
