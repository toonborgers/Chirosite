<?php
	$page = "home.php";
	if(isset($_GET["page"])){
		$pageName= $_GET["page"];

		//hier nieuwe paginas zetten, dan op de link (in menu bvb): <a href="index.php?page=bla"/>
		$pages = array(
			"home" => array("home.php", false),
			"info" => array("info.php", false),
			"prog" => array("prog.php", false),
			"jHuren" => array("jHuren.php", false),
			"kamp" => array("kamp.php", false),
			"portal" => array("portal.php", true),
			"contact" => array("contact.php", false)
		);
		
		$page = array_key_exists ($pageName, $pages) ? $pages[$pageName][0] : "home.php";
		
		if(array_key_exists ($pageName, $pages)){
			$page = $pages[$pageName][0];
			
			if($pages[$pageName][0] && !isset($_SESSION['login'])){
				$page = "home.php";
			}
		}
	}
?>