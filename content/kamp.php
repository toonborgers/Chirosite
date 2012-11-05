<div class="titlecontainer">
	<span class="titletext">Kamp</span>
</div>
<div class="bodytext">
	<?php
		$chiro = $_GET['chiro'];
		$queryResult = doSelectForSingleResult("SELECT adres, tekst FROM new_kamp WHERE chiro=$chiro;");
		if(mysql_num_rows($queryResult)==0) {
			echo "Rarara.. naar waar zullen we dit jaar op kamp gaan?!";
		} else {
			echo $queryResult['tekst'];
		}
	?>
</div>