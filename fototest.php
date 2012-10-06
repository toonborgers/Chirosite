<?php
include "database/db-info.php";

if(isset($_POST["bla"])){
	
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["foto"]["name"]));
	$fileType= $_FILES["foto"]["type"];
	
	if (($fileType == "image/gif" || $fileType == "image/jpeg" || $fileType == "image/png"|| $fileType == "image/pjpeg")
		&& in_array($extension, $allowedExts)){			
		$imgbinary = file_get_contents($_FILES['foto']['tmp_name']);
		$encoded = base64_encode($imgbinary);
		
		doQuery("insert into new_afbeelding(type, data) values ('$fileType', '$encoded')");
	}
}
?>

<html>
	<head>
		<title>foto test</title>
	</head>
	<body>
		<form enctype="multipart/form-data" action="fototest.php" method="post">
			<input type="file" name="foto" id="foto" />
			<input type="hidden" name="bla" id="bla" value="d"/>
			<br/>
			<input type="submit"/>
		</form>
		<hr/>
		<h3>fotos</h3>
		<?php
			$sql = "SELECT * FROM new_afbeelding";
			$fotos = doQuery($sql);	
			
			while ($foto = mysql_fetch_array($fotos)) {		
				echo "<p>";
				echo '<img src="data:image/'. $foto["type"] . ';base64,' . $foto['data'] . '"/>';
				echo "</p>";
			}
		
		?>
	</body>

</html>