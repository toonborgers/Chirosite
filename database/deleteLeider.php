<?php
	include_once 'dbUtil.php';
	$id = $_GET["id"];
	delete("DELETE FROM new_leiding WHERE id = '$id'");
	delete("DELETE FROM new_functie WHERE leidingId = '$id'");
	header("Location: ../index.php?page=portal");
?>