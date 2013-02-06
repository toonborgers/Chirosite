<?php

function generateSubMenu($chiro) {
	$display = "";
	if($chiro == $_SESSION['submenu']) {
		$display = "style='display:inline;'";
	}
	$facebookLink = ($chiro=='j' ? 'http://www.facebook.com/pages/Chirojongens-Kasterlee/361776797234878' : 'http://www.facebook.com/chiromeisjes.kasterlee');
	echo "<span id='$chiro"."menu' $display>
	<a href='index.php?page=info&chiro=$chiro'>Info</a> | <a href='index.php?page=prog&chiro=$chiro'>Programma's</a> |
	<a href='index.php?page=kamp&chiro=$chiro'>Het kamp</a> | <a href='index.php?page=kalender&chiro=$chiro'>Kalender</a> | 
	<a href='index.php?page=huren&chiro=$chiro'>Huren</a> | <a href='$facebookLink'>
	<img src='static/images/facebook-icon.png' height='11' style='border-style:none'/></a></span>";
}

?>

<div id="logo"><a href="index.php"><img src="static/images/logo.jpg" style="border-style:none"/></a></div>
<div id="topheader">
	<div align="left" class="beep">
		<img src="static/images/chirokasterlee.jpg"/>
	</div>
</div>
<div id="menu">
	<div align="right" class="smallwhitetext" style="padding:9px;">
		<a href="index.php?page=home">Home</a> | <a id="jongenslink" href="javascript:void(0)">Jongens</a> | 
		<a id="meisjeslink" href="javascript:void(0)">Meisjes</a> | <a href="index.php?page=fotos">Foto's</a> | 
		<a href="index.php?page=chirofeesten">Chirofeesten</a> | <a href="index.php?page=contact">Contact</a> 
	</div>
</div>
<div id="submenu">
	<div align="right" class="smallgraytext" style="padding:9px;">
		<?php 
		generateSubMenu('j');
		generateSubMenu('m'); 
		?>
	</div>
</div>

