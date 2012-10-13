<?php 
	include_once '../database/dbUtil.php';
	session_start();
	if(!isset($_SESSION['login'])){
		
		if(!isset($_POST['login'])||!isset($_POST['password'])){
			header('location: http://chirokasterleee.be/newsite/index.php');
		}else{			
			$login = $_POST['login'];
			$password = $_POST['password'];
			$beep = doSelectForSingleResult("SELECT * FROM new_login WHERE login='$login' and wachtwoord='$password'");
			
			if(count($beep)==0){
				header('location: http://chirokasterleee.be/newsite/index.php');
			}else{
				$_SESSION['login'] = $login;
			}
		}
	}
?>


<div class="bodytext" style="padding:12px;" align="center">
	Hierop zal de smerigste porno en dergelijke meer te zien zijn. 
	<br />
	Jeetsken
</div>