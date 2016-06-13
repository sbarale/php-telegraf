<?php

include __DIR__. "/../vendor/autoload.php";

use Hr\Telegraf\Metrics\Metrics;

$m = new Metrics();

while (true) {
    $m->inc("counter");

    sleep(1);
}