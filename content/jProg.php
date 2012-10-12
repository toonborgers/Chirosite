<div style="padding:10px">
	<span class="titletext">Programma's</span>
</div>
<div class="bodytext" style="padding:12px; width:80%; color:#000000" align="center">
	<?php
    
    	$sql = "SELECT Nr, Datum, Programma FROM tblJProg ORDER BY Nr ASC";
		//later wordt dit natuurlijk veranderd naar new_programmas, nu enkel testen
		$programmas = doSelectForMultipleResults($sql);	
		
		foreach ($programmas as $rij) {
				
			if($rij["Nr"]==1) {
				echo "<span class='smalltitle'>Sloebers</span><div class='paarseachtergrond'>";
			} elseif($rij["Nr"]==2) {
				echo "<span class='smalltitle'>Speelclub</span><br /><div class='geleachtergrond'>";
			} elseif($rij["Nr"]==3) {
				echo "<span class='smalltitle'>Rakkers</span><br /><div class='groeneachtergrond'>";
			} elseif($rij["Nr"]==4) {
				echo "<span class='smalltitle'>Toppers</span><br /><div class='rodeachtergrond'>";
			} elseif($rij["Nr"]==5) {
				echo "<span class='smalltitle'>Kerels</span><br /><div class='blauweachtergrond'>";
			} elseif($rij["Nr"]==6) {
				echo "<span class='smalltitle'>Aspiranten</span><br /><div class='oranjeachtergrond'>";
			} 
			
			echo $rij["Datum"] .": ".$rij["Programma"];
			echo "</div>";
		}
	?>
	<?php
    	include "../database/programmas.php";
		//op de één of andere manier wilt dees nie werke
	?>
</div>