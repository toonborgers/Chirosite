<?php
include_once "database/dbUtil.php";
include_once "imageUtil.php";

if(isset($_POST["bla"])){ 
	addImage($_FILES["foto"]);
}

?>

<html>
	<head>
		<title>foto test</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<script type="text/javascript" src="static/maskedinput.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" type="text/css" />
		<script type="text/javascript">
			$(document).ready(function() {
				setUpCalendarFields();
				
				$('#fotosTitle').click(function(){ $('#fotos').toggle();});
			});
			
			function setUpCalendarFields(){
				$('.calendar').datepicker({
					showOn: "button",
					buttonImage: "static/images/calendar.gif",
					buttonImageOnly: true,
					dateFormat: 'dd-mm-yy'
				}).mask('99-99-9999');
				
				$('.ui-datepicker-trigger').css('cursor','pointer').attr('alt','').attr('title','');
			}
		</script>
	</head>
	<body>		
		<h3 id="fotosTitle">fotos</h3>
		<div id="fotos" style="display:none;">
			<form enctype="multipart/form-data" action="test.php" method="post">
				<input type="file" name="foto" id="foto" />
				<input type="hidden" name="bla" id="bla" value="d"/>
				<br/>
				<input type="submit"/>
			</form>
			<?php
				$ids = doSelectForMultipleResults("SELECT id FROM new_afbeelding");					
				
				foreach ($ids as $id){
					echo "<p>";
					echo '<img src="'. getImage($id['id']) . '"/>';
					echo "</p>";
				}				
			?>
		</div>
		<hr/>
		<h3>Kalender</h3>
		<input type="text" class="calendar"/>
	</body>

</html>