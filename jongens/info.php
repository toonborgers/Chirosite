<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="../images/style.css" type="text/css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<title>Chiro Kasterlee</title>
	</head>
	<body>
		<div id="page" align="center">
			<div id="content" style="width:800px">
				<?php include("../nav.html"); ?>
				<div id="contenttext">
					<div style="padding:10px">
						<span class="titletext">Leiders</span>
					</div>
					<?php include("retrieveLeider.php?db='$db'&afdeling='sloebers'"; ?>
					<?php include("retrieveLeider.php?db='$db'&afdeling='speelclub'"; ?>
					<?php include("retrieveLeider.php?db='$db'&afdeling='rakkers'"; ?>
					<?php include("retrieveLeider.php?db='$db'&afdeling='toppers'"; ?>
					<?php include("retrieveLeider.php?db='$db'&afdeling='kerels'"; ?>
					<?php include("retrieveLeider.php?db='$db'&afdeling='aspiranten'"; ?>
				</div>			
				<?php include("../footer.html"); ?>
			</div>
		</div>
	</body>
</html>