<?php
	$chiro = $_GET["chiro"];
	if($chiro=='j') {
		$title = "Leiders";
	} else {
		$title = "Leidsters";
	}
?>
<div class="titlecontainer">
	<span class="titletext"><?php echo $title ?></span>
</div>
<div class="bodytext">
	<?php include 'database/leider.php';?>
</div>