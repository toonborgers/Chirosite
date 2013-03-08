<?php

$login = $_SESSION['login'];
$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
$chiro = $chiro['chiro'];
$chiroFull = ( $chiro=='j' ? "jongens" : "meisjes" );

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
 
    /**
 * Oudercomité tekstje opvragen
 * $oudercomite is een string met daarin de tekst.
 */
 
 $oudercomite = doSelectForSingleResult("SELECT tekst FROM new_oudercomite ORDER BY id DESC LIMIT 1");
 $oudercomite = $oudercomite['tekst'];
 $oudercomite = htmlspecialchars($oudercomite);
?>
<div class="titlecontainer">
	<span class="titletext">Tekstjes aanpassen</span>
</div>
<div class="bodytext">
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
	
	<span class="smalltitle">Oudercomit&#233;</span><br />
	<form action="database/addOudercomite.php" method="post">
		<textarea class="biggest" maxlength="5000" name="tekstje"><?php echo $oudercomite ?></textarea><br />
		<input type="submit" value="Pas oudercomite-tekstje aan" />
	</form><br /><br />
</div>