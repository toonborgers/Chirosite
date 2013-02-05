<?php
	$sql = "SELECT datum, bericht FROM new_nieuws ORDER BY id DESC";	$nieuws = doSelectForMultipleResults($sql);	
	foreach ($nieuws as $rij) {		$datum = date("d/m",strtotime($rij["datum"]));		echo $datum .": ". $rij["bericht"]. "<br />";	}
?>