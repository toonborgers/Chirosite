<div class="titlecontainer">
	<span class="titletext">Kalender</span>
</div>
<div class="bodytext">
	<?php
	$chiro = $_GET['chiro'];
	$kalenderItems = doSelectForMultipleResults("SELECT DISTINCT id, date_format(datum, '%d/%c/%Y') datum, activiteit FROM new_kalender WHERE chiro='$chiro' OR chiro='b' ORDER BY datum ASC");
	if (empty($kalenderItems)) {
		$kalenderTabel = "Er zijn geen kalender-items om weer te geven.";
	}
	echo "<table cellspacing='10'>";
	foreach ($kalenderItems as $kalenderItem) {
		echo "<tr><td><b>" . $kalenderItem['datum'] . "</b></td><td>" . $kalenderItem['activiteit'] . "</td></tr>";
	}
	echo "</table>";
?>
</div>