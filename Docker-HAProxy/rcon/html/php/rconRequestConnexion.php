<?php
	$server = getenv('MINECRAFT_2_IP');
	$port = 25562;
	$password = '2442';

	$command = isset($_GET['rcon']) && !empty($_GET['rcon']) ? $_GET['rcon'] : 'version';

	if ($command[0] == '/') {
		$command = substr($command, 1);
	}

	try
	{
		$rcon = new RCon($server, $port, $password);
		$return =  nl2br(minecraft_string($rcon->command($command)));
	}
	catch(Exception $e)
	{
		$return = $e->getMessage( );
	}
	if (isset($_GET['rcon'])) die($return);

?>
