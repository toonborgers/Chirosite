<?php

/*
 * Nieuws opvragen
 * $nieuwsTabel geeft een volledig opgemaakte tabel inclusief een verwijder-button
 */
$sql = "SELECT datum, bericht, id FROM new_nieuws ORDER BY id DESC";
$berichten = doSelectForMultipleResults($sql);
$nieuwsTabel = "<table>";
foreach ($berichten as $bericht) {
	$nieuwsTabel .= "<tr><td style='padding-right:10px'>" . date("d/m", strtotime($bericht["datum"])) . 
	"</td><td style='padding-right:10px'>" . htmlspecialchars($bericht["bericht"]) . "</td><td align='center'>
	<a href=\"database/deleteNieuws.php?id=" . $bericht["id"] . "\">
	<img src='static/images/delete.png' height='11' style='border-style:none'/></a>
	</a></td></tr>";
}
$nieuwsTabel .= "</table>";
if (empty($berichten)) {
	$nieuwsTabel = "Er zijn geen nieuwsberichten om weer te geven.";
}

/*
 * Posters opvragen
 * $posterTabel geeft een volledig opgemaakte tabel inclusief verwijder-button
 */
include_once '../database/imageUtil.php';
$sql = "SELECT id FROM new_afbeelding WHERE id NOT IN (SELECT afbeeldingId FROM new_leiding)";
$posterIds = doSelectForMultipleResults($sql);
$posterTabel = "<table><tr>";
foreach ($posterIds as $posterId) {
	$posterTabel .= "<td><img src=" . getImage($posterId["id"]) . " width='100'></td><td align='center'><a href=\"database/deletePoster.php?id=" . $posterId["id"] . "\"><img src='static/images/delete.png' height='11' style='border-style:none'/></a>
		</a></td>";
}
$posterTabel .= "</tr></table>";
if (empty($posterIds)) {
	$posterTabel = "Er zijn geen posters om weer te geven.";
}
/*
 * Chiro opvragen
 * $chiro is ofwel j ofwel m, en wordt uit de sessie gehaald
 */
$login = $_SESSION['login'];
$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
$chiro = $chiro['chiro'];
$chiroFull = ( $chiro=='j' ? "Jongens" : "Meisjes" );
$chiroLeiding = ( $chiro == 'j' ? "Leiders" : "Leidsters");

/*
 * Groepen
 */
 $groepen = ($chiro == 'j' ? 	array(0 => "Algemeen", 1 => "Sloebers", 2 => "Speelclub", 3 => "Rakkers", 4 => "Toppers", 5 => "Kerels", 6 => "Aspiranten") :
 								array(0 => "Algemeen", 1 => "Pinkels", 2 => "Speelclub", 3 => "Kwiks", 4 => "Tippers", 5 => "Tiptiens", 6 => "Aspi's"));

/*
 * Programma's opvragen
 * $programmaArray[1] geeft het programma van de sloebers, $programmaArray[2] van de speelclub enzovoort,
 * indien $chiro m is, is dit dat van de meisjes natuurlijk.
 * $programmaArray[0] is een algemeen bericht.
 */
$programmas = doSelectForMultipleResults("SELECT groep, programma FROM new_programmas WHERE chiro='$chiro' ORDER BY groep ASC");
foreach ($programmas as $programma) {
	$groep = $programma['groep'];
	$programmaArray[$groep] = htmlspecialchars($programma['programma']);
}

/**
 * Kalender items opvragen
 * $kalenderTabel is een tabel met daarin alle resultaten geldend voor $chiro of beide chiro's (aangeduid met chiro='b(eide)')
 * Gesorteerd van vroeg naar later
 */
$kalenderItems = doSelectForMultipleResults("SELECT id, date_format(datum, '%d/%c/%Y') datum, activiteit FROM new_kalender WHERE chiro='$chiro' OR chiro='b' ORDER BY datum ASC");
$kalenderTabel = "<table>";
foreach ($kalenderItems as $kalenderItem) {
	$kalenderTabel .= "<tr><td>".$kalenderItem['datum']."</td><td>".htmlspecialchars($kalenderItem['activiteit'])."</td>
	<td align='center'><a href=\"database/deleteKalender.php?id=" . $kalenderItem["id"] . "\">
	<img src='static/images/delete.png' height='11' style='border-style:none'/></a></td></tr>";
}
$kalenderTabel .= "</table>";
if (empty($kalenderItems)) {
	$kalenderTabel = "Er zijn geen kalender-items om weer te geven.";
}


