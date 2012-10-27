<?php
    include_once 'imageUtil.php';
	$poster = $_POST["poster"];
	addImage($poster); //Hie zit nog iet nie goe
	header("Location: ../index.php?page=portal");
?>