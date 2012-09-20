<?php
	$sql = "SELECT DATE_FORMAT(datum, '%e %b %Y') as datum, nieuws FROM tblNieuws ORDER BY datum DESC";
	$datums = mysql_query($sql);
	$nieuws = '';
	while ($rij = mysql_fetch_array($datums)) {
		$nieuws .= "<p style=\"margin-top: 0; margin-bottom: 0\" align=\"left\"> <b> <font face=\"Verdana\" size=\"1\" color=\"#99FF33\">";
		$nieuws .= $rij["datum"] .": ";
		$nieuws .= "</font><font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\">";
		$nieuws .= $rij["nieuws"];
		$nieuws .= "</font> </b> </p> <hr noshade>";
	}
?>