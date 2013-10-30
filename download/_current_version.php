<?php
	$versions = array();
  foreach (glob("/srv/www/ariatemplates.com/builds/*.zip") as $filename) {
    $archive = basename($filename, ".zip");
    preg_match('/^ariatemplates-(?:(?P<dev>dev)-)?(?P<version>.*)$/', $archive, $matches);
    //echo "<pre>".print_r($matches, true)."</pre>";
    if (!isset($versions[$matches['version']])) {
      $versions[$matches['version']] = array( 'dev' => false, 'prod' => false );
    }
    $version = $versions[$matches['version']];
    if ($matches['dev'] == 'dev') {
      $version['dev'] = true;
    } else {
      $version['prod'] = true;
    }
    if (!isset($version['date'])) {
      $version['date'] = date("d/m/Y", filectime($filename));
    }
    $versions[$matches['version']] = $version;
  }
  krsort($versions);

	$prod = array( 'version' => false, 'date' => false );
  $dev = array( 'version'=> false, 'date' => false );

  function find_versions($item, $key) {
  	global $prod, $dev;
  	if ($item['prod'] && $prod['version'] == false) {
  		$prod['version'] = $key;
  		$prod['date'] = $item['date'];
  	}
  	if ($item['dev'] && $dev['version'] == false) {
  		$dev['version'] = $key;
  		$dev['date'] = $item['date'];
  	}
  }
  array_walk($versions, "find_versions");

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
