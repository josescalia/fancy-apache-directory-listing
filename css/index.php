<?php
$dir = dirname(".");
$files1 = scandir($dir);
//$files2 = scandir($dir, 1);
$item = "";
$type = "";
$size = "";
$lastMod = "";

foreach ($files1 as $dir) {
	if (!fnmatch("index.php", $dir)) {
		if (is_file($dir)) {
			$type = "File";
			$size = _format_bytes(filesize($dir));
			$lastMod = filemtime($dir);
			$ext = pathinfo($dir, PATHINFO_EXTENSION);
		} else {
			$type = "Dir";
			$size = "0 B";
			$lastMod = filemtime($dir);
			$ext = "dir";
		}

		//display
		$item .= "<tr>";
		//$item .= "<td>".pathinfo($dir, PATHINFO_EXTENSION)." <a href='$dir'>" . $dir . "</a></td>";
		$item .= "<td>" . _get_icon($ext) . " <a href='$dir'>" . $dir . "</a></td>";
		$item .= "<td>" . date("d-M-Y H:i:s", $lastMod) . "</td>";
		$item .= "<td align='right'>$size</td>";
		$item .= "<tr>";
	}
}

function _get_icon($ext) {
	$ext = strtolower($ext);
	if ($ext == "dir") {
		return "<image src='/icons/dir.png' width='12' height=12>";
	} elseif ($ext == "pdf" || $ext == "html" || $ext == "shtml" || $ext == "htm") {
		return "<image src='/icons/layout.gif' width='12' height=12>";
	} elseif ($ext == "rar" || $ext == "zip" || $ext == "gz" || $ext == "tgz" || $ext == "z" || $ext == "Z") {
		return "<image src='/icons/compressed.gif' width='12' height=12>";
	} elseif ($ext == "exe" || $ext == "bin") {
		return "<image src='/icons/binary.gif' width='12' height=12>";
	} elseif ($ext == "hqx") {
		return "<image src='/icons/binhex.gif' width='12' height=12>";
	} elseif ($ext == "tar") {
		return "<image src='/icons/tar.gif' width='12' height=12>";
	} elseif ($ext == "txt" || $ext == "bat" || $ext == "sh" || $ext == "ini"|| $ext == "conf") {
		return "<image src='/icons/script.gif' width='12' height=12>";
	} elseif ($ext == "wrl" || $ext == "wrl" || $ext == "gz" || $ext == "vrml" || $ext == "vrm" || $ext == "iv") {
		return "<image src='/icons/world2.gif' width='12' height=12>";
	} elseif ($ext == "ps" || $ext == "ai" || $ext == "eps") {
		return "<image src='/icons/a.gif' width='12' height=12>";
	} elseif ($ext == "pl" || $ext == "py") {
		return "<image src='/icons/c.gif' width='12' height=12>";
	} elseif ($ext == "for") {
		return "<image src='/icons/f.gif' width='12' height=12>";
	} elseif ($ext == "dvi") {
		return "<image src='/icons/dvi.gif' width='12' height=12>";
	} elseif ($ext == "tex") {
		return "<image src='/icons/tex.gif' width='12' height=12>";
	} elseif ($ext == "core") {
		return "<image src='/icons/bomb.gif' width='12' height=12>";
	} else {
		return "<image src='/icons/binary.gif' width='12' height=12>";
	}
}

function _format_bytes($a_bytes) {
	if ($a_bytes < 1024) {
		return $a_bytes . ' B';
	} elseif ($a_bytes < 1048576) {
		return round($a_bytes / 1024, 2) . ' KB';
	} elseif ($a_bytes < 1073741824) {
		return round($a_bytes / 1048576, 2) . ' MB';
	} elseif ($a_bytes < 1099511627776) {
		return round($a_bytes / 1073741824, 2) . ' GB';
	} elseif ($a_bytes < 1125899906842624) {
		return round($a_bytes / 1099511627776, 2) . ' TB';
	} elseif ($a_bytes < 1152921504606846976) {
		return round($a_bytes / 1125899906842624, 2) . ' PB';
	} elseif ($a_bytes < 1180591620717411303424) {
		return round($a_bytes / 1152921504606846976, 2) . ' EB';
	} elseif ($a_bytes < 1208925819614629174706176) {
		return round($a_bytes / 1180591620717411303424, 2) . ' ZB';
	} else {
		return round($a_bytes / 1208925819614629174706176, 2) . ' YiB';
	}
}

?>
<html>
<head>
</head>
<link rel="stylesheet" href="/css/dir_list.css"/>
<body>
<center>
	<h3>Index Of <?php echo  dirname($_SERVER['PHP_SELF'])?> </h3>
	<table>
		<th>Index</th>
		<th>Last Modified</th>
		<th>Size</th>
		<?php echo $item;?>
	</table>
	Created by Josescalia@2012 <br>
	<?php echo $_SERVER['SERVER_SOFTWARE']; ?>

</center>
</body>
</html>
