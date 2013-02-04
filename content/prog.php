<?php
	$chiro = $_GET['chiro'];
	$queryResult = doSelectForSingleResult("SELECT DISTINCT date_format(datum, '%d/%c') datum FROM new_programmas WHERE chiro='$chiro';");
	$datum = $queryResult['datum'];
?>
<div class="titlecontainer">
	<span class="titletext">Programma's <?php echo $datum ?></span>
</div>
<div class="bodytext">
	<?php
		if($chiro=='j') {
			$groepen = array(0 => "Algemeen", 1=>"Sloebers", 2=>"Speelclub", 3=>"Rakkers", 4=>"Toppers", 5=>"Kerels", 6 =>"Aspiranten");
		} else {
			$groepen = array(0 => "Algemeen", 1=>"Pinkels", 2=>"Speelclub", 3=>"Kwiks", 4=>"Tippers", 5=>"Tiptiens", 6 =>"Aspi's");
		}
		$programmas = doSelectForMultipleResults("SELECT * FROM new_programmas WHERE chiro='$chiro' ORDER BY groep;");
		
		if(empty($programmas)) {
			echo "Er zijn geen programma's om weer te geven.";
		}
		else {
			$programmas = doSelectForMultipleResults("SELECT groep, programma FROM new_programmas WHERE chiro='$chiro' ORDER BY groep ASC");
			foreach ($programmas as $programma) {
				$groep = $programma['groep'];
				$programmaArray[$groep] = $programma['programma'];
			}
			$hasAlgemeenBericht = !empty($programmaArray[0]);
			for($i=1; $i < 7; $i++) {
				if(!empty($programmaArray[$i])) {
					$groep = $groepen[$i];
    				echo "<span class='smalltitle'>". $groep . "</span><br /><div class='achtergrond". $groep ."'>";
					echo $programmaArray[$i];
					if($hasAlgemeenBericht) {
						echo "<br /> ALGEMEEN: ". $programmaArray[0];
					}
					echo "</div>";
				}	
			}
    		/*foreach($programmas as $programma){
    			$groep = $groepen[$programma["groep"]];
    			echo "<span class='smalltitle'>". $groep . "</span><br /><div class='achtergrond". $groep ."'>";
    			echo $programma["programma"];
				echo "</div>";
    		}*/
		}
	?>
</div>