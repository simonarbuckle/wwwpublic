<?php
require_once('../_autoload.php');

class IndexController {

	public function getData() {

		$data = new stdClass();

		$data->isList = @$_GET['path'] == null;

		return $data;
	}
	
}
?>
