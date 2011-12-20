<?php
	class DB{
		const USER="toon";
		const PASSWORD="toon";
		const SERVER="localhost";
		const DATABASE="chiro";
		private $link;
		
		private function construct__(){
			
		}
				
		private function destruct__ (){
			disconnect();
			unset ( $this );
		}
		
		private function connect(){
			$this->link = mysql_connect(self::SERVER,self::USER,self::PASSWORD);
			if (!$this->link) {
				die('Could not connect: ' . mysql_error());
			}
						
			$db_selected = mysql_select_db(self::DATABASE, $this->link);
			if (!$db_selected) {
				die ('Could not connect: ' . mysql_error());
			}
		}
		
		private function disconnect(){
			mysql_close($this->link);			
		}
		
		public function doeQuery($query){
			$this->connect();
			$result = mysql_query($query, $this->link);
			$resultaten = array();
			
			if($result){			
				while($row = mysql_fetch_assoc($result)){
					array_push($resultaten, $row);
				}
				$this->disconnect();
			}
			return $resultaten;
		}
	}
?>