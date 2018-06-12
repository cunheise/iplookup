<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 10:46
 */

namespace IPLookup\Client;


use GuzzleHttp\Client;
use IPLookup\Response;

/**
 * Class TaobaoClient
 * @package IPLookup\Client
 */
class TaobaoClient extends AbstractClient
{
    /**
     * @var string $baseUrl
     */
    protected $baseUrl = 'http://ip.taobao.com/service/getIpInfo.php';

    /**
     * @param string $ip
     * @return Response
     */
    public function request($ip)
    {
        $client = new Client();
        $response = $client->get($this->baseUrl, [
            'query' => ['ip' => $ip]
        ]);
        if ($response->getStatusCode() != 200) {
            return new Response($ip, $response->getStatusCode());
        }
        $data = json_decode($response->getBody(), true);
        if ($data['code'] != 0) {
            return new Response($ip, $data['code']);
        }
        return new Response($ip, $data['code'], $data['data']);
    }

}