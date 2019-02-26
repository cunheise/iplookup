<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/11
 * Time: 13:34
 */

namespace IPLookup\Client;


use GuzzleHttp\Client;
use IPLookup\Exception\RemoteGatewayException;

/**
 * Class PconlineClient
 * @package IPLookup\Client
 */
class PconlineClient extends AbstractClient
{

    /**
     * @param $ip
     * @return string
     */
    protected function doLookup($ip)
    {
        $client = new Client();
        $response = $client->get('http://whois.pconline.com.cn/ipJson.jsp', [
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
        if (preg_match('#"pro":"([^"]+)"#', $content, $m)) {
            return trim($m[1], '省市');
        } else {
            throw new RemoteGatewayException("can not parse remote gateway response");
        }
    }
}