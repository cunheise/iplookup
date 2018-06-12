#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:20
 */
require dirname(__DIR__) . '/vendor/autoload.php';

$ip = \IPLookup\Util::getCurrentIP();
$client = new \IPLookup\Client\TaobaoClient();
$response = $client->request($ip);
print_r($response->region);