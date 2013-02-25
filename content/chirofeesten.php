<div class="titlecontainer">
	<span class="titletext">Chirofeesten</span>
</div>
<div class="bodytext">
	<?php
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_chirofeesten ORDER BY id DESC LIMIT 1");
		echo $queryResult['tekst'];
	?>
</div>