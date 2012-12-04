<?php
	include_once 'dbUtil.php';
	$datum = $_POST["datum"];
	$chiro = $_GET["chiro"];
	for ($i=0; $i < 7; $i++) { 
		$programma = $_POST["$i"];
		$programma = str_replace("'", "''", $programma);
		delete("DELETE FROM new_programmas WHERE groep='$i';");
		doInsert("INSERT INTO new_programmas VALUES (NULL , '$chiro' , '$datum' , '$i' , '$programma');");
	}
	header("Location: ../index.php?page=portal");
?>