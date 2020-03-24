	
<?php


function is404($filename){
    $handle = curl_init($filename);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);
    if ($httpCode >= 200 && $httpCode < 300){
       return false;
    }
     else{
       return true;
    }
  }


  function flip(&$img){
    $size_x = imagesx($img);
    $size_y = imagesy($img);
    $temp = imagecreatetruecolor($size_x, $size_y);
    $x = imagecopyresampled($temp, $img, 0, 0, ($size_x-1), 0, $size_x, $size_y, 0-$size_x, $size_y);
    return $temp;
  }
  function image_pseudo($pseudo)
  {
  
    $date_Timestamp = new DateTime(date('Y-m-d H:i:s'));
    $date_Timestamp->format('Y-m-d H:i:s');
    $date_Timestamp = $date_Timestamp->getTimestamp();  
    $c = @file_get_contents('https://api.mojang.com/users/profiles/minecraft/'.$pseudo.'?at='.$date_Timestamp);
    $c = json_decode($c);

    if(!$c)
    {
    
        $c=@file_get_contents('https://api.mojang.com/users/profiles/minecraft/'.'Steve'.'?at='.$date_Timestamp);
        $c = json_decode($c);

    }
    
    $id = $c->id;
    if (!isset($id))
    {
        $id='8667ba71b85a4004af54457a9734eed7';
    }
    if (isset($id))
    {
        
        $c = @file_get_contents('https://sessionserver.mojang.com/session/minecraft/profile/'.$id);
        
        $c = json_decode($c);
        

        if(!$c)
        {
        
            $c = @file_get_contents('https://sessionserver.mojang.com/session/minecraft/profile/'.'8667ba71b85a4004af54457a9734eed7');
        
            $c = json_decode($c);

        }
    }   
    if (isset($c))
    {
        $donnees = $c->properties[0]->value;
        $donnees_decode = base64_decode($donnees);
        
        $c = json_decode($donnees_decode);
        
        
        $filename = $c->textures->SKIN->url; /* Le liens peut être remplacer par celui de votre serveur de skin :D */
        if(is404($filename) || empty($pseudo)){
            $filename = "img/char.png";
        }
        header('Content-Type: image/png');
        $rendered = imagecreatetruecolor(240, 480);
        $source = imagecreatefrompng($filename);
        $b = 120;
        $s = 8;
        $pink = imagecolorallocate($rendered, 255, 0, 255);
        imagefilledrectangle($rendered, 0, 0, 240, 480, $pink);
        imagecolortransparent($rendered, $pink);
        $fsource = flip($source);
        imagecopyresampled($rendered, $source, $b / 2, 0, $s, $s, $b, $b, $s, $s);
		imagepng($rendered);
		}
	
    else
    {
        echo '<img src="steve.jpg" alt="">';
    }
}
	image_pseudo("Yobna");
?>
	