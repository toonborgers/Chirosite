<div class="titlecontainer">
	<span class="titletext">Kalender</span>
</div>
<div class="bodytext">
	<?php
	$chiro = $_GET['chiro'];
	$sql = "SELECT DISTINCT id, datum, activiteit FROM new_kalender WHERE chiro='$chiro' OR chiro='b' ORDER BY datum ASC";
	$kalenderItems = doSelectForMultipleResults($sql);
	if (empty($kalenderItems)) {
		$kalenderTabel = "Er zijn geen kalender-items om weer te geven.";
	}
	echo "<table cellspacing='10'>";
	foreach ($kalenderItems as $kalenderItem) {
		echo "<tr><td><b>" . date("d/m/Y", strtotime($kalenderItem['datum'])) . "</b></td><td>" . $kalenderItem['activiteit'] . "</td></tr>";
	}
	echo "</table>";
?>
</div>