<?php
	include_once 'dbUtil.php';
	$timestamp = strtotime($_POST["datum"]);
	$sqlDate = date('Y-m-d', $timestamp);
	$chiro = $_GET["chiro"];
	for ($i=0; $i < 7; $i++) { 
		$programma = $_POST["$i"];
		$programma = str_replace("'", "''", $programma);
		delete("DELETE FROM new_programmas WHERE groep='$i' AND chiro='$chiro';");
		doInsert("INSERT INTO new_programmas VALUES (NULL , '$chiro' , '$sqlDate' , '$i' , '$programma');");
	}
	header("Location: ../index.php?page=portal");
?>