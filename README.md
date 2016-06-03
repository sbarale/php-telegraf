# Telegraf

Очень простой клиент для рабтоты с [telegraf](https://docs.influxdata.com/telegraf/v0.13/).

### Установка

Ставим через композер

```
composer require hr/telegraf
```

### Использование

Клиент работает по [строчному протоколу](https://docs.influxdata.com/influxdb/v0.13/write_protocols/write_syntax/) телеграфа
через UDP сокеты.

Пример использования протокола:

```
measurement,host=server01,region=us-wes value=12,otherval=21 1234567890000000000
```

Аналогичный пример с использованием клиента:

```
$message = $telegraf->send("measurement",
    array("value" => 12, "otherval" => 21),
    array("host" => "server01", "region" => "us-wes")
);
```