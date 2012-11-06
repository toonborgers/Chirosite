<?php
	session_start();
	$loggedIn = 0;
	if(isset($_SESSION['login'])){
		$loggedIn = 1;
	}
?>

<div id="footer" class="smallgraytext">
	<a href="javascript:void(0)" onclick="showLogin(<?php echo $loggedIn;?>);" id="portalLink">Portal leiding</a> | Chiro Kasterlee &copy; 2012  
</div>