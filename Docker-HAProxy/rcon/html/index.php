<!doctype html>
<html lang="fr">
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minecraft Y.T.P.A</title>
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="all" />
  <link rel="stylesheet" type="text/css" href="./css/chart.css" media="all" />
  <link rel="stylesheet" type="text/css" href="./css/animateTextfield.css" media="all" />
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" media="all" />
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" media="all" />
  <link rel="shortcut icon" href="./image/minecraft.ico">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="./js/jquery.inputhistory.js"></script>
</head>
<body>

<?php require_once('./php/serverQueryConnexion.php');?>

<?php
	require './php/rcon.php';
	require './php/minecraft_string.php';
  require './php/rconRequestConnexion.php';
?>




<div class="container-pad">

 <div class="container-headPad">
   <div id="minecraft-message" >
     <h1><span><img id="pickaxe" src="./image/pickaxe.png">PANNEAUX D'ADMINISTRATION</span></h1>
   </div>
 </div>

 <div class="container-backPad">
   <img id="pickaxe" src="./image/textMinecraft.png">
 </div>

 <div class="container-descriptionPad">
   <div class="title">
     <h3><span><img src="./image/swordLeft.png">SUPERVISION DES SERVEURS MINECRAFT<img src="./image/sword.png"> </span></h3>
   </div>
   <div class="row align-items-start">
     <div class="col">
       <div class="container-icon">
         <img id="icon" src="./image/terminal.svg">
       </div>
      <h2>Console de gestion</h2>
      <p>Pour piloter votre serveur à distance, utilisez le service Remote.</p>
      <button class="main-button"><span>PILOTER</span></button>
     </div>
     <div class="col">
       <div class="container-icon">
          <img id="icon" src="./image/avatar.svg">
       </div>
      <h2> Gestion des joueurs</h2>
      <p>Gérez vos joueurs grâce à une interface d'administration dédié.</p>
      <button class="main-button"><span>GÉRER</span></button>
     </div>
     <div class="col">
       <div class="container-icon">
         <img id="icon" src="./image/pie-chart.svg">
       </div>
        <h2>Statistiques du serveur</h2>
        <p>Consultez en temps réel les statistiques de votre serveur.</p>
        <button class="main-button"><span>CONSULTER</span></button>
     </div>
   </div>
 </div>

 <div class="container-carouselPad">
    <div id="slide" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container-carrousel">
                <p>SALUT</P>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-carrousel">
                <p>SALUT</P>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-carrousel">
                <p>SALUT</P>
          </div>
        </div>
      </div>
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#slide" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#slide" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
</div>

<div class="container-informationPad">
  <div class="row">
    <div class="col-7 m1">
      <div class="card">
      <div class="card-header">
        <p>Informations du serveur</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-4 m1">
            <div class="box">
              <div class="progress" id="progress">
                <div class="inner" id="players">
                  <?php echo $info['numplayers'],"/",$info['maxplayers'] ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-8 m2">
            <h1>DESCRIPTION : <span class="value"><?php echo $info['hostname'] ?></span></h1>
            <h1>ADRESSE : <span class="value"><?php echo $info['hostip'] ?></span></h1>
            <h1>VERSION : <span class="value"><?php echo $info['version'] ?></span></h1>
            <h1>MAP : <span class="value"><?php echo $info['map'] ?></span></h1>
          </div>

        </div>
      </div>
    </div>
    </div>

    <div class="col-5 m2">

      <div class="card">
      <div class="card-header">
        <p>Joueurs connectés</p>
      </div>

      <div class="card-body" id="tablePlayers" >
        <?php require('./php/tablePlayers.php'); ?>
      </div>
    </div>
</div>
</div>
</div>

<div class="container-informationPad">
  <div class="row">
    <div class="col-5 m1" >
      <div class="card">
      <div class="card-header">
        <p>Console RCON</p>
      </div>
      <div class="card-body">
        <div class="rcon">
          <div id="console">
            <?php echo $return ?>
          </div>
        </div>
        <div class="input-field">
          <input type="text" id="name" required />
          <label for="name">Commande :</label>
        </div>
        </div>
        <div>
      </div>
    </div>
    </div>

    <div class="col-7 m2">
      <div class="card">
      <div class="card-header ">
          <p id="textRefresh">Log & Chat du serveur<span><div class="refresh"></div></span></p>
      </div>
      <div class="card-body">
        <div class="log" id="log">
          <?php require('./php/log.php'); ?>
        </div>
      </div>
    </div>
</div>

</div>
</div>




  <!-- Le reste du contenu -->
  <!-- Javascript files -->
  <script>
    $('input').focus().inputHistory(function(value) {
      $('#console').html($('#console').html() + '<br><strong>&gt; ' + value + '</strong>');
      $.get('?rcon=' + encodeURIComponent(value), function(data){$('#console').html($('#console').html() + '<br>' + data).animate({ scrollTop: $('#console')[0].scrollHeight}, 800); });
    });
  </script>

<script type="text/javascript">

var auto_refresh = setInterval(
function ()
{
$('#log').load('./php/log.php').fadeIn("slow");

}, 1000);

var auto_refresh2 = setInterval(
function ()
{
 $('#tablePlayers').load('./php/tablePlayers.php').fadeIn("slow");

}, 5000);

  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js"></script>
  <script type="text/javascript" src="./js/jquery.js"></script>
  <script type="text/javascript" src="./js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/chart.js"></script>
</body>
</html>
