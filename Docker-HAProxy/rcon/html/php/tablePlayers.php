	<?php require_once('serverQueryConnexion.php');?>
	

	
	<table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
			  <th scope="col">Skin</th>
              <th scope="col">Pseudo</th>
              <th scope="col">Connexion</th>
            </tr>
          </thead>
           <?php
		   $id = 0;
            foreach( $info['players'] as $value ) : 
			$id++;
			?>
			<tbody>
                        <tr>
                          <th scope="row"><?php echo $id ?></th>
						  <td><div><img id="iconTable" src="./image/avatarJoueurs.svg"></div></td>
                          <td><?php echo $value ?></td>
                          <td><?php
                          $heure = date("H:i:s");
                          echo $heure;
                          ?></td>
                        </tr>
          </tbody>
		<?php endforeach; ?>
    </table>
	
	
