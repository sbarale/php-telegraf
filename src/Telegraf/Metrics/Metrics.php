<?php

namespace Hr\Telegraf\Metrics;

/**
 * Class Telegraf
 * @package Hr\Telegraf
 */
class Metrics
{
    /**
     * @var array
     */
    private $tags = array();

    // @todo: нужно разделять разные объекты метрик
    // можно сразу приписывать теги
    public function __construct()
    {
    }

    /**
     * @param $key
     * @return mixed
     */
    public function inc($key)
    {
        if (!apcu_add($key, 1)) {
            apcu_inc($key);
        }

        $val = apcu_fetch($key);

        if ($val >= PHP_INT_MAX) {
            $val = 1;
            apcu_store($key, $val);
        }

        return $val;
    }

    /**
     * @param $key
     * @param $val
     */
    public function set($key, $val)
    {
        apcu_store($key, $val);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return apcu_fetch($key, $val);
    }
}