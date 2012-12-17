<?php
	include_once "dbUtil.php"; // dbUtil pls.
	include_once "imageUtil.php";
	
	addImage($_FILES["poster"]);
	header("Location: ../index.php?page=portal");
?>