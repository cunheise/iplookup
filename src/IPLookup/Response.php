<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/6/12
 * Time: 10:43
 */

namespace IPLookup;

/**
 * Class Response
 * @package IPLookup
 */
class Response
{
    /**
     * @var array $data
     */
    private $data;
    /**
     * @var string $ip
     */
    private $ip;
    /**
     * @var int $code
     */
    private $code;

    public function __construct($ip, $code, $data = [])
    {
        $this->ip = $ip;
        $this->code = $code;
        $this->data = $data;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return parent::__get($name);
    }

    /**
     * @return string
     */
    public function getIP()
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

}