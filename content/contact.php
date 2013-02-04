<div class="titlecontainer">
	<span class="titletext">Contact</span>
</div>
<div class="bodytext">
	<?php
		$queryResult = doSelectForSingleResult("SELECT tekst FROM new_contact ORDER BY id DESC LIMIT 1");
		echo $queryResult['tekst'];
	?>
	<!--<span class="smalltitle">Jongens</span>
	<br />
	e-mail: jongens@chirokasterlee.be<br />
	facebook: http://www.facebook.com/pages/Chirojongens-Kasterlee/361776797234878<br />
	verhuur: verhuur@chirokasterlee.be<br />
	<span class="smalltitle">Meisjes</span>
	<br />
	e-mail: meisjes@chirokasterlee.be<br />
	facebook: http://www.facebook.com/chiromeisjes.kasterlee<br />
	verhuur: lien.boonen@chirokasterlee.be<br /><br />
	Voor vragen specifiek voor de groep waarin je zoon of dochter zit, <br />
	kan je ook altijd een mailtje sturen naar zijn/haar leiders. <br />
	Je vindt hun emailadressen onder jongens/meisjes > Info.-->
</div>