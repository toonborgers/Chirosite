<div class="titlecontainer">
	<span class="titletext">Foto's</span>
</div>
<div class="bodytext">
	<?php   
		$dir_handle = opendir("fotos");
		// Loop through the files
		while ($file = readdir($dir_handle)) {
			if ($file == "." || $file == ".." || $file == "index.php")
				continue;
			if(is_dir("fotos/".$file))
				echo "<a href=fotos/".$file.">$file</a><br />";
			else
				echo "<a href=fotos/".$file.">$file</a><br />";
		}
		closedir($dir_handle);
	?>
</div>