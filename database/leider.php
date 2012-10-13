<?php
	
	if(isset($_GET["chiro"])){
		$chiro = $_GET["chiro"];
	}
	
	$sql = "SELECT * FROM new_leiding WHERE chiro = $chiro";
	$leiders = doSelectForMultipleResults($sql);
	
	foreach($leiders as $rij) {
		//hier moet nog shit gebeure maar daarvoor moet er nog een extra kolom afdeling in dn database komen
		//dan stel ik voor me nen tabel te werken volgens het voorbeeld in jInfo.php nu
	}
