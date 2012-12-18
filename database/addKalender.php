<?php
	include_once 'dbUtil.php';
	$timestamp = strtotime($_POST["datum"]);
	$sqlDate = date('Y-m-d', $timestamp);
	$activiteit = $_POST["activiteit"];
	$chiro = $_POST["chiro"];
	$activiteit = str_replace("'", "''", $activiteit);
	$sql = "INSERT INTO new_kalender VALUES (NULL , '$chiro' , '$sqlDate' , '$activiteit');";
	doInsert($sql);
	header("Location: ../index.php?page=portal");
?>