<?php
    include_once 'dbUtil.php';
	include_once 'imageUtil.php';
	$chiro = $_GET["chiro"];
	$naam = $_POST["naam"];
	$email = $_POST["email"];
	$functie = $_POST["functie"];
	$afdeling = $_POST["afdeling"];
	$foto = $_FILES["foto"];
	
	function goBack($fout, $chiro) {
		echo "<script>alert('".$fout."');window.location.href='../index.php?page=leidersAanpassen&chiro=".$chiro."';</script>";
	}
	
	if(empty($naam) || empty($email))
		goBack("Vul alle velden in", $chiro);
	
	$afbeeldingId = addImage($foto);
	if(!is_int($afbeeldingId)) {
		goBack($afbeeldingId, $chiro);
	}
	
	$leidingId = doInsert("INSERT INTO new_leiding VALUES (NULL , '$chiro' , '$naam' , '$email' , '$afdeling' , '$afbeeldingId')");
	if(!empty($functie))
		doInsert("INSERT INTO new_functies VALUES (NULL , '$functie' , '$leidingId')");
	
	header("Location: ../index.php?page=leidingAanpassen");
?>