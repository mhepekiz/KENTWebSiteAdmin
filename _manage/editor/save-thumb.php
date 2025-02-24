<?php


$images_path = "../../../_all_media/_products/"; 
$thumbs_path = $images_path . "crop/"; 
$quality = 90;

// first, we retrieve the form's value, presumably sent through the ost method.
$photo = isset($_POST['filename']) ? $_POST['filename'] : false; 
$top = isset($_POST['top']) ? $_POST['top'] : false;
$left = isset($_POST['left']) ? $_POST['left'] : false;
$width = isset($_POST['width']) ? $_POST['width'] : false;
$height = isset($_POST['height']) ? $_POST['height'] : false;
$max_width = isset($_POST['max_width']) ? $_POST['max_width'] : false;
$max_height = isset($_POST['max_height']) ? $_POST['max_height'] : false;

//we set the response header to a JSON string, this is not mandatory, but it's cleaner.
header('Content-type: application/json');

//we make sure all the required parameters are present
if(!($photo && is_numeric($top) && is_numeric($left) && is_numeric($width) && is_numeric($height) && is_numeric($max_height) && is_numeric($max_width))){
	die('{"error":"Some of the required parameters are missing."}');
}

//we verify the GD library is running.
if(! extension_loaded('gd')){
	die('{"error":"The GD extension is not installed on the server."}');
}

/*
we are going to suppose that $photo contains the source image file name, which it should if you passed it properly from UvumiCrop in the first place.
*/

$source_file = $images_path . $photo;

//we make sure the source path exists
if(!is_dir($images_path)) {
	die('{"error":"The source directory could not be found."}');
}
//we make sure the source file exists
if(!file_exists($source_file)) {
	die('{"error":"The source image file could not be found."}');
}

//try create the target folder if it doesn't exist
if(!is_dir($thumbs_path)) {
	if(!mkdir($thumbs_path,0777,true)){
		die('{"error":"The destination directory could not be created."}');
	}
}

//Make sure the target folder is writable
if(!is_writable($thumbs_path)){
	die('{"error":"The server does not have permission to write in the destination folder."}');
}

//We get the file extension from the file name. It's needed later
$filename = explode('.', $photo);
$extension = array_pop($filename);

//we create a new filename from the original with the "thumb" suffix.
$thumb = implode('.',$filename) . "-thumb." . $extension;

//the full target path + file name
$target_file = $thumbs_path . $thumb;

$info = getimagesize($source_file);

if(!$info){
	die('{"error":"The file type is not supported."}');
}

// we use the the GD library to load the image, using the file extension to choose the right function
switch($info[2]) {
	case IMAGETYPE_GIF:
		if(!$source_image = imagecreatefromgif($source_file)){
			die('{"error":"Could not open GIF file."}');
		}
		break;
	case IMAGETYPE_PNG:
		if(!$source_image = imagecreatefrompng($source_file)){
			die('{"error":"Could not open PNG file."}');
		}
		break;
	case IMAGETYPE_JPEG:
		if(!$source_image = imagecreatefromjpeg($source_file)){
			die('{"error":"Could not open JPG file."}');
		}
		break;
	default:
		die('{"error":"The file type is not supported."}');
		break;
}

//Calculate the new size based on the selected area and the minimums
if($width > $height) {
	$dest_width = $max_width;
	$dest_height = round($max_width*$height/$width);
} else {
	$dest_width = round($max_height*$width/$height);
	$dest_height = $max_height;
}

//we generate a new image object of the size calculated above, using PHP's GD functions
if(!$dest_image = imagecreatetruecolor($dest_width, $dest_height)){
	die('{"error":"Could not create new image from source file."}');
}

//hack to keep transparency in gif and png
if($info[2]==IMAGETYPE_GIF||$info[2]==IMAGETYPE_PNG){
	if($info[2]==IMAGETYPE_PNG){
		imageAntiAlias($dest_image,true);
	}
	imagecolortransparent($dest_image, imagecolorallocatealpha($dest_image, 0, 0, 0,127));
	imagealphablending($dest_image, false);
	imagesavealpha($dest_image, true);
}

/*
this is where we crop the image,
-the first parameter is the destinatation image (not a physical file, but a GD image object)
-second is the source image. Again it's not the physical file but a GD object (which was generated from an image file this time)
-third and fourth params are the X and Y coordinates to paste the copied region in the destination image. In this case we want both of them to be 0,
-fifth and sixth are the X and Y coordinates to start cropping in the source image. So they are pretty much the coordinates we got from UvumiCrop.
-seventh and eighth are the width and height of the destination image, the one calculated right above
-ninth and tenth are the width and height of the cropping region, directly from UvumiCrop again

By just setting $max_width and $max_height above, you should not have to worry about this
*/
if(!imagecopyresampled($dest_image, $source_image, 0, 0, $left, $top, $dest_width, $dest_height, max($width, $max_width), max($height, $max_height))){
	die('{"error":"Could not crop the image with the provided coordinates."}');
}

//just as we used $extension to pick the loading function, we'll use it again here to determine which GH function we need for outputting the cropped image
switch($info[2]) {
	case IMAGETYPE_GIF:
		if(!imagegif($dest_image, $target_file)){
			die('{"error":"Could not save GIF file."}');
		}
		break;
	case IMAGETYPE_PNG:
		if(!imagepng($dest_image, $target_file, max(9 - floor($quality/10),0))){
			die('{"error":"Could not save PNG file."}');
		}
		break;
	case IMAGETYPE_JPEG:
		if(!imagejpeg($dest_image, $target_file, $quality)){
			die('{"error":"Could not save JPG file."}');
		}
		break;
}
imagedestroy($dest_image);
imagedestroy($source_image);
//If we made it that far with no error, we can return a success message, with the thumb filename
die('{"success":"'.$thumb.'"}');
?>
 