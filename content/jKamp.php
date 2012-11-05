<div class="titlecontainer">
	<span class="titletext">Kamp</span>
</div>
<div class="bodytext">
	<?php
		$queryResult = doSelectForSingleResult('SELECT adres, tekst FROM new_kamp WHERE chiro="j";');
		if(mysql_num_rows($queryResult)==0) {
			echo "Rarara.. waar zullen we dit jaar naar op kamp gaan?!";
		} else {
			echo $queryResult['tekst'];
		}
	?>
</div>