<?php
	session_start();
	include_once 'dbUtil.php';
	
    $login = $_SESSION['login'];
	$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
	$chiro = $chiro['chiro'];
	
	function isWeekend($date) { return (date('N', strtotime($date)) >= 5); }
	
	function insert_verhuurdatum($datum, $chiro) {
		doInsert("INSERT INTO new_verhuurdatum VALUES (NULL , '$datum' , '$chiro');");
	}
	
	$datum= $_GET["datum"];
	if(isWeekend($datum)) {
		$date = strtotime($datum);
		insert_verhuurdatum(date('Y-m-d', $date), $chiro);
		switch (date('N', strtotime($datum))) {
			case 5:
				insert_verhuurdatum(date('Y-m-d', strtotime('next saturday', $date)), $chiro);
				insert_verhuurdatum(date('Y-m-d', strtotime('next sunday', $date)), $chiro);
				break;
			case 6:
				insert_verhuurdatum(date('Y-m-d', strtotime('last friday', $date)), $chiro);
				insert_verhuurdatum(date('Y-m-d', strtotime('next sunday', $date)), $chiro);
				break;
			case 7:
				insert_verhuurdatum(date('Y-m-d', strtotime('last friday', $date)), $chiro);
				insert_verhuurdatum(date('Y-m-d', strtotime('last saturday', $date)), $chiro);
				break;
			default: break;
		}
	} else {
		insert_verhuurdatum(date('Y-m-d', strtotime($datum)), $chiro);
	}
	
	header("Location: ../index.php?page=verhuurkalenderAanpassen#jeetsken");
?>