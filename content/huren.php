<div class="titlecontainer">
	<span class="titletext">Huren</span>
</div>
<div class="bodytext">
	<?php
		$chiro = $_GET['chiro'];
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_verhuur WHERE chiro='$chiro' ORDER BY id DESC LIMIT 1");
		echo $queryResult['tekst'];
	?>
	<!--<span class="smalltitle">Lokalen</span><br />
	In 2011 hebben wij de laatste steen gelegd aan ons nieuw lokaal, dit wordt verhuurd sinds 2012.
	Er zijn drie grote lokalen, een ruime keuken, voldoende sanitair, een groot zandplein en speelbos.
	De prijs is 200 euro voor het huren, 50 euro voor de energie-kosten en 200 euro waarborg 
	wordt teruggestort als het lokaal in dezelfde staat wordt achtergelaten als bij het begin van het huren.
	Er is kook- en eetgerief voorzien, dus dit moet je niet zelf meebrengen.
	De lokalen worden niet verhuurd voor kampen of priv&eacutefeesten.<br />
	Adres: Boekweitbaan 19, 2460 Kasterlee.<br />
	<span class="smalltitle">Tenten</span><br />
	Wij verhuren ook tenten voor feesten, BBQ's,... 
	De prijs hiervoor is &#8364 100 voor een kleine tent en &#8364 150 voor een grote tent.
	Inbegrepen is het komen plaatsen en komen afbreken door onze professionele ploeg.<br /><br />
	Voor verdere vragen, mail gerust naar verhuur@chirokasterlee.be.<br /><br />
	Afmetingen: <br />
	<img src="static/images/afmetingenTenten.png" width="400"><br />
	<img src="static/images/tent1.png" width="300">
	<img src="static/images/tent2.png" width="300"><br />
	<img src="static/images/tent3.png" width="300">
	<img src="static/images/tent4.png" width="300"><br />-->
</div>