<?php

require_once('../_autoload.php');

class IndexController {

	public function getList() {

		$list = new stdClass();

		$content = file_get_contents("https://raw.github.com/ariatemplates-plugins/plugins-list/master/plugins.json");

		$list->data = Json::decode($content);

		return $list;
	}
}
?>
