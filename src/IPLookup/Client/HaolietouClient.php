<?php


namespace IPLookup\Client;


use GuzzleHttp\Client;
use IPLookup\Exception\RemoteGatewayException;

/**
 * Class HaolietouClient
 * @package IPLookup\Client
 */
class HaolietouClient extends AbstractClient
{
    /**
     * @param $ip
     * @return string
     */
    protected function doLookup($ip)
    {
        $client = new Client();
        $response = $client->get('http://ip.haolietou.com', [
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
        $data = json_decode($content, true);
        if ($data['code'] == 200) {
            return preg_replace('/省|市/', '', $data['data']['province']);
        } else {
            throw new RemoteGatewayException("can not parse remote gateway response");
        }
    }
}