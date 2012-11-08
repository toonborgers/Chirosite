<?php 
	/*
	 * Nieuws opvragen
	 * $nieuwsTabel geeft een volledig opgemaakte tabel inclusief een verwijder-button
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
	 * $posterTabel geeft een volledig opgemaakte tabel inclusief verwijder-button
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
	 * Chiro opvragen
	 * $chiro is ofwel j ofwel m, en wordt uit de sessie gehaald
	 */
	$login = $_SESSION['login'];
	$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
	$chiro = $chiro['chiro'];
	
	/*
	 * Groepen
	 */
	if($chiro=='j') {
		$groepen = array(1=>"Sloebers", 2=>"Speelclub", 3=>"Rakkers", 4=>"Toppers", 5=>"Kerels", 6 =>"Aspiranten");
	} else {
		$groepen = array(1=>"Pinkels", 2=>"Speelclub", 3=>"Kwiks", 4=>"Tippers", 5=>"Tiptiens", 6 =>"Aspi's");
	}
	
	/*
	 * Programma's opvragen
	 * $programmaArray[1] geeft het programma van de sloebers, $programmaArray[2] van de speelclub enzovoort,
	 * indien $chiro m is, is dit dat van de meisjes natuurlijk.
	 * $programmaArray[0] is een algemeen bericht.
	 */
	$programmas = doSelectForMultipleResults("SELECT groep, programma FROM new_programmas WHERE chiro='$chiro' ORDER BY groep ASC");
	foreach($programmas as $programma) {
		$groep = $programma['groep'];
		$programmaArray[$groep] = $programma['programma'];
	}
	
?>
<div class="titlecontainer">
	<span class="titletext">Portal</span>
</div>
<div class="bodytext" style="padding:12px;" align="center">
	<span class="smalltitle">Nieuws</span><br />
	<?php echo $nieuwsTabel ?>
	<form action="database/addNieuws.php" method="post">
		<textarea class="bigger" maxlength="100" name="bericht"></textarea><br /><input type="submit" value="Voeg nieuwsbericht toe">
	</form><br />
	
	<span class="smalltitle">Poster</span><br />
	<?php echo $posterTabel ?>
	<form action="database/addPoster.php" method="post">
		<input type="file" name="poster"><br /><input type="submit" value="Voeg poster toe">
	</form><br />
	
	<span class="smalltitle">Programma's</span><br />
	<form action="database/addProgrammas.php?chiro=<?php echo $chiro ?>" method="post">
		<table>
			<!--kan in een loop worden gezet mbv php -->
			<tr><td><label for="1"><?php echo $groepen[1] ?></label></td><td>
				<textarea class="bigger" maxlength="100" name="1"><?php echo $programmaArray[1] ?></textarea></td></tr>
			<tr><td><label for="2">Speelclub</label></td><td>
				<textarea class="bigger" maxlength="100" name="2"><?php echo $programmaArray[2] ?></textarea></td></tr>
			<tr><td><label for="3">Rakkers</label></td><td>
				<textarea class="bigger" maxlength="100" name="3"><?php echo $programmaArray[3] ?></textarea></td></tr>
			<tr><td><label for="4">Toppers</label></td><td>
				<textarea class="bigger" maxlength="100" name="4"><?php echo $programmaArray[4] ?></textarea></td></tr>
			<tr><td><label for="5">Kerels</label></td><td>
				<textarea class="bigger" maxlength="100" name="5"><?php echo $programmaArray[5] ?></textarea></td></tr>
			<tr><td><label for="6">Aspiranten</label></td><td>
				<textarea class="bigger" maxlength="100" name="6"><?php echo $programmaArray[6] ?></textarea></td></tr>
			<tr><td><label for="0">Algemeen</label></td><td>
				<textarea class="bigger" maxlength="100" name="0"><?php echo $programmaArray[0] ?></textarea></td></tr>
		</table>
		<input type="submit" value="Verander programma's">
	</form>
</div>