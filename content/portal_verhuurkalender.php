<div class="titlecontainer">
	<span class="titletext">Verhuurkalender aanpassen</span>
</div>
<div class="bodytext">
	Door op blauwe dagen te klikken, voeg je een datum toe (deze wordt dan rood). Indien het lokaal voor een weekend 
	gereserveerd is, is het voldoende om op &eacute;&eacute;n dag in dat weekend te klikken, de rest zal ook automatisch
	aangeduid worden. Op rode dagen kan eveneens geklikt worden, deze worden dan uit de kalender verwijderd. 
	Voor weekends is het ook voldoende om &eacute;&eacute;n dag in dat weekend te verwijderen, om zo het hele weekend vrij 
	te maken.<a name="jeetsken"></a>
<?php
    $login = $_SESSION['login'];
	$chiro = doSelectForSingleResult("SELECT chiro FROM new_login WHERE login='$login'");
	$chiro = $chiro['chiro'];
	
	include "content/verhuurKalender.php";
	$nbOfMonths = 6; $columns = 3;
	generate_coloredCalenderTable($nbOfMonths, $columns, $chiro, TRUE);
?>
</div>