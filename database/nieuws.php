<?php
	$sql = "SELECT datum, bericht FROM new_nieuws ORDER BY datum DESC";	$nieuws = doSelectForMultipleResults($sql);	
	foreach ($nieuws as $rij) {		$datum = date("d/m/Y",strtotime($rij["datum"]));		echo $datum .": ". $rij["bericht"]. "<br />";	}
?>