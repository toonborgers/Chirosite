<?php
	include_once 'dbUtil.php';
	$id = $_GET["id"];
	delete("DELETE FROM new_afbeelding WHERE id = $id");
	header("Location: ../index.php?page=portal");
?>