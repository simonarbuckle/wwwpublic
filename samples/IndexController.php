<?php
require_once('../_autoload.php');

class IndexController {

	public function getData() {

		$data = new stdClass();

		$data->isList = @$_GET['path'] == null;

		return $data;
	}

	public function getSampleUrl($item) {
		if ($item == null) {
			return "";
		}

		$url = explode('.', $item->path);
		array_pop($url); // The higher level is the file name
		return 'http://snippets.ariatemplates.com/samples/github.com/ariatemplates/documentation-code/'.implode('/', $url);
	}
}
?>
