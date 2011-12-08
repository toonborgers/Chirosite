<?php include_once 'getPage.php' ?>
<html>
	<head>
		<title>Chiro Kasterlee - <?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="resources/style.css" />
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.4.1/build/cssgrids/grids-min.css">
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
		<link rel="shortcut icon" type="image/x-icon" href="resources/favicon.ico">
		<script type="text/javascript" src="resources/jquery-1.7.min.js"></script>
		<script type="text/Javascript" src="resources/main.js"></script>
		<script type="text/Javascript" src="resources/yui-min.js"></script>
		
	</head>
	
	</body>		
		<div id="center">
			<div id="head">
			
			</div>
			<div id="main" class="yui3-g">
				<div id="menu" class="yui3-u-1-5">
					<?php include_once "menu.php" ?>
				</div>
				<div id="content" class="yui3-u-4-5">
					<?php include_once $page ?>
				</div>
			</div>
		</div>
		
	</body>
</html>