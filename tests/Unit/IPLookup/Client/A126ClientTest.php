<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/11
 * Time: 14:03
 */

namespace IPLookup\Client;


class A126ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testLookup()
    {
        $client = new A126Client();
        $this->assertEquals($client->lookup('115.60.19.180'), '河南');
    }
}
