<?php
define('_ROOT_PATH', realpath(dirname(__FILE__)));

function __autoload($className) {
	$filepath = _ROOT_PATH.'/src/'.$className.'.php';
	if (file_exists($filepath)) {
		require_once($filepath);
	}
}
?>
