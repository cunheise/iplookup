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
    require dirname(__DIR__) . '/vendor/autoload.php';
    
    $ip = '115.60.19.180';
    $client = new \IPLookup\Client\TaobaoClient();
    $response = $client->request($ip);
    echo $response->region . PHP_EOL;
    
License
-------

Copyright 2008-2018.

Licensed under the [GNU Lesser General Public License, Version 3.0](https://www.gnu.org/licenses/lgpl.txt)