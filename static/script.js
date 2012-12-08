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
	var calendarFields = $('.calendar');
	try {
	calendarFields.datepicker({
		showOn: "button",
		buttonImage: "static/images/calendar.gif",
		buttonImageOnly: true,
		dateFormat: 'dd-mm-yy'
	}).mask('99-99-9999');
	} catch (e) {}
	$.each(calendarFields, function(){
		if($(this).hasClass('nextsunday')){
			$(this).val(Date.today().next().sunday().toString('dd-M-yyyy'));
		}	
	});
	
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
