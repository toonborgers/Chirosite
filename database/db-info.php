<?php
	function doQuery($sql){		
		$user_name = "chirokasterlee_";
		$pass_word = "EUgCvQxY";
		$database = "chirokasterlee_";
		$server = "chirokasterlee.be.mysql";
	
		$db_handle = mysql_connect($server, $user_name, $pass_word);
		mysql_select_db($database, $db_handle);
		mysql_query("SET NAMES utf8");
		
		$result = mysql_query($sql);
		
		mysql_close($db_handle);
		
		return $result;
	}
?>