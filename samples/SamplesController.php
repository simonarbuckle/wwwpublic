<?php
require_once('../_autoload.php');

class SamplesController {

    private $manifest;

    public function getData() {

        $data = new stdClass();
        $data->items = Helper::getManifest();
        $data->breadcrums = array(array(
                'label' => 'Samples',
                'url' => '/samples/'
        ));

        $cat = @$_GET['cat'];
        if ($cat != null) {
            $cat = preg_replace('#[^a-z0-9/ ]#i', '', $cat);
            $filtered = [];
            $catRegexp = '#,'.$cat.'[,/]#';
            foreach($data->items as &$item) {
                $categories = strtolower(@$item->categories);
                if ($categories == null) {
                    $categories = 'unclassified';
                }
                $categories = ','.$categories.',';
                if (preg_match($catRegexp, $categories)) {
                    $filtered[] = $item;
                }
            }

            $data->items = $filtered;

            // Build the breadcrum with labels and urls
            $currentParams = array();
            foreach(explode('/', $cat) as $category) {
            	$currentParams[] = $category;
            	$data->breadcrums[] = array(
            		'label' => $category,
           			'url' => '/samples/?cat='.implode('/', $currentParams)
               	);
            }

        }

        $search = @$_GET['s'];
        if ($search != null) {
            $search = preg_replace('/[^a-z ]/i', '', $search);
            $filtered = [];

            $searchRegexp = '/'.$search.'/i';
            foreach($data->items as &$item) {
                $categories = @$item->categories;
                if ($categories == null) {
                    $categories = 'unclassified';
                }

                if (preg_match($searchRegexp, $categories) || preg_match($searchRegexp, $item->title) || preg_match($searchRegexp, $item->desc)) {
                    $filtered[] = $item;
                }
            }

            $data->items = $filtered;
        }


        return $data;
    }

}
?>
