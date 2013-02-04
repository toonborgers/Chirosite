<?php
    include_once 'dbUtil.php';
	$tekstje = $_POST["kamp"];
	$tekstje = str_replace("'", "''", $tekstje);
	$chiro = $_GET['chiro'];
	$sql = "INSERT INTO new_kamp VALUES (NULL , '$chiro' , '$tekstje');";
	doInsert($sql);
	header("Location: ../index.php?page=portal");
?>