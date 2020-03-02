<?php
        use xPaw\MinecraftPing;
        use xPaw\MinecraftPingException;
	
	# $gg = $_ENV['DIR']."_minecraft_1";
	$gg = getenv('DIR');
	$ggMoc = $gg."_minecraft_1";
	
        // Edit this ->
        define( 'MQ_SERVER_ADDR', $ggMoc );
        define( 'MQ_SERVER_PORT', 25566 );
        define( 'MQ_TIMEOUT', 1 );
        // Edit this <-

        // Display everything in browser, because some people can't look in logs for errors
        Error_Reporting( E_ALL | E_STRICT );
        Ini_Set( 'display_errors', true );

        require __DIR__ . '/src/MinecraftPing.php';
        require __DIR__ . '/src/MinecraftPingException.php';

        $Timer = MicroTime( true );

        $Info = false;
        $Query = null;

        try
        {
                $Query = new MinecraftPing( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );

                $Info = $Query->Query( );

                if( $Info === false )
                {
                        /*
                         * If this server is older than 1.7, we can try querying it again using older protocol
                         * This function returns data in a different format, you will have to manually map
                         * things yourself if you want to match 1.7's output
                         *
                         * If you know for sure that this server is using an older version,
                         * you then can directly call QueryOldPre17 and avoid Query() and then reconnection part
                         */

                        $Query->Close( );
                        $Query->Connect( );

                        $Info = $Query->QueryOldPre17( );
                }
        }
        catch( MinecraftPingException $e )
        {
                $Exception = $e;
        }

        if( $Query !== null )
        {
                $Query->Close( );
        }

        $Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
?>


<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Minecraft RCON Console</title>

	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
	<!--<script src="//code.jquery.com/jquery-migrate-3.0.1.min.js"></script> -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Latest darkly bootstrap theme CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css" integrity="sha384-w+8Gqjk9Cuo6XH9HKHG5t5I1VR4YBNdPt/29vwgfZR485eoEJZ8rJRbm3TR32P6k" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/JavaScript" src="script.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
	<!-- Stack the columns on mobile by making one full-width and the other half-width -->
	<div class="container-fluid content" style="padding-top: 15px;">
		<div class="alert alert-info text-center" id="alertMessenge">Welcome to Minecraft RCON Console.</div>
		<div class="row">
			<div class="col-md-8 col-lg-8 console">
				<div class="card mb-3">
					<div class="card-header bg-info">
						<h3>Console</h3>
					</div>
					<div class="card-body bg-white">
						<ul class="list-group" id="groupConsole">
							<li class="list-group-item list-group-item-info">Welcome to Minecraft RCON Console.</li>
							<li class="list-group-item list-group-item-info">View all command at <a href="http://minecraft.gamepedia.com/Commands" target="_blank">http://minecraft.gamepedia.com/Commands</a></li>
							<li class="list-group-item list-group-item-info">View item name and id at <a href="http://www.minecraftinfo.com/idlist.htm" target="_blank">http://www.minecraftinfo.com/idlist.htm</a></li>
						</ul>

					</div>
				</div>

				<div class="checkbox card card-body bg-white mb-3">
					<div class="row align-items-center">
						<div class="col-6">
							<label class="text-dark btn mb-0">
								<input type="checkbox" id="chkAutoScroll" checked="true"> Auto scroll
							</label>
						</div>
						<div class="col-6">
							<button type="button" class="btn btn-primary" tabindex="0" id="btnClearLog" style="float:right;"><span class="glyphicon glyphicon-remove-sign"></span> Clear Console</button>
						</div>
					</div>
				</div>

				<div class="input-group">
					<input type="text" class="form-control" id="txtCommand">
					<div class="input-group-append">
						<button type="button" class="btn btn-primary" tabindex="-1" id="btnSend"><span class="glyphicon glyphicon-arrow-right"></span> Send</button>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 status">
				<div class="card mb-3 h-100">
					<div class="card-header bg-info">
						<h3>Server Status & Info</h3>
					</div>
					<div class="card-body">
						<div class="container">

							<?php if( isset( $Exception ) ): ?>
                						<div class="panel panel-primary">
					                        	<div class="panel-heading"><?php echo htmlspecialchars( $Exception->getMessage( ) ); ?></div>
						                        <div class="panel-body"><?php echo nl2br( $e->getTraceAsString(), false ); ?></div>
               							</div>
							<?php else: ?>
          							<div class="row">
                                					<table class="table table-bordered table-striped">
                                        				<thead>
                                                				<tr>
				                                                        <th colspan="2">Server Info <em>(queried in <?php echo $Timer; ?>s)</em></th>
                                				                </tr>
                                       					</thead>
                                       					 <tbody>
									  <?php if( $Info !== false ): ?>
										<?php foreach( $Info as $InfoKey => $InfoValue ): ?>
                                                					<tr>
	                                                        			<td><?php echo htmlspecialchars( $InfoKey ); ?></td>
        	                                                			<td><?php
											if( $InfoKey === 'favicon' )
        										{
											   echo '<img width="64" height="64" src="' . Str_Replace( "\n", "", $InfoValue ) . '">';
											}
											else if( Is_Array( $InfoValue ) )
											{
																								
												echo "<pre>";
												if (isset($InfoValue['max']) || isset($InfoValue['online']) || isset($InfoValue['sample']) )
												{
													echo "Nombre de joueurs connectés: " ;
													echo $InfoValue['online'];
													echo "/";
													echo $InfoValue['max'];
													echo "\n";
													echo "Joueur(s) connecté(s): \n";
													if (isset($InfoValue['sample']))
													{
													foreach($InfoValue['sample'] as $value)
													{
														echo $value['name'];
														echo "\n";
													}
													}
												}
												else if (isset($InfoValue['text']))
												{
													echo $InfoValue['text'];
												}
												else if (isset($InfoValue['name']))
												{
													echo "version: ";
													echo $InfoValue['name'];
												}
												else
												{

													print_r( $InfoValue );
												}
									        	        echo "</pre>";
	        									}
        										else
        										{
										                echo htmlspecialchars( $InfoValue );
        										}
										  	?></td>
                                                				    </tr>
										<?php endforeach; ?>
									<?php else: ?>
                                                			<tr>
                                                        			<td colspan="2">No information received</td>
                                                			</tr>
									<?php endif; ?>
                                        			        </tbody>
                                					</table>
                						</div>
							<?php endif; ?>
        					</div>

					</div>
					<div class="card-footer bg-info">
						<p class="mb-0">Minecraft RCON Console</p>
					</div>
				</div>

			</div>

		</div>
	</div>

</body>

<footer id = "footer">
	<div class="container-fluid">

	</div>
</footer>

</html>
