<?php
	if(isset($_GET['db']))  {
		$db = $_GET['db'];
	}
	if(isset($_GET['afdeling']))  {
		$afdeling = $_GET['afdeling'];
	}
	
	$sql =  "select * from leiding where chiro=1 and afdeling=";
	$resultaat = mysql_query($sql, $db);
    while($rij = mysql_fetch_array($resultaat)) {
	
		if($afdeling == 'sloebers') {
			echo "<div class='paarseachtergrond'>"
		} elseif($afdeling == 'speelclub') {
			echo "<div class='geleachtergrond'>"
		} elseif($afdeling == 'rakkers') {
			echo "<div class='groeneachtergrond'>"
		} elseif($afdeling == 'toppers') {
			echo "<div class='rodeachtergrond'>"
		} elseif($afdeling == 'kerels') {
			echo "<div class='blauweachtergrond'>"
		} elseif($afdeling == 'aspiranten') {
			echo "<div class='oranjeachtergrond'>"
		} 
		
		$img = $rij['afbeelding'];
		echo "<img src='data:image/jpeg;base64,'.base64_encode($image['file_data']).'' height='130' style='float:left;margin:10px;'>";
		echo "$rij['naam'] <br />";
		echo "$rij['email'] <br />";
		echo "$rij['functies']"; 
		echo "</div>"
	}
	
?>
	