<?php
	$sql = "SELECT datum, bericht FROM new_nieuws ORDER BY datum DESC";
	$datums = doQuery($sql);	
	
	while ($rij = mysql_fetch_array($datums)) {		
		echo "<p style=\"margin-top: 0; margin-bottom: 0\" align=\"left\"> <b> <font face=\"Verdana\" size=\"1\" color=\"#99FF33\">";
		echo $rij["datum"] .": ";
		echo "</font><font face=\"Verdana\" size=\"1\" >";
		echo $rij["bericht"];
		echo "</font> </b> </p> <hr noshade>";
	}
?>