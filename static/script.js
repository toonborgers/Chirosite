$(document).ready(function() {
	setUpShadowBox();
	setUpMenu();
	setUpPortalLink();
});

function setUpMenu(){
	$('#jongenslink').click(function(){
		$('#mmenu').hide();
		$('#jmenu').slideDown('slow');		
	});
	$('#meisjeslink').click(function(){
		$('#jmenu').hide();		
		$('#mmenu').slideDown('slow');	
	});
}

function setUpShadowBox(){
	Shadowbox.init({
		skipSetup: true,
		modal:true
	});	
}

function setUpPortalLink() {
  $('#portalLink').click(function(){
		Shadowbox.open({
			content:    'tekst',
			player:     "html",
			title:      "Login",
			height:     400,
			width:      400
		});
  });
}
