<?php
	include_once "database/dbUtil.php";

	function getImage($id){		
		$foto = doSelectForSingleResult("SELECT * FROM new_afbeelding where id = $id");
		
		return 'data:'. $foto["type"] . ';base64,' . $foto['data'] ;	
	}
	
	function addImage($file){	
		$allowedExts = array("jpg", "jpeg", "gif", "png");
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
?>