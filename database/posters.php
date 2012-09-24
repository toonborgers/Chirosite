<?php
	include "db-info.php";
	$sql = "SELECT DATE_FORMAT(datum, '%e - %m - %Y') as datum, afbeelding, link FROM foto ORDER BY datum";
	$affiches = doQuery($sql);
	$affTabel = '';
	$foo = '';
	
	while ($rij = mysql_fetch_array($affiches)) {
		$foo = "<img width=\"85%\" alt=\"". $rij["afbeelding"] ."\" src=\"". $rij["afbeelding"] ."\"/>";
		if(trim($rij['link']) != ""){
			$foo = "<a href=\"" . $rij["link"] . "\" target=\"new_page\">" . $foo . "</a>\n<div align=\"center\">Klik op de afbeelding voor meer info</div>";
		}
		$foo .= "<br/><br/>";
		echo $foo;
	}
?>