$(document).ready(function() {
	setUpShadowBox();
	setUpMenu();
	setUpCalendarFields();
	setupLoginValidation();
});

function setUpMenu(){
	$('#jongenslink').click(function(){
		$('#mmenu').hide();
		$('#jmenu').slideDown('fast');		
	});
	$('#meisjeslink').click(function(){
		$('#jmenu').hide();		
		$('#mmenu').slideDown('fast');	
	});
}

function setUpShadowBox(){
	Shadowbox.init({
		skipSetup: true,
		modal:true,
		enableKeys:false
	});	
}

function showLogin(redirectImmediately){
	if(redirectImmediately===1){
		window.location = 'index.php?page=portal';
	}else{
		$('#loginForm').slideDown('slow');	
	}
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

function setupLoginValidation(){
	$("#login").validate({
		rules: {
			login: "required",
			password: "required"
			
		}, 
		messages: { 
		
		} 
	}); 
}
