<div class="titlecontainer">
	<span class="titletext">Kamp</span>
</div>
<div class="bodytext">
	<?php
		$chiro = $_GET['chiro'];
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_kamp WHERE chiro='$chiro' ORDER BY id DESC LIMIT 1");
		if(count($queryResult)==0) {
			echo "Rarara.. naar waar zullen we dit jaar op kamp gaan?!";
		} else {
			echo $queryResult['tekst'];
		}
	?>
</div>