<?php
/* function:  generates thumbnail */
function make_thumb($src,$dest,$desired_width) {
	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image,$dest);
}

/* function:  returns files from dir */
function get_files($images_dir,$exts = array('jpg','jpeg')) {
	$files = array();
	if($handle = opendir($images_dir)) {
		while(false !== ($file = readdir($handle))) {
			$extension = strtolower(get_file_extension($file));
			if($extension && in_array($extension,$exts)) {
				$files[] = $file;
			}
		}
		closedir($handle);
	}
	return $files;
}

/* function:  returns a file's extension */
function get_file_extension($file_name) {
	return substr(strrchr($file_name,'.'),1);
}


if (isset($_POST['submit']) ){
    $name = @$_POST['name'];
    $email = @$_POST['email'];
    $message = @$_POST['message'];
    $from = 'From: Formularz WyjatkowyDzien'; 
    $to = 'biuro@wyjatkowy-dzien.esy.es'; 
    $subject = 'formularz kontaktowy';

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";


        if (mail ($to, $subject, $body, $from)){ 
            $msg = '<p>Twoja wiadomość została wysłana!</p>';
            
        } 
        else { 
            $msg = '<p>Coś poszło nie tak spróbuj przesłać wypełniony formularz jeszcze raz.</p>'; 
        }
    }
                    

















?>