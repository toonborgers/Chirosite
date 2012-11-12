<?php
	$page = "home.php";
	if(isset($_GET["page"])){
		$pageName= $_GET["page"];

		//hier nieuwe paginas zetten, dan op de link (in menu bvb): <a href="index.php?page=bla"/>
		$pages = array(
			"home" => "home.php",
			"info" => "info.php",
			"prog" => "prog.php",
			"jHuren" => "jHuren.php",
			"kamp" => "kamp.php",
			"portal" => "portal.php",
			"contact" => "contact.php"
		);
		
		$page = array_key_exists ($pageName, $pages) ? $pages[$pageName] : $pages["home"] ;
	}
?>