$(document).ready(function() {
	setUpShadowBox();
	setUpMenu();
	setUpPortalLink();
	setUpCalendarFields();
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
		modal:true,
		enableKeys:false
	});	
}

function setUpPortalLink() {
  $('#portalLink').click(function(){
  		$.post('ajaxHelp.php',{action:'isUserLoggedIn'},
	  		function(data){
	  			if(data == "1"){
  					window.location = 'index.php?page=portal';
	  			}else{
					Shadowbox.open({
						content:    get('login.html'),
						player:     'html',
						title:      'Login',
						width:		400,
						height:		200
					});
				}
  			}
  		);  		
  });
}

function get(urll){
	var temp;
	$.ajax({url: urll, 
		success: function(data){temp = data;},
		async: false
		});	
	return temp;
}

function setUpCalendarFields(){
	$('.calendar').datepicker({
		showOn: "button",
		buttonImage: "static/images/calendar.gif",
		buttonImageOnly: true,
		dateFormat: 'dd-mm-yy'
	}).mask('99-99-9999');
	
	$('.ui-datepicker-trigger').css('cursor','pointer').attr({alt:'', title:''});
}
