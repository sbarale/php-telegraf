<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 13.06.16
 * Time: 14:34
 */

namespace Hr\Telegraf\Metrics;


class Json
{
    /**
     * @var Metrics
     */
    protected $metrics;

    /**
     * Json constructor.
     * @param Metrics $m
     */
    public function __construct($m)
    {
        $this->metrics = $m;
    }

    /**
     * @param  string $key
     * @return string
     */
    public function json($key)
    {
        return json_encode(array(
            $key => $this->metrics->get($key)
        ));
    }
}