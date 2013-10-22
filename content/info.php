<?php
$chiro = $_GET["chiro"];
if ($chiro == 'j') {
	$title = "Leiders";
} else {
	$title = "Leidsters";
}
?>

<div class="titlecontainer">
	<span class="titletext">Algemene info</span>
</div>
<div class="bodytext">
	<?php
	echo $chiro == 'j' ? "<p>Elke zondag vanaf 14u is iedereen van 6 tot 18 jaar welkom aan de Boekweitbaan 15 om 
	leuke spelletjes te spelen met jullie leeftijdsgenoten. De sloebers (1ste en 2de leerjaar) en speelclub 
	(3de en 4de leerjaar) hebben chiro tot 17u, de rakkers (5de en 6de leerjaar) en toppers (1ste en 2de middelbaar)
	tot 18u, en de oudste twee afdelingen, de kerels (3de en 4de middelbaar) en aspiranten (5de en 6de middelbaar)
	tot 19u.</p>
	<p>Graag hebben wij dat onze leden een uniform aandoen op zondagnamiddag. Voor de sloebers en speelclub is een
	T-shirt van de chirojongens Kasterlee voldoende. Deze zijn te verkrijgen op onze chiro op aanvraag. Van de oudere
	afdelingen verwachten wij dat ze een volledig uniform aandoen, zijnde bovenop het T-shirt een broek, een hemd
	en eventueel de chirotrui. Deze zijn allen te verkrijgen in de <a href='http://www.debanier.be/'>Banier</a></p>" : 
	"<p>Elke zondag vanaf 14u is iedereen van 6 tot 18 jaar welkom aan de Mgr. Miertsstraat 40 om 
	leuke spelletjes te spelen met jullie leeftijdsgenoten. De pinkels (1ste en 2de leerjaar), speelclub 
	(3de en 4de leerjaar) en kwiks (5de en 6de leerjaar) hebben chiro tot 17u, de tippers (1ste en 2de middelbaar), 
	tiptiens (3de en 4de middelbaar) en aspi's (5de en 6de middelbaar)
	tot 19u.</p>
	<p>Graag hebben wij dat onze leden een uniform aandoen op zondagnamiddag. Voor de pinkels en speelclub is een
	T-shirt van de chiromeisjes Kasterlee voldoende. Deze zijn te verkrijgen op onze chiro op aanvraag. Van de oudere
	afdelingen verwachten wij dat ze een volledig uniform aandoen, zijnde bovenop het T-shirt een rok en de chirotrui. 
	Deze zijn allen te verkrijgen in de <a href='http://www.debanier.be/'>Banier</a></p>";
	?>
</div>
<div class="titlecontainer">
	<span class="titletext"><?php echo $title ?></span>
</div>
<div class="bodytext">
	<?php
	$editable = FALSE;
	include 'database/leider.php';
	?>
</div>