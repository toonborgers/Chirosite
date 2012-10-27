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
	
	$sql = "SELECT DATE_FORMAT(datum, '%e/%m/%Y') as datum, bericht, id FROM new_nieuws ORDER BY datum DESC";
	$berichten = doSelectForMultipleResults($sql);
	$nieuwsTabel = "<table border='0'><tr><th>Datum</th><th>Bericht</th><th>&nbsp;</th></tr>";
	foreach($berichten as $bericht){
    	$nieuwsTabel .= "<tr><td>".$bericht["datum"] . "</td><td>" . $bericht["bericht"] . "</td><td><a href=\"database/deleteNieuws.php?id=". $bericht["id"] ."\"><img src='static/images/delete.png' height='11' style='border-style:none'/></a>
		</span></a></td></tr>";
	}
	$nieuwsTabel.="</table>";
	if(empty($berichten)) {
	 	$nieuwsTabel = "Er zijn geen nieuwsberichten om weer te geven.";
	}
?>

<span class="titletext">Portal</span>
<div class="bodytext" style="padding:12px;" align="center">
	<span class="smalltitle">Nieuws</span><br />
	<?php echo $nieuwsTabel ?>
	<form action="database/addNieuws.php" method="post">
		<input type="text" size="50" maxlength="100" name="bericht"></textarea><input type="submit" value="Voeg nieuwsbericht toe">
	</form>
	<span class="smalltitle">Poster</span><br />
	<form action="database/addPoster.php" method="post">
		<input type="file" name="poster"><br /><input type="submit" value="Voeg poster toe">
	</form>
</div>