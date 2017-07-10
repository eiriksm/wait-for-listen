<?php

use eiriksm\WaitForListen\ListenWaiter;

class ListenTest extends \PHPUnit_Framework_TestCase {

  public function testFailingPort() {
    $w = new ListenWaiter(1);
    $this->expectExceptionMessage('No connection to 127.0.0.1 on port 1 in 2 seconds');
    $w->waitFor(2);
  }

  public function testWorkingPort() {
    $sock = socket_create_listen(0);
    socket_getsockname($sock, $addr, $port);
    $w = new ListenWaiter($port);
    $this->assertTrue($w->waitFor(2));
    socket_close($sock);
  }
}
