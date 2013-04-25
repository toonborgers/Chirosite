<?php
	include_once 'dbUtil.php';
	include_once 'imageUtil.php';
	
	if($chiro=='j') {
		$groepen = array(0 => "VB", 1=>"Sloebers", 2=>"Speelclub", 3=>"Rakkers", 4=>"Toppers", 5=>"Kerels", 6 =>"Aspiranten");
	} else {
		$groepen = array(0 => "VB", 1=>"Pinkels", 2=>"Speelclub", 3=>"Kwiks", 4=>"Tippers", 5=>"Tiptiens", 6 =>"Aspi's");
	}
	
	for ($i = 0; $i < 7; $i++) {
		$sql = "SELECT * FROM new_leiding WHERE chiro = '$chiro' AND groep = $i";
		$leiders = doSelectForMultipleResults($sql);
		echo '<span class="smalltitle">' . $groepen[$i] . '</span><table>';
		$j=0;
		$aantal = count($leiders);
		
		foreach ($leiders as $leider) {
			
			$sql = "SELECT omschrijving FROM new_functies where leidingId = ".$leider['id'];
			$functies = doSelectForMultipleResults($sql);
			
			if($aantal-$j==1 && $j%2==0) {
				echo "</table><table><tr><td>
				<div class='achtergrond".$groepen[$i]." centreren'>
				<img src='". getImage($leider['afbeeldingId']) ."' width='250'/><br />".
				$leider['naam']  . plaktDiejeRommelIsAaneen($functies) . '<br/>
				<a href="mailto:' .$leider["mail"] .'">' . $leider["mail"] .'</a>';
				if($editable) {
					echo "<br /><a href=\"database/deleteLeider.php?id=" . $leider["id"] . "\">
					<img src='static/images/delete.png' height='20' style='border-style:none'/></a>";
				}
				echo '</div></td></tr>';
			} else {
				if($j % 2==0)
					echo "<tr>";
				$groep = $groepen[$i];
				if($groep == "Aspi's") { $groep = "Aspis"; }
				echo "<td><div class='achtergrond".$groep." centreren'>";
				echo '<img src="'. getImage($leider['afbeeldingId']) .'" width="250"/><br />';
				echo $leider['naam']  . plaktDiejeRommelIsAaneen($functies) . '<br/>';
				echo '<a href="mailto:' .$leider["mail"] .'">' . $leider["mail"] .'</a>';
				if($editable) {
					echo "<br /><a href=\"database/deleteLeider.php?id=" . $leider["id"] . "\">
					<img src='static/images/delete.png' height='20' style='border-style:none'/></a>";
				}
				echo "</div></td>";
				if($j % 2!= 0 || $j==$aantal-1)
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
