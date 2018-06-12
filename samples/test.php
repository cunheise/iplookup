#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:20
 */
require dirname(__DIR__) . '/vendor/autoload.php';

$ip = '115.60.19.180';
$client = new \IPLookup\Client\TaobaoClient();
$response = $client->request($ip);
echo $response->region . PHP_EOL;