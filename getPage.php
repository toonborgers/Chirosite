<?php
	$page = "home.php";
	if(isset($_GET["page"])){
		$pageName= $_GET["page"];

		//hier nieuwe paginas zetten, dan op de link (in menu bvb): <a href="index.php?page=bla"/>
		$pages = array(
			"home" => "home.php",
			"info" => "info.php",
			"jProg" => "jProg.php",
			"jHuren" => "jHuren.php",
			"jKamp" => "jKamp.php",
			"portal" => "portal.php",
			"contact" => "contact.php"
		);

		$page = isset($pages[$pageName]) ? $pages[$pageName] : $pages["home"] ;
	
	}
	include "content/" . $page;
?>