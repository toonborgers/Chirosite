<div class="titlecontainer">
	<span class="titletext">Foto's</span>
</div>
<div class="bodytext">
	<?php
		$map="fotos";
		if(!empty($_GET['map']))
			$map = $_GET['map'];
		$folderPic = "static/images/folder.png"; 
		$maxColumns = 5;
		$width = 600;
		$i = 0;
		$dir_handle = opendir($map);
		$style="style='width:".$width/$maxColumns."px'";
		// Loop through the files & make up a table
		echo "<table><tr>";
		while ($file = readdir($dir_handle)) {
			if ($file == "." || $file == ".." || $file == "index.php")
				continue;
			if($i%$maxColumns == 0 && $i != 0)
				echo "</tr><tr>";
			$newfile = $map."/".$file;
			$newfileEncoded = rawurlencode($newfile);
			$newfileEncoded = str_replace('%2F', '/', $newfileEncoded);
			if(is_dir($newfile))
				echo "<td class='map' ".$style."><a href=index.php?page=fotos&map=".$newfileEncoded."><img src='$folderPic' width=100% class='noborder'/></a><br/>".$file."</td>";
			else
				echo "<td class='pic' ".$style."><a href=".$newfileEncoded." rel='shadowbox[Gallery]'><img src=".$newfileEncoded." width=100% class='noborder'/></a></td>";
			$i++;
		}
		echo "<tr></table>";
		closedir($dir_handle);
	?>
</div>