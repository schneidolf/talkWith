#!/usr/bin/env php
<?php

require '../vendor/autoload.php';

use TalkWith\TalkWithServices\TalkWithThingspeak;

$channel = 'your channel number';
$write_api_key = 'your write_api_key';
$read_api_key = 'your read_api_key';

$thingspeak = new TalkWithThingspeak($channel, $write_api_key, $read_api_key);

$thingspeak->saySomething([
  'fields' => [
    'field1' => '22.5',
    'field2' => '74.8',
    'field3' => '23.1',
  ],
]);
