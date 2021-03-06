<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2019/2/26
 * Time: 10:13
 */

namespace IPLookup\Client;

use GuzzleHttp\Client;
use IPLookup\Exception\RemoteGatewayException;

/**
 * Class AmapClient
 * @package IPLookup\Client
 */
class AmapClient extends AbstractClient
{
    /**
     * @var array $config
     */
    private $config;

    /**
     * AmapClient constructor.
     * @param array $options
     */
    public function __construct($options)
    {
        if (isset($options['cache'])) {
            parent::__construct($options['cache']);
            unset($options['cache']);
        } else {
            parent::__construct();
        }
        $this->config = array_merge(['output' => 'json'], $options);
    }

    /**
     * @param $ip
     * @return string
     * @throws RemoteGatewayException
     */
    protected function doLookup($ip)
    {
        $client = new Client();
        $response = $client->get('https://restapi.amap.com/v3/ip', [
            'query' => [
                'ip' => $ip,
                'output' => $this->config['output'],
                'key' => $this->config['key']
            ],
            'headers' => $this->headers,
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RemoteGatewayException('remote gateway error');
        }
        $data = json_decode($response->getBody()->getContents(), true);
        return preg_replace('/省|市/', '', $data['province']);
    }

}