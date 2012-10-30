<?php 
	include_once '../database/dbUtil.php';
	
	/*
	 * Juiste logingegevens?
	 */
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
	
	/*
	 * Nieuws opvragen
	 */
	$sql = "SELECT DATE_FORMAT(datum, '%e/%m/%Y') as datum, bericht, id FROM new_nieuws ORDER BY datum DESC";
	$berichten = doSelectForMultipleResults($sql);
	$nieuwsTabel = "<table border='0'><tr><th>Datum</th><th>Bericht</th><th>Verwijder</th></tr>";
	foreach($berichten as $bericht){
    	$nieuwsTabel .= "<tr><td>".$bericht["datum"] . "</td><td>" . $bericht["bericht"] . "</td><td align='center'><a href=\"database/deleteNieuws.php?id=". $bericht["id"] ."\"><img src='static/images/delete.png' height='11' style='border-style:none'/></a>
		</span></a></td></tr>";
	}
	$nieuwsTabel.="</table>";
	if(empty($berichten)) {
	 	$nieuwsTabel = "Er zijn geen nieuwsberichten om weer te geven.";
	}
	
	/*
	 * Posters opvragen
	 */
	include_once '../database/imageUtil.php';
	$sql = "SELECT id FROM new_afbeelding WHERE id NOT IN (SELECT afbeeldingId FROM new_leiding)";
	$posterIds = doSelectForMultipleResults($sql);
	$posterTabel = "<table border='0'><tr><th>Poster</th><th>Verwijder</th></tr>";
	foreach($posterIds as $posterId){
    	$posterTabel .= "<tr><td><img src=".getImage($posterId["id"])." width='60'></td><td align='center'><a href=\"database/deletePoster.php?id=". $posterId["id"] ."\"><img src='static/images/delete.png' height='11' style='border-style:none'/></a>
		</span></a></td></tr>";
	}
	$posterTabel.="</table>";
	if(empty($posterIds)) {
	 	$posterTabel = "Er zijn geen posters om weer te geven.";
	}
	
	/*
	 * Programma's opvragen
	 */
	 function getProgrammas($chiro) {
	 	$sql = "SELECT programma FROM new_programmas WHERE chiro='$chiro'";
		return doSelectForMultipleResults($sql);
	 }
	 $jProgrammas = getProgrammas('j');
	 $mProgrammas = getProgrammas('m');
?>

<span class="titletext">Portal</span>
<div class="bodytext" style="padding:12px;" align="center">
	<span class="smalltitle">Nieuws</span><br />
	<?php echo $nieuwsTabel ?>
	<form action="database/addNieuws.php" method="post">
		<textarea maxlength="100" name="bericht"></textarea><br /><input type="submit" value="Voeg nieuwsbericht toe">
	</form>
	<span class="smalltitle">Poster</span><br />
	<?php echo $posterTabel ?>
	<form action="database/addPoster.php" method="post">
		<input type="file" name="poster"><br /><input type="submit" value="Voeg poster toe">
	</form>
	<span class="smalltitle">Programma's jongens</span><br />
	<form action="database/addProgrammas.php?chiro=j" method="post">
		<table>
			<tr><td><label for="sloebers">Sloebers</label></td><td><textarea maxlength="100" name="sloebers"></textarea></td></tr>
			<tr><td><label for="speelclub">Speelclub</label></td><td><textarea maxlength="100" name="speelclub"></textarea></td></tr>
			<tr><td><label for="rakkers">Rakkers</label></td><td><textarea maxlength="100" name="rakkers"></textarea></td></tr>
			<tr><td><label for="toppers">Toppers</label></td><td><textarea maxlength="100" name="toppers"></textarea></td></tr>
			<tr><td><label for="kerels">Kerels</label></td><td><textarea maxlength="100" name="kerels"></textarea></td></tr>
			<tr><td><label for="aspiranten">Aspiranten</label></td><td><textarea maxlength="100" name="aspiranten"></textarea></td></tr>
		</table>
		<input type="submit" value="Verander programma's">
	</form>
</div>