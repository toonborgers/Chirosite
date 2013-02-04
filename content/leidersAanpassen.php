<?php
	$chiro = $_GET["chiro"];
	if($chiro=='j') {
		$title = "Leiders";
	} else {
		$title = "Leidsters";
	}
?>
<div class="titlecontainer">
	<span class="titletext">Portal: <?php echo $title ?></span>
</div>
<div class="bodytext">
	<?php 
		$editable = TRUE;
		include 'database/leider.php';
	?>
</div>