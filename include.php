<?php
	$pages=array("home" => "home.php");
	$page="home";

	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	
	if (array_key_exists($page, $pages) && file_exists($pages[$page])) {
		include_once $pages[$page];
	}else{
		include_once "nietGevonden.php";
	}
?>