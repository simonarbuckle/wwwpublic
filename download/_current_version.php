<?php
	$prod = array(
		"version" => "1.4.4",
		"date" => "22/05/2013");
	$dev = array(
		"version" => "1.4.4",
		"date" => "22/05/2013");

	function human_filesize($bytes, $decimals = 2) {
  	$sz = array('B','Kb', 'Mb', 'Gb', 'Tb', 'Pb');
  	$factor = floor((strlen($bytes) - 1) / 3);
  	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}
?>

<a href="/builds/ariatemplates-<?php echo $prod["version"]; ?>.zip" class="prod-version button green"
onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Production Version', '<?php echo $prod["version"]; ?>']);">
	<strong>Production version</strong>
	<em><?php echo human_filesize(filesize("/srv/www/ariatemplates.com/builds/ariatemplates-".$prod["version"].".zip")); ?>, Packed and gzipped</em>
	<span class='meta'>
		latest stable <span><?php echo $prod["version"]; ?></span>
		<br />built on <span><?php echo $prod["date"]; ?></span>
	</span>
</a>
<a href="/builds/ariatemplates-dev-<?php echo $dev["version"]; ?>.zip" class="dev-version button blue"
onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Development Version', '<?php echo $dev["version"]; ?>']);">
	<strong>Development version</strong>
	<em><?php echo human_filesize(filesize("/srv/www/ariatemplates.com/builds/ariatemplates-dev-".$dev["version"].".zip")); ?>, Full source, with all comments</em>
	<span class='meta'>
		latest stable <span><?php echo $dev["version"]; ?></span>
		<br />built on <span><?php echo $dev["date"]; ?></span>
	</span>
</a>