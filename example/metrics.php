<?php

include __DIR__."/../vendor/autoload.php";

use Hr\Telegraf\Metrics\Metrics;
use Hr\Telegraf\Metrics\Json;

$m = new Metrics();
$json = new Json($m);

header('Content-type: application/json');

echo $json->json("counter");