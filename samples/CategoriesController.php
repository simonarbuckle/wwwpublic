<?php
require_once('../_autoload.php');

class CategoriesController {

	public function getData() {

		$data = new stdClass();
		$items = Helper::getManifest();

		$breadcrumbs = array();
		foreach ($items as &$item) {
			$categories = @$item->categories;
			if ($categories == null) {
				$categories = 'unclassified';
			}

			$categories = explode(',', $categories);
			foreach($categories as &$categorie) {
				if (@$breadcrumbs[$categorie] == null) {
					$breadcrumbs[$categorie] = 0;
				}
				$breadcrumbs[$categorie]++;
			}
		}
		ksort($breadcrumbs);

		// Convert the found breadcrums to an array of array
		$data->categories = array();
		foreach ($breadcrumbs as $breadcrumb => $nb) {
			$array = &$data->categories;
			$items = explode('/', $breadcrumb);
			foreach ($items as $item) {
				if (!isset($array[$item])) {
					$array[$item] = array();
				}
				$array = &$array[$item];
			}
		}


		$search = @$_GET['s'];
		if ($search == null) {
			$search = '';
		}
		$data->search = preg_replace('/[^a-z ]/i', '', $search);


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
