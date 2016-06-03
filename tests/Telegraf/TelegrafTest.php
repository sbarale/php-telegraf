<?php

use Hr\Telegraf\Telegraf;

class TelegrafTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $telegraf = new Hr\Telegraf\Telegraf();
    }
    
    public function testCompact()
    {
        $telegraf = new Hr\Telegraf\Telegraf();
        $prepared = $telegraf->compact(array(
            "host" => "server01", "region" => "us-wes",
        ));

        $this->assertEquals("host=server01,region=us-wes", $prepared);

        $prepared = $telegraf->compact(array(
            "host" => "server01",
        ));

        $this->assertEquals("host=server01", $prepared);

        $prepared = $telegraf->compact(array());

        $this->assertEquals("", $prepared);
    }

    public function testMessage()
    {
        $telegraf = new Hr\Telegraf\Telegraf();

        $message = $telegraf->message("example",
            array("value" => 12, "otherval" => 21),
            array("host" => "server01", "region" => "us-wes"),
            1464981553
        );

        $this->assertEquals("example,host=server01,region=us-wes value=12,otherval=21 1464981553", $message);

        $message = $telegraf->message("example",
            array("value" => 12, "otherval" => 21),
            array("host" => "server01", "region" => "us-wes")
        );

        $this->assertEquals("example,host=server01,region=us-wes value=12,otherval=21", $message);

        $message = $telegraf->message("example",
            array("value" => 12, "otherval" => 21)
        );

        $this->assertEquals("example value=12,otherval=21", $message);

        $message = $telegraf->message("example",
            array("value" => 12)
        );

        $this->assertEquals("example value=12", $message);
    }
}