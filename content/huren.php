<div class="titlecontainer">
	<span class="titletext">Huren</span>
</div>
<div class="bodytext">
	<?php
		$chiro = $_GET['chiro'];
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_verhuur WHERE chiro='$chiro' ORDER BY id DESC LIMIT 1");
		echo $queryResult['tekst'];
		echo "<br /><span class='smalltitle'>Kalender</span><br />
		Rode dagen betekent dat het lokaal dan reeds verhuurd is.<br />";
		include "content/verhuurKalendar.php";
		$nbOfMonths = 6; $columns = 3;
		
		generate_coloredCalenderTable($nbOfMonths, $columns, $chiro);
	?>
</div>