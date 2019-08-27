<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/11
 * Time: 14:01
 */

namespace IPLookup\Client;


use GuzzleHttp\Client;
use IPLookup\Exception\RemoteGatewayException;

/**
 * Class A126Client
 * @package IPLookup\Client
 */
class A126Client extends AbstractClient
{

    /**
     * @param $ip
     * @return string
     */
    protected function doLookup($ip)
    {
        $client = new Client();
        $response = $client->get('http://ip.ws.126.net/ipquery', [
            'query' => [
                'ip' => $ip
            ],
            'headers' => $this->headers,
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RemoteGatewayException('remote gateway error');
        }
        return $this->parseContent($response->getBody()->getContents());
    }

    /**
     * @param $content
     * @return string
     * @throws RemoteGatewayException
     */
    private function parseContent($content)
    {
        $content = iconv("gb18030", "utf-8", $content);
        if (preg_match('#lo="([^"]+)"#', $content, $m)) {
            return preg_replace('/省|市/', '', $m[1]);
        } else {
            throw new RemoteGatewayException("can not parse remote gateway response");
        }
    }
}