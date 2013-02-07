<div class="titlecontainer">
	<span class="titletext">Huren</span>
</div>
<div class="bodytext">
	<?php
		echo "<span class='smalltitle'>Kalender</span>";
		include "content/calendar.php";
		$time = time();
		echo generate_calendar(date('Y', $time), date('n', $time));
		$chiro = $_GET['chiro'];
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_verhuur WHERE chiro='$chiro' ORDER BY id DESC LIMIT 1");
		echo $queryResult['tekst'];
	?>
</div>