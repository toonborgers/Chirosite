<?php
	$loggedIn = 0;
	if(isset($_SESSION['login'])){
		$loggedIn = 1;
	}
?>

<div id="footer" class="smallgraytext">
	<a href="javascript:void(0)" onclick="showLogin(<?php echo $loggedIn;?>);" id="portalLink">Portal leiding</a> | Chiro Kasterlee &copy; 2012
	<br>
	<div id="loginForm">
		<form id="login" action="login.php" method="post">
			<label for="login">Naam:</label> 
			<input type="text" id="login" name="login" />
			<label for="password">Wachtwoord:</label> 
			<input type="password" id="password" name="password" />
			<input type="submit" value="Inloggen"/>
		</form>
	</div>  
</div>