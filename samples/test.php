#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:20
 */

use IPLookup\Client\TaobaoClient;
use Symfony\Component\Cache\Simple\FilesystemCache;

require dirname(__DIR__) . '/vendor/autoload.php';

$ip = '115.60.19.180';
$cache = new FilesystemCache('namespace', 1 * 60 * 60, dirname(__DIR__) . '/runtime');
$client = new TaobaoClient();
$client->setCache($cache);
$response = $client->request($ip);
echo $response->getCode() . PHP_EOL;
echo $response->region . PHP_EOL;