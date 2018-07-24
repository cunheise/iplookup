IPLookup
============

Install
-------
    composer require iplookup/iplookup

Lib
---
Get location information via remote ip address

Sample
------
    use IPLookup\Client\TaobaoClient;
    use IPLookup\IPLookupService;
    use Symfony\Component\Cache\Simple\FilesystemCache;
    
    require dirname(__DIR__) . '/vendor/autoload.php';
    
    $ip = '115.60.19.180';
    $iplookupService = new IPLookupService(new TaobaoClient(new FilesystemCache('namespace', 1 * 60 * 60, dirname(__DIR__) . '/runtime/cache')));
    echo $iplookupService->lookup($ip) . PHP_EOL;
    $ip = \IPLookup\Util::getCurrentIP();
    echo $iplookupService->lookup($ip) . PHP_EOL;
    
License
-------

Copyright 2008-2018.

Licensed under the [GNU Lesser General Public License, Version 3.0](https://www.gnu.org/licenses/lgpl.txt)