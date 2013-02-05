<?php
	include_once 'dbUtil.php';
	$id = $_GET["id"];
	$afbeeldingId = doSelectForSingleResult("SELECT afbeeldingId FROM new_leiding WHERE id = '$id'");
	$afbeeldingId = $afbeeldingId['afbeeldingId'];
	delete("DELETE FROM new_leiding WHERE id = '$id'");
	delete("DELETE FROM new_functie WHERE leidingId = '$id'");
	delete("DELETE FROM new_afbeelding WHERE id = '$afbeeldingId'");
	header("Location: ../index.php?page=leidingAanpassen");
?>