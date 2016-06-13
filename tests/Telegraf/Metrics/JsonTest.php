<?php

use Hr\Telegraf\Metrics\Json;
use Hr\Telegraf\Metrics\Metrics;

class JsonTest extends PHPUnit_Framework_TestCase
{
    function testNew()
    {
        $json = new Json(new Metrics());
    }

    function testJson()
    {
        $m = new Metrics();
        $json = new Json($m);

        $m->inc("counter");

        var_dump($json->json("counter"));
    }
}