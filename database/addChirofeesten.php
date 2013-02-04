<?php
    include_once 'dbUtil.php';
	$tekstje = $_POST["tekstje"];
	$tekstje = str_replace("'", "''", $tekstje);
	$sql = "INSERT INTO new_chirofeesten VALUES (NULL , '$tekstje');";
	doInsert($sql);
	header("Location: ../index.php?page=portal");
?>