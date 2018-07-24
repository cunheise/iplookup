<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 10:46
 */

namespace IPLookup\Client;


use GuzzleHttp\Client;
use IPLookup\Exception\RemoteGatewayException;

/**
 * Class TaobaoClient
 * @package IPLookup\Client
 */
class TaobaoClient extends AbstractClient
{
    /**
     * @param string $ip
     * @return string
     * @throws RemoteGatewayException
     */
    protected function doLookup($ip)
    {
        $client = new Client();
        $response = $client->get('http://ip.taobao.com/service/getIpInfo.php', [
            'query' => [
                'ip' => $ip
            ],
            'headers' => $this->headers,
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RemoteGatewayException('remote gateway error');
        }
        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['code'] != 0) {
            throw new RemoteGatewayException('remote gateway error');
        }
        return $data['data']['region'];
    }

}