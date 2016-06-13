<?php

use Hr\Telegraf\Metrics\Metrics;

class MetricsTest extends PHPUnit_Framework_TestCase
{
    public function testNew()
    {
        $m = new Metrics();
    }

    public function testInc()
    {
        $m = new Metrics();
        $this->assertEquals(1, $m->inc("counter"));
        $this->assertEquals(2, $m->inc("counter"));
        $this->assertEquals(3, $m->inc("counter"));
        $this->assertEquals(4, $m->inc("counter"));
    }

    public function testSetGet()
    {
        $m = new Metrics();

        $m->set("example", 10);
        $this->assertEquals(10, $m->get("example"));

        $m->set("example", PHP_INT_MAX);

        $this->assertEquals(1, $m->inc("example"));
        $this->assertEquals(2, $m->inc("example"));
    }
}