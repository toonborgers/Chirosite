<h2>Nieuws</h2>
<?php
	//include_once 'db.php';
	//$db = new DB();
	//$nieuwsberichten = $db->doeQuery('SELECT * FROM nieuws_item ORDER BY datum DESC');
	$nieuwsberichten = R::find('nieuws_item',' 1 ORDER BY datum DESC');
	foreach($nieuwsberichten as $nieuwsbericht){
		echo "<div class='nieuwsbericht'>";
			echo $nieuwsbericht->tekst;
			echo "<div class='nieuwsberichtDatum'>";		
				echo $nieuwsbericht->datum;
			echo "</div>";
		echo "</div>";
	}
?>