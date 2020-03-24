<?php
  require_once('query.php');

$server = new Query(getenv('MINECRAFT_2_IP'),25562);
if ($server->connect())
{
  $info = $server->get_info();
}?>
