<?php
  require_once('query.php');

$server = new Query(getenv('BUNGEECORD_IP'),36543);
if ($server->connect())
{
  $info = $server->get_info();
}?>
