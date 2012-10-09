<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include_once "database/dbUtil.php";?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="static/style.css" type="text/css" />
		<link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<script type="text/javascript" src="static/script.js"></script>
		<title>Chiro Kasterlee</title>
	</head>
	<body>
		<div id="page" align="center">
			<div id="content" style="width:800px">
				<?php include("./nav.html"); ?>
				<div id="contenttext">
					<?php include "getPage.php";?>				
				</div>			
				<?php include("./footer.html"); ?>
			</div>
		</div>
	</body>
</html>