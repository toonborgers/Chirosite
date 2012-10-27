<?php
	include_once 'dbUtil.php';
	$bericht = $_POST["bericht"];
	$sql = "INSERT INTO new_nieuws VALUES (NULL , CURDATE() , '$bericht');";
	doInsert($sql);
	header("Location: ../index.php?page=portal");
?>