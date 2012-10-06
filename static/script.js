$(document).ready(function() {
	$('#jongenslink').click(function(){
		$('#mmenu').hide();
		$('#jmenu').show();		
	});
	$('#meisjeslink').click(function(){
		$('#jmenu').hide();		
		$('#mmenu').show();
	});
});