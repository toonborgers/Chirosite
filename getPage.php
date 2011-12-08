<?php
	$pages=array("home" => "home.php");
	$titles=array("home" => "Home");
	$pageName="home";
	$page="";
	$title="";
	
	if(isset($_GET["page"])){
		$pageName = $_GET["page"];
	}
	
	if (array_key_exists($pageName, $pages) && file_exists($pages[$pageName])) {
		$page= $pages[$pageName];
		$title=$titles[$pageName];
	}else{
		$page= "nietGevonden.php";
	}
?>
