<?php
    include_once 'imageUtil.php';
	addImage($_FILES["poster"]); //dafuq wrm werkt da nie
	header("Location: ../index.php?page=portal");
?>