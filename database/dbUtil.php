<?php	/*		Doet een select die meerdere resultaten verwacht en geeft een array met de resultaten terug	*/	function doSelectForMultipleResults($sql){			$username = "chirokasterlee_";		$password = "EUgCvQxY";		$database = "chirokasterlee_";		$server = "chirokasterlee.be.mysql";
		$mysqli = new mysqli($server, $username, $password, $database);		$result= array();		$mysqli->autocommit(FALSE);
		$mysqli->query("SET NAMES utf8");		$queryResult = $mysqli -> query($sql);		while ($record = $queryResult->fetch_assoc()){			$result[] = $record;		}		
		$mysqli->commit();		$mysqli->close();	
		return $result;	}
	/*				Doet een select die één resultaat verwacht en geeft dat resultaat terug	*/	function doSelectForSingleResult($sql){		$results = doSelectForMultipleResults($sql);		return $results[0];	}
	/*		Doet een insert en geeft de id van de nieuwe rij terug	*/	function doInsert($sql){		$username = "chirokasterlee_";		$password = "EUgCvQxY";		$database = "chirokasterlee_";		$server = "chirokasterlee.be.mysql";
		$mysqli = new mysqli($server, $username, $password, $database);
		$mysqli->query("SET NAMES utf8");
		if(!$mysqli->query($sql)){			$mysqli->rollback(); 			return -1;		}
		$id = $mysqli->insert_id;		$mysqli->commit();		$mysqli->close();		return $id;	}		/*	 * Verwijdert shit	 */	 	function delete($sql) {		$username = "chirokasterlee_";		$password = "EUgCvQxY";		$database = "chirokasterlee_";		$server = "chirokasterlee.be.mysql";		$mysqli = new mysqli($server, $username, $password, $database);				$mysqli->query("SET NAMES utf8");		$mysqli->query($sql);		$mysqli->commit();		$mysqli->close();	}?>