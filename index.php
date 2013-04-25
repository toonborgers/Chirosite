<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once "database/dbUtil.php";
include_once "database/imageUtil.php";
include_once "getPage.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Chiro Kasterlee</title>
		<meta name="author" content="Stijn Hoskens, Toon Borgers, Hans Blockx">
		<meta NAME="description" CONTENT="  ..: Chiro Kasterlee online :..
		Alle informatie over de verschillende activiteiten, programma's, enz... kunnen gevonden worden op onze site!">
		<meta NAME="keywords" CONTENT="Chiro, chiro, kasterlee, Kasterlee, Chirokasterlee, Chirofeesten, Chirogroepen, 
		Oudercomit�, Melkstraat, Kerels, Aspiranten, Sloebers, Pinkels, Tipper, Toppers, Tiptiens, Speelclub, Rakkers, 
		Kwiks, Afdelingen, Jongeren, Jeugd, Verenigingen, Belgi�, Belgium, Kristelijk, Christus, Koning, feest, party, 
		fotoreportages, fotos, nieuws, chironationaal, activiteiten, spelletejs, programmas, feesten, chirofeesten, 
		chirofuif, chiroparty, Chirojongens, Chiromeisjes, Oudercomit�, spots, forum, links, chat, chatbox, chirochat, 
		lokaal, lokalen, lokaalverhuur, verhuur, tentverhuur, legertenten, legertent">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="static/style.css" type="text/css" />
		<link rel="stylesheet" href="static/shadowbox/shadowbox.css" type="text/css" />
		<link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" type="text/css" />
		<script type="text/javascript" src="static/date.js"></script>
		<script type="text/javascript" src="static/shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
			Shadowbox.init();
		</script>
		<script type="text/javascript" src="static/script.js"></script>
		</script>
		<title>Chiro Kasterlee</title>
	</head>
	<body>
		<div id="page" align="center">
			<div id="wrapper">
				<?php
				include ("./nav.php");
				?>
				<div id="contenttext">
					<?php
					include 'content/' . $page;
					?>
				</div>
				<?php
				include ("./footer.php");
				?>
			</div>
		</div>
	</body>
</html>