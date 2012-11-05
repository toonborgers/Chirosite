<div class="titlecontainer">
	<span class="titletext">Programma's</span>
</div>
<div class="bodytext" style="padding:12px; width:80%; color:#000000" align="center">
	<?php
		$chiro = $_GET['chiro'];
		
		$queryResult = doSelectForSingleResult('SELECT DISTINCT date_format(datum, "%d-%c-%Y") datum FROM new_programmas;');
		$datum = $queryResult['datum'];
		echo "<span class='smalltitle'>Datum: ". $datum . "</span><br/>";
		if($chiro='j') {
			$groepen = array(1=>"Sloebers", 2=>"Speelclub", 3=>"Rakkers", 4=>"Toppers", 5=>"Kerels", 6 =>"Aspiranten");
		} else {
			$groepen = array(1=>"Pinkels", 2=>"Speelclub", 3=>"Kwiks", 4=>"Tippers", 5=>"Tiptiens", 6 =>"Aspi's");
		}
		$programmas = doSelectForMultipleResults("SELECT * FROM new_programmas WHERE chiro=$chiro ORDER BY groep;");

    	foreach($programmas as $programma){
    		$groep = $groepen[$programma["groep"]];
    		echo "<span class='smalltitle'>". $groep . "</span><br /><div class='achtergrond". $groep ."'>";
    		echo $programma["programma"];
			echo "</div>";
    	}
	?>
</div>