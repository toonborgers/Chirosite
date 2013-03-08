<div class="titlecontainer">
	<span class="titletext">Oudercomit&#233;</span>
</div>
<div class="bodytext">
	<?php
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_oudercomite ORDER BY id DESC LIMIT 1");
		echo $queryResult['tekst'];
	?>
</div>