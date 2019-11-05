<?


function connecttodb(){


$mysql_user		= "kentweb_3r0ll"; // MySQL UserName
$mysql_pass		= "C90%04e~d$&G"; // MySQL PassWord
$database_name	= "kentweb_kenth";

	
// DO NOT EDIT BELOW THIS LINE

	mysql_connect("localhost","$mysql_user","$mysql_pass") or die ("connection error");
	mysql_select_db("$database_name") or die ("db error");
mysql_query("SET NAMES 'latin5'");
mysql_query("SET character_set_connection = 'latin5'");
mysql_query("SET character_set_client = 'latin5'");
mysql_query("SET character_set_results = 'latin5'");
}



function connecttoatip(){


$mysql_user		= "kentweb_evrim"; // MySQL UserName
$mysql_pass		= "Py5&~d$9mrJ-"; // MySQL PassWord
$database_name	= "kentweb_alstip";

	
// DO NOT EDIT BELOW THIS LINE

	mysql_connect("localhost","$mysql_user","$mysql_pass") or die ("connection error");
	mysql_select_db("$database_name") or die ("db error");
		mysql_query("SET NAMES 'latin5'");
    mysql_query("SET CHARACTER SET latin5");
    mysql_query("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
}



function image_createThumb($src,$dest,$maxWidth,$maxHeight,$quality=100) { 

   if (file_exists($src)  && isset($dest)) { 

       // path info 

       $destInfo  = pathInfo($dest); 

       

       // image src size 

       $srcSize  = getImageSize($src); 

       

       // image dest size $destSize[0] = width, $destSize[1] = height 

       $srcRatio  = $srcSize[0]/$srcSize[1]; // width/height ratio 

       $destRatio = $maxWidth/$maxHeight; 

       if ($destRatio > $srcRatio) { 

           $destSize[1] = $maxHeight; 

           $destSize[0] = $maxHeight*$srcRatio; 

       } 

       else { 

           $destSize[0] = $maxWidth; 

           $destSize[1] = $maxWidth/$srcRatio; 

       } 

       

       // path rectification 

       if ($destInfo['extension'] == "gif") { 

           $dest = substr_replace($dest, 'jpg', -3); 

       } 

       

       // true color image, with anti-aliasing 

       $destImage = imageCreateTrueColor($destSize[0],$destSize[1]); 

       imageAntiAlias($destImage,true); 

       

       // src image 

       switch ($srcSize[2]) { 

           case 1: //GIF 

           $srcImage = imageCreateFromGif($src); 

           break; 

           

           case 2: //JPEG 

           $srcImage = imageCreateFromJpeg($src); 

           break; 

           

           case 3: //PNG 

           $srcImage = imageCreateFromPng($src); 

           break; 

           

           default: 

           return false; 

           break; 

       } 

       

       // resampling 

       imageCopyResampled($destImage, $srcImage, 0, 0, 0, 0,$destSize[0],$destSize[1],$srcSize[0],$srcSize[1]); 

       

       // generating image 

       switch ($srcSize[2]) { 

           case 1: 

           case 2: 

           imageJpeg($destImage,$dest,$quality); 

           break; 

           

           case 3: 

           imagePng($destImage,$dest); 

           break; 

       } 

       return $dest; 

   } 

   else { 

       return false; 

   } 

} 






function smart_resize_image( $file, $output, $width, $height, $proportional = true, $delete_original = false, $use_linux_commands = false)
  {
    if ( $height <= 0 && $width <= 0 ) {
      return false;
    }

    $info = getimagesize($file);
    $image = '';

    $final_width = 0;
    $final_height = 0;
    list($width_old, $height_old) = $info;

    if ($proportional) {
      if ($width == 0) $factor = $height/$height_old;
      elseif ($height == 0) $factor = $width/$width_old;
      else $factor = min ( $width / $width_old, $height / $height_old);   

      $final_width = round ($width_old * $factor);
      $final_height = round ($height_old * $factor);

    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }

    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        $image = imagecreatefromgif($file);
      break;
      case IMAGETYPE_JPEG:
        $image = imagecreatefromjpeg($file);
      break;
      case IMAGETYPE_PNG:
        $image = imagecreatefrompng($file);
      break;
      default:
        return false;
    }
    
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
        
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $trnprt_indx = imagecolortransparent($image);
   
      // If we have a specific transparent color
      if ($trnprt_indx >= 0) {
   
        // Get the original image's transparent color's RGB values
        $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
   
        // Allocate the same color in the new image resource
        $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
   
        // Completely fill the background of the new image with allocated color.
        imagefill($image_resized, 0, 0, $trnprt_indx);
   
        // Set the background color for new image to transparent
        imagecolortransparent($image_resized, $trnprt_indx);
   
      
      } 
      // Always make a transparent background color for PNGs that don't have one allocated already
      elseif ($info[2] == IMAGETYPE_PNG) {
   
        // Turn off transparency blending (temporarily)
        imagealphablending($image_resized, false);
   
        // Create a new transparent color for image
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
   
        // Completely fill the background of the new image with allocated color.
        imagefill($image_resized, 0, 0, $color);
   
        // Restore transparency blending
        imagesavealpha($image_resized, true);
      }
    }

    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
  
    if ( $delete_original ) {
      if ( $use_linux_commands )
        exec('rm '.$file);
      else
        @unlink($file);
    }
    
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }

    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        imagegif($image_resized, $output);
      break;
      case IMAGETYPE_JPEG:
        imagejpeg($image_resized, $output);
      break;
      case IMAGETYPE_PNG:
        imagepng($image_resized, $output);
      break;
      default:
        return false;
    }

    return true;
  }
  
  
  ?>