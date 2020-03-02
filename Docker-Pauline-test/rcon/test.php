<?php


require_once('Rcon.php');

$host = 'localhost'; // Server host name or IP
$port = 25562;                      // Port rcon is listening on
$password = '2442'; // rcon.password setting set in server.properties
$timeout = 3;                       // How long to timeout.

use Thedudeguy\Rcon;

$rcon = new Rcon($host, $port, $password, $timeout);

if ($rcon->connect())
{
  $rcon->sendCommand("say Hello World!");
}

?>
