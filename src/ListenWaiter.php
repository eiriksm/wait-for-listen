<?php

namespace eiriksm\WaitForListen;

class ListenWaiter {

  /**
   * The port to monitor.
   *
   * @var int
   */
  private $port;

  /**
   * The host to monitor
   *
   * @var string
   */
  private $host;

  /**
   * ListenWaiter constructor.
   *
   * @param int $port
   *   The port.
   * @param string $host
   *   The host.
   */
  public function __construct($port, $host = '127.0.0.1') {
    $this->port = $port;
    $this->host = $host;
  }

  /**
   * Waits for x seconds.
   *
   * @param int $seconds
   *
   * @return bool
   *   Will return TRUE on success.
   * @throws \Exception
   */
  public function waitFor($seconds) {
    $code = $err = NULL;
    $start = time();
    $connected = FALSE;
    while (!$connected) {
      if (time() > $start + $seconds) {
        throw new \Exception("No connection in $seconds seconds");
      }
      $conn = @stream_socket_client("tcp://{$this->host}:{$this->port}", $code, $err, $seconds);
      if ($err == '') {
        $connected = TRUE;
      }
      if ($conn) {
        fclose($conn);
      }
    }
    return TRUE;
  }
}
