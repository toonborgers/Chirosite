<?php
	session_start();
	include_once 'database/dbUtil.php';
	
	if(isset($_SESSION['login'])){
		header("Location: index.php?page=portal");
	}
	
	if(isset($_POST['login']) && isset($_POST['password'])){
		$login = $_POST['login'];
		$password = $_POST['password'];
		$sql = "SELECT count(*) as aantal FROM new_login WHERE login='$login' and wachtwoord='$password'";
		$logins = doSelectForSingleResult($sql);
		
		if($logins["aantal"] != "0") {
			$_SESSION['login'] = $login;
			header("Location: index.php?page=portal");
		}
	}
	else {
		header("Location: index.php");
	}
?>