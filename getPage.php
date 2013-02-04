<?php
	$page = "home.php";
	if(isset($_GET["page"])) {
		$pageName= $_GET["page"];

		//hier nieuwe paginas zetten, dan op de link (in menu bvb): <a href="index.php?page=bla"/>
		$pages = array(
			"home" => array("home.php", false),
			"info" => array("info.php", false),
			"prog" => array("prog.php", false),
			"huren" => array("huren.php", false),
			"kamp" => array("kamp.php", false),
			"portal" => array("portal.php", true),
			"contact" => array("contact.php", false),
			"kalender" => array("kalender.php", false),
			"portal_help" => array("portal_help.php", true),
			"chirofeesten" => array("chirofeesten.php", false)
		);
		
		if(array_key_exists ($pageName, $pages)){
			if(!$pages[$pageName][1] || isset($_SESSION['login'])) {
				$page = $pages[$pageName][0];
			} 
		}
	}
	
	if(isset($_GET["chiro"])) {
		session_start();
		$_SESSION['submenu'] = $_GET["chiro"];
	} else {
		unset($_SESSION['submenu']);
	}
?>