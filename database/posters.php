<?php	
	$sql = "SELECT id FROM new_afbeelding WHERE id NOT IN (SELECT afbeeldingId FROM new_leiding)";	$posterIds = doSelectForMultipleResults($sql);	$posterTabel = "<table>";	foreach($posterIds as $posterId){    	$posterTabel .= "<tr><td><img src=".getImage($posterId["id"])." width='600'></td>		</span></a></td></tr>";	}	$posterTabel.="</table>";	echo $posterTabel;	
?>