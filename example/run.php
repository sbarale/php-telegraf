<?php

include __DIR__."/../vendor/autoload.php";

use Hr\Telegraf\Telegraf;

$telegraf = new Telegraf();

$value = mt_rand(1, 10);

$telegraf->send("test_metric_udp", array("value" => $value), array("host" => "server01", "region" => "us-west"));

echo "value: ".$value."\n";
