<?php
	include "db-info.php";
	$sql = "SELECT DATE_FORMAT(datum, '%e %b %Y') as datum, nieuws FROM tblNieuws ORDER BY datum DESC";
	$datums = doQuery($sql);	
	
	while ($rij = mysql_fetch_array($datums)) {
		echo "<p style=\"margin-top: 0; margin-bottom: 0\" align=\"left\"> <b> <font face=\"Verdana\" size=\"1\" color=\"#99FF33\">";
		echo $rij["datum"] .": ";
		echo "</font><font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\">";
		echo $rij["nieuws"];
		echo "</font> </b> </p> <hr noshade>";
	}
?>