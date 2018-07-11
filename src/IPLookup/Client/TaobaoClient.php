<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 10:46
 */

namespace IPLookup\Client;


use GuzzleHttp\Client;

/**
 * Class TaobaoClient
 * @package IPLookup\Client
 */
class TaobaoClient extends AbstractClient
{
    /**
     * @param string $ip
     * @return string
     */
    protected function doLookup($ip)
    {
        $client = new Client();
        $response = $client->get('http://ip.taobao.com/service/getIpInfo.php', [
            'query' => ['ip' => $ip]
        ]);
        if ($response->getStatusCode() != 200) {
            return '';
        }
        $data = json_decode($response->getBody(), true);
        if ($data['code'] != 0) {
            return '';
        }
        return $data['data']['region'];
    }

}