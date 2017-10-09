<?php

namespace TalkWith;

/**
 * @file
 * TalkWith interface.
 */

/**
 * Interface.
 */
interface TalkWithInterface {

  /**
   * Ask something to the service.
   *
   * @param array $something
   *   Array of parameters to build the request.
   */
  public function askSomething(array $something);

  /**
   * Say something to the service.
   *
   * @param array $something
   *   Array of parameters to build the request.
   */
  public function saySomething(array $something);

}
