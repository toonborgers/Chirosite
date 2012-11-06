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
		
		$securedPages = array(
			"portal" => loginCorrect()
		);
		
		$page = array_key_exists ($pageName, $pages) ? $pages[$pageName] : $pages["home"] ;
		
		if(array_key_exists($pageName, $securedPages) && !$securedPages[$pageName] ){
			$page = "home.php";
		}
	}
	
	function loginCorrect(){
		if(isset($_SESSION['login'])){
			return true;
		}
		
		if(!isset($_POST['login']) || !isset($_POST['password'])){
			return false;
		}else{			
			$login = $_POST['login'];
			$password = $_POST['password'];
			$beep = doSelectForSingleResult("SELECT * FROM new_login WHERE login='$login' and wachtwoord='$password'");
			
			if(count($beep)==0){
				return false;
			}else{
				$_SESSION['login'] = $login;
			}
		}
		
		return true;
	}
	
?>