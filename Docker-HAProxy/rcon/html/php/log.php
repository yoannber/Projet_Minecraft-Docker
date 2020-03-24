  
          <?php
	  $log = file_get_contents('/logsmine/latest.log');    // distant/local
	  $log = explode("\n", $log);

          foreach ($log as $l) {
          $ok = false;
          $l = htmlspecialchars($l);
          if (strstr($l, 'Can\'t keep up!') or strstr($l, 'lost connection:'))
          $l = '';
          elseif (strstr($l, '[main/WARN]'))
          $l = '';
          elseif (strstr($l, '[Server thread/INFO]')) {
          $l = str_replace('[Server thread/INFO]', 'INFO ', $l);
          $ok = true;
          if (strstr($l, 'joined the game'))
            $l = '<span style="color:green">'.$l.'</span>';
          elseif (strstr($l, 'left the game'))
            $l = '<span style="color:red">'.$l.'</span>';
          elseif (strstr($l, 'logged in with entity') or strstr($l, 'User Authenticator') or strstr($l, 'Query Listener'))
            $l = '<span style="color:grey">'.$l.'</span>';
          elseif (strstr($l, '&lt;'))
            $l = '<span style="color:white">'.$l.'</span>';
          }
          elseif (strstr($l, '[Server thread/WARN]')) {
                  $l = str_replace('[Server thread/WARN]', 'WARN ', $l);
                  $l = '<span style="color:orange">'.$l.'</span>';
                  $ok = true;
                  if (strstr($l, 'moved too quickly!'))
                      $l = '<span style="color:purple">'.$l.'</span>';
                  }
          elseif (strstr($l, '[Server thread/ERROR]')) {
                  $l = str_replace('[Server thread/ERROR]', 'ERROR ', $l);
                  $l = '<span style="color:red">'.$l.'</span>';
                  $ok = true;
                  }
          elseif (strstr($l, 'User Authenticator') or strstr($l, 'Query Listener')) {
          $ok = true;
          $l = '<span style="color:grey">'.$l.'</span>';
          }
          else {
          $ok = true;
          }
          if ($ok == true)
          echo $l.'<br />';
          }
          ?>
