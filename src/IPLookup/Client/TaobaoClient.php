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
     * @return \IPLookup\Response
     */
    public function request($ip)
    {
        $response = $this->getCache()->get($ip, null);
        if ($response == null || $response->getCode() != 0) {
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
            $response = new Response($ip, $data['code'], $data['data']);
            $this->getCache()->set($ip, $response);
        }
        return $response;
    }

}