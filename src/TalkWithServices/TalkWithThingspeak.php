<?php

namespace TalkWith\TalkWithServices;

/**
 * @file
 * Simple framework to talk with thingspeak.
 *
 * @author schneidolf
 * @repository schneidolf\talkwith
 */

use TalkWith\TalkWithInterface;
use GuzzleHttp\Client;

define('THINGSPEAK_BASEPATH', 'https://api.thingspeak.com/');

/**
 * Main class.
 */
class TalkWithThingspeak implements TalkWithInterface {

  private $channel;
  private $apiKeys = [];

  /**
   * Construct the thingspeak talker.
   *
   * @param \string $channel
   *   The ID of the thingspeak channel.
   * @param \string $write_api_key
   *   The thingspeak write API-Key.
   * @param \string $read_api_key
   *   The thingspeak read API-Key.
   */
  public function __construct(string $channel, string $write_api_key = NULL, string $read_api_key = NULL) {
    $this->channel = $channel;

    if (!$write_api_key && !$read_api_key) {
      throw new \Exception('One API-Key is required.');
    }

    $this->apiKeys['write'] = $write_api_key;
    $this->apiKeys['read'] = $read_api_key;
  }

  /**
   * {@inheritdoc}
   */
  public function saySomething(array $something) {
    if (!$this->apiKeys['write']) {
      throw new \Exception('To say something to thingspeak you need the write API-Key!');
    }

    $query = $something['fields'];
    $query['api_key'] = $this->apiKeys['write'];

    $client = new Client([
      'base_uri' => THINGSPEAK_BASEPATH,
      'timeout' => 10,
    ]);

    print_r($client->request('GET', 'update', ['query' => $query])->getStatusCode());
  }

  /**
   * {@inheritdoc}
   */
  public function askSomething(array $something) {
    if (!$this->apiKeys['read']) {
      throw new \Exception('To say something to thingspeak you need a read API-Key!');
    }

    if (!$this->channel) {
      throw new \Exception('No channel ID available');
    }

  }

}
