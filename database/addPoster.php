<?php
	include_once 'imageUtil.php';
	echo addImage($_FILES["poster"]);
	header("Location: ../index.php?page=portal");
?>