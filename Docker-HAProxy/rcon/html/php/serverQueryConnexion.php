<?php
  require_once('query.php');

$server = new Query(getenv('MINECRAFT_1_IP'),25566);
if ($server->connect())
{
  $info = $server->get_info();
}?>