/**
 * Kamp tekstje opvragen
 * $kamp is een string met daarin de tekst.
 */
 
 $kamp = doSelectForSingleResult("SELECT tekst FROM new_kamp WHERE chiro = '$chiro' ORDER BY id DESC LIMIT 1");
 $kamp = $kamp['tekst'];
 $kamp = htmlspecialchars($kamp);
 
 /**
 * Verhuur tekstje opvragen
 * $verhuur is een string met daarin de tekst.
 */
 
 $verhuur = doSelectForSingleResult("SELECT tekst FROM new_verhuur WHERE chiro = '$chiro' ORDER BY id DESC LIMIT 1");
 $verhuur = $verhuur['tekst'];
 $verhuur = htmlspecialchars($verhuur);
 
  /**
 * Chirofeesten tekstje opvragen
 * $chirofeesten is een string met daarin de tekst.
 */
 
 $chirofeesten = doSelectForSingleResult("SELECT tekst FROM new_chirofeesten ORDER BY id DESC LIMIT 1");
 $chirofeesten = $chirofeesten['tekst'];
 $chirofeesten = htmlspecialchars($chirofeesten);
 
   /**
 * Contact tekstje opvragen
 * $contact is een string met daarin de tekst.
 */
 
 $contact = doSelectForSingleResult("SELECT tekst FROM new_contact ORDER BY id DESC LIMIT 1");
 $contact = $contact['tekst'];
 $contact = htmlspecialchars($contact);
 
?>
<div class="titlecontainer">
	<span class="titletext">Portal</span>
</div>
<div class="bodytext" style="padding:12px;" align="center">
	Als iets niet fatsoenlijk verschijnt of ge wilt afbeeldingen of ander speciale dings toevoegen, bekijk dan zeker <a href="index.php?page=portal_help">deze pagina</a>.<br /><br />
	<span class="smalltitle">Nieuws</span><br />
	<?php echo $nieuwsTabel ?>
	<form action="database/addNieuws.php" method="post">
		<textarea class="bigger" maxlength="500" name="bericht"></textarea><br /><input type="submit" value="Voeg nieuwsbericht toe" />
	</form><br />
	
	<span class="smalltitle">Posters</span><br />
	<?php echo $posterTabel ?>
	<form enctype="multipart/form-data" action="database/addPoster.php" method="post">
		<input type="file" name="poster" /><br />
		<input type="submit" value="Voeg poster toe" />
	</form><br />
	
	<span class="smalltitle">Programma's <?php echo $chiroFull ?></span><br />
	<form action="database/addProgrammas.php?chiro=<?php echo $chiro ?>" method="post">
		<table><tr><td><label for = "datum">Datum</label></td>
			<td><input type="text" class="calendar nextsunday" name="datum" /></td></tr>
			<?php
			for ($i = 0; $i < 7; $i++) {
				echo "<tr><td><label for='$i'>$groepen[$i]</label></td><td>
					<textarea class='bigger' maxlength='500' name='$i'>$programmaArray[$i]</textarea></td></tr>";
			}
		?>
		</table>
		<input type="submit" value="Verander programma's">
	</form></br>
	
	<span class="smalltitle">Kalender</span><br />
	<?php echo $kalenderTabel ?></br/></br/>
	<form action="database/addKalender.php" method="post">
		<label for="datum">Datum: </label><input type="text" class="calendar" name="datum" /> 
		<label for="chiro">Chiro: </label><input type="radio" name="chiro" value="<?php echo $chiro ?>"><?php echo $chiroFull ?>
		<input type="radio" name="chiro" value="b">Beide
		<textarea class="bigger" maxlength="500" name="activiteit"></textarea><br />
		<input type="submit" value="Voeg kalender-item toe" />
	</form><br />
	
	<span class="smalltitle">Info <?php echo $chiroLeiding ?></span><br />
	Klik <a href="index.php?page=leidingAanpassen">hier</a><br /><br />
	
	<span class="smalltitle">Kamp <?php echo $chiroFull ?></span><br />
	<form action="database/addKamp.php?chiro=<?php echo $chiro ?>" method="post">
		<textarea class="biggest" maxlength="5000" name="kamp"><?php echo $kamp ?></textarea><br />
		<input type="submit" value="Pas kamptekstje aan" />
	</form><br />
	
	<span class="smalltitle">Verhuur <?php echo $chiroFull ?></span><br />
	<form action="database/addVerhuur.php?chiro=<?php echo $chiro ?>" method="post">
		<textarea class="biggest" maxlength="5000" name="tekstje"><?php echo $verhuur ?></textarea><br />
		<input type="submit" value="Pas verhuur-tekstje aan" />
	</form><br />
	
	<span class="smalltitle">Chirofeesten</span><br />
	<form action="database/addChirofeesten.php" method="post">
		<textarea class="biggest" maxlength="5000" name="tekstje"><?php echo $chirofeesten ?></textarea><br />
		<input type="submit" value="Pas chirofeesten-tekstje aan" />
	</form><br />
	
	<span class="smalltitle">Contact</span><br />
	<form action="database/addContact.php" method="post">
		<textarea class="biggest" maxlength="5000" name="tekstje"><?php echo $contact ?></textarea><br />
		<input type="submit" value="Pas contact-tekstje aan" />
	</form><br /><br />
	
	<form action="logout.php" method="post">
		<input type="submit" value="Uitloggen" />
	</form>
</div>