#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 11:20
 */

use IPLookup\Client\TaobaoClient;
use IPLookup\IPLookupService;
use Symfony\Component\Cache\Simple\FilesystemCache;

require dirname(__DIR__) . '/vendor/autoload.php';

$ip = '115.60.19.180';
$iplookupService = new IPLookupService(new TaobaoClient(new FilesystemCache('namespace', 1 * 60 * 60, dirname(__DIR__) . '/runtime')));
echo $iplookupService->lookup($ip) . PHP_EOL;
$ip = \IPLookup\Util::getCurrentIP();
echo $iplookupService->lookup($ip) . PHP_EOL;