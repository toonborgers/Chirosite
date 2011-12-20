<?php
	$home = new Page("Home", "home.php");
	$pages = array(
		"home" => $home,
		"oc"=>new Page("Oudercomité", "oc.php")
	);
	
	$pageName="home";
		
	if(isset($_GET["page"])){
		$pageName = $_GET["page"];
	}
	
	if (array_key_exists($pageName, $pages) && file_exists($pages[$pageName]->getFile())) {
		$page= $pages[$pageName];		
	}else{
		$page = new Page("Pagina niet gevonden","nietGevonden.php");
	}
	
	class Page{
		private $title;
		private $file;
		
		function __construct($title, $file) {
			$this->title=$title;
			$this->file=$file;
		}
		
		function __destruct(){
		
		}
		
		function getTitle(){
			return $this->title;
		}
		
		function getFile(){
			return "./content/" . $this->file;
		}
		
		public function __toString() {
			return "Title: ".$this->title . "File: " . $this->file;
		}
	}
?>