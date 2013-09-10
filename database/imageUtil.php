<?php

	include_once "database/dbUtil.php";

	function getImage($id){		
		$foto = doSelectForSingleResult("SELECT * FROM new_afbeelding where id = $id");
		
		return 'data:'. $foto["type"] . ';base64,' . $foto['data'] ;	
	}
	
	function addImage($file){	
		$allowedExts = array("jpg", "JPG", "jpeg", "JPEG", "gif", "GIF", "png", "PNG");
		$extension = end(explode(".", $file["name"]));
		$fileType= $file["type"];
		
		if (($fileType == "image/gif" || $fileType == "image/jpeg" || $fileType == "image/png"|| $fileType == "image/pjpeg")
			&& in_array($extension, $allowedExts)){			
			$imgbinary = file_get_contents($file['tmp_name']);
			$encoded = base64_encode($imgbinary);
			
			$id =  doInsert("insert into new_afbeelding(type, data) values ('$fileType', '$encoded')");
			
			if($id == -1){
				$fout = 'Toevoegen van de afbeelding is mislukt';
			}
		} else {
			$fout = 'Afbeelding is van een ongeldig type';
		}
		
		if(isset($fout)){
			return $fout;
		} else {
			return $id;
		}
	}
	
	include_once "simpleImage.php";
	
	/**
	 * Da krijk hie nie kleer me hetgeen wa em als argument bij addImage verwacht.
	 */
	function resizeAndAddImage_width($foto, $width) {
      	$image = new SimpleImage();
		$image->load($foto['tmp_name']);
		$image->resizeToWidth($width);
		return addImage($image->image);
	}
	
	function resizeAndAddImage_height($foto, $height) {
		$image = new SimpleImage();
		$image->resizeToHeight($height);
		addImage($image->image);
	}
?>