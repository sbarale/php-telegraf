<?php

namespace Hr\Telegraf;

/**
 * Class Telegraf
 * @package Tvorasp\Telegraf
 */
class Telegraf
{
    /**
     * @var resource
     */
    protected $socket;

    /**
     * @var string
     */
    protected $host = '127.0.0.1';

    /**
     * @var int
     */
    protected $port = 8094;

    /**
     * Telegraf constructor.
     * @param string $host
     * @param int    $port
     */
    public function __construct($host = '127.0.0.1', $port = 8094)
    {
        $this->host = $host;
        $this->port = $port;
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_set_nonblock($this->socket);
    }

    /**
     * @param string $table
     * @param array  $values
     * @param array  $tags
     * @param int    $time
     */
    public function send($table, $values, $tags = array(), $time = 0)
    {
        $msg = $this->message($table, $values, $tags, $time);

        $len = strlen($msg);

        socket_sendto($this->socket, $msg, $len, 0, $this->host, $this->port);
    }

    /**
     * @param string $table
     * @param array  $values
     * @param array  $tags
     * @param int    $time
     * @return string
     */
    public function message($table, $values, $tags = array(), $time = 0)
    {
        $msg = $table;

        if (count($tags)) {
            $msg .= "," . $this->compact($tags);
        }

        $msg .= " " . $this->compact($values);

        if ($time) {
            $msg .= " " . $time;
        }

        return $msg;
    }

    /**
     * @param  array $values
     * @return string
     */
    public function compact($values)
    {
        $result = "";

        foreach ($values as $key => $value) {
            $result .= $key . "=" . $value . ",";
        }

        $result = rtrim($result, ",");

        return $result;
    }
}