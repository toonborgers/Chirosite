<?php
	session_start();
	include_once 'dbUtil.php';
	
    $login = $_SESSION['login'];
	$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
	$chiro = $chiro['chiro'];
	
	function isWeekend($date) { return (date('N', strtotime($date)) >= 5); }
	
	function delete_verhuurdatum($datum, $chiro) {
		delete("DELETE FROM new_verhuurdatum WHERE datum = '$datum' AND chiro = '$chiro';");
	}
	
	$datum= $_GET["datum"];
	if(isWeekend($datum)) {
		$date = strtotime($datum);
		delete_verhuurdatum(date('Y-m-d', $date), $chiro);
		switch (date('N', strtotime($datum))) {
			case 5:
				delete_verhuurdatum(date('Y-m-d', strtotime('next saturday', $date)), $chiro);
				delete_verhuurdatum(date('Y-m-d', strtotime('next sunday', $date)), $chiro);
				break;
			case 6:
				delete_verhuurdatum(date('Y-m-d', strtotime('last friday', $date)), $chiro);
				delete_verhuurdatum(date('Y-m-d', strtotime('next sunday', $date)), $chiro);
				break;
			case 7:
				delete_verhuurdatum(date('Y-m-d', strtotime('last friday', $date)), $chiro);
				delete_verhuurdatum(date('Y-m-d', strtotime('last saturday', $date)), $chiro);
				break;
			default: break;
		}
	} else {
		delete_verhuurdatum(date('Y-m-d', strtotime($datum)), $chiro);
	}
	
	header("Location: ../index.php?page=verhuurkalenderAanpassen#jeetsken");
?>