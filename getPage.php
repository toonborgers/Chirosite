<?php
	$page = "home.php";
	if(isset($_GET["page"])){
		$pageName= $_GET["page"];

		//hier nieuwe paginas zetten, dan op de link (in menu bvb): <a href="index.php?page=bla"/>
		$pages = array(
			"home" => "home.php",
			"jInfo" => "jInfo.php",
			"jProg" => "jProg.php",
			"portal" => "portal.php"
		);

		$page = isset($pages[$pageName]) ? $pages[$pageName] : $pages["home"] ;
	
	}
	include "content/" . $page;
?>