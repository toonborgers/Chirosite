$(document).ready(function() {
	$('#jongens').click(jongensClick);
	$('#meisjes').click(meisjesClick);
});

function jongensClick(){
	if(!$('#jongensmenu').is (':visible')){
		$('#jongensmenu').slideDown('slow');
		$('#spacerJ').hide();
	}else{
		$('#jongensmenu').slideUp('slow');
		$('#spacerJ').show();
	}
}

function meisjesClick(){
	if(!$('#meisjesmenu').is (':visible')){
		$('#meisjesmenu').slideDown('slow');		
	}else{
		$('#meisjesmenu').slideUp('slow');		
	}
}
