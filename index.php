<?php 
	include_once 'getPage.php';
	include_once 'resources/rb.php';
	R::setup('mysql:host=localhost;dbname=chiro','toon','toon'); 
?>
<html>
	<head>
		<title>Chiro Kasterlee - <?php echo $page->getTitle(); ?></title>
		<link rel="stylesheet" type="text/css" href="resources/style.css" />
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.4.1/build/cssgrids/grids-min.css">
		<link rel="stylesheet" type="text/css" href="resources/reset-min.css">
		<link rel="shortcut icon" type="image/x-icon" href="resources/favicon.ico">
		<script type="text/javascript" src="resources/jquery-1.7.min.js"></script>
		<script type="text/Javascript" src="resources/main.js"></script>
		<script type="text/Javascript" src="resources/yui-min.js"></script>
		<link rel="stylesheet" type="text/css" href="resources/shadowbox/shadowbox.css">
		<script type="text/javascript" src="resources/shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
			Shadowbox.init({
				skipSetup: true
			});
			
			function openModaal(tekst){
				Shadowbox.open({
					content:    tekst,
					player:     "html",
					title:      "Welcome",
					height:     400,
					width:      400
				});
			}				
		</script>
	</head>
	
	</body>		
		<div id="center">
			<div id="head">
				<a href="javascript: openModaal('Test');">Link</a>
			</div>
			<div id="main" class="yui3-g">
				<div id="menu" class="yui3-u-1-5">
					<?php include_once "menu.php" ?>
				</div>
				<div id="content" class="yui3-u-4-5">
					<div id="bla">
						<?php 
							include_once $page->getFile(); 
						?>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>