#!/usr/bin/env php
<?php

require '../vendor/autoload.php';

use TalkWith\TalkWithServices\TalkWithThingspeak;

$thingspeak = new TalkWithThingspeak($channel, $write_api_key, $read_api_key);

$thingspeak->saySomething([
  'fields' => [
    'field1' => '22.5',
    'field2' => '74.8',
    'field3' => '23.1',
  ],
]);
