<?php
include_once 'dbUtil.php';
include_once 'imageUtil.php';
$chiro = $_GET["chiro"];

$groepen = array(1=>"Sloebers", 2=>"Speelclub", 3=>"Rakkers", 4=>"Toppers", 5=>"Kerels", 6 =>"Aspiranten");

for ($i = 1; $i < 7; $i++) {
	$sql = "SELECT * FROM new_leiding WHERE chiro = '$chiro' AND groep = $i";
	$leiders = doSelectForMultipleResults($sql);
	echo '<span class="smalltitle">' . $groepen[$i] . '</span><table>';
	$j=0;
	$aantal = count($leiders);
	
	foreach ($leiders as $leider) {
		if($j % 2==0){
			echo "<tr>";
		}
		
		$sql = "SELECT omschrijving FROM new_functies where id in (select functieId from new_leiding_functie where leidingId = ".$leider['id'] .")";
		$functies = doSelectForMultipleResults($sql);
		
		echo "<td ";
		if($aantal-$j==1) {
			echo "colspan='2'";
		}
		
		
		echo "><div class='achtergrond".$groepen[$i]." centreren'>";
		echo '<img src="'. getImage($leider['afbeeldingId']) .'" width="250"/><br />';
		echo $leider['naam']  . plaktDiejeRommelIsAaneen($functies) . '<br/>';
		echo '<a href="mailto:' .$leider["mail"] .'">' . $leider["mail"] .'</a>';
		echo "</div></td>";
		if($j % 2!= 0 || $j==$aantal-1){
			echo "</tr>";
		}	
		
		$j++;
	} 
	echo "</table>";
}


function plaktDiejeRommelIsAaneen($functies){
	$result = ' ';
	if(count($functies)>0){
		$result .= '(';
		foreach ($functies as $functie) {
			$result .= $functie['omschrijving'];
			$result .= ', ';
		}
		
		$result = substr($result, 0, strlen($result)-2);
		$result .= ')';
		
	}
	
	return $result;
}

?>
