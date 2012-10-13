<?php
	session_start();
	if(isset($_POST['action'])){
		switch ($_POST['action']) {
			case 'isUserLoggedIn':
				if(isset($_SESSION['login'])){
					echo '1';
				}else{
					echo'0';
				}
				break;
			
			default:
				echo 'niks';
				break;
		}
	}
?>