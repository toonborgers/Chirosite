<?php
	$login = $_SESSION['login'];
	$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
	$chiro = $chiro['chiro'];
	$title = ($chiro == 'j' ? "Leiders" : "Leidsters");
	$snijduif = substr($title, 0, strlen($title)-1);
	
	 $groepen = ($chiro == 'j' ? 	array(0 => "VB", 1 => "Sloebers", 2 => "Speelclub", 3 => "Rakkers", 4 => "Toppers", 5 => "Kerels", 6 => "Aspiranten") :
 									array(0 => "VB", 1 => "Pinkels", 2 => "Speelclub", 3 => "Kwiks", 4 => "Tippers", 5 => "Tiptiens", 6 => "Aspi's"));
?>
<div class="titlecontainer">
	<span class="titletext">Portal: <?php echo $title ?></span>
</div>
<div class="bodytext">
	<span class="smalltitle"><?php echo $snijduif ?> toevoegen</span>
	<form enctype="multipart/form-data" action="database/addLeiding.php?chiro=<?php echo $chiro ?>" method="post">
		<table>
		<tr><td>Naam: </td><td><input type="text" name="naam" size="30" max="100"></td></tr>
		<tr><td>Email: </td><td><input type="text" name="email" size="30" max="100"></td></tr>
		<tr><td>Functie: </td><td><input type="text" name="functie" size="30" max="100"></td></tr>
		<tr><td>Afdeling: </td><td><select name="afdeling">
			<?php
			for ($i=0; $i < 7; $i++)
				echo "<option value='$i'>".$groepen[$i]."</option>";
			?>
		</select></td></tr>
		<tr><td>Foto: </td><td><input type="file" name="foto" id="foto" /></td><td>s
		</table>
		<input type="submit" value="Voeg toe" />
	</form><br />
	<?php 
		$editable = TRUE;
		include 'database/leider.php';
	?>
</div>