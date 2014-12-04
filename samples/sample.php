<?php
	require_once('SampleController.php');

	$controller = new SampleController();

	$data = $controller->getData();

	$item = &$data->item;
	$previous = &$data->previous;
	$next = &$data->next;


?>
<nav class="nav" id="post-nav">
	<?php if ($previous != null) {?>
	<div class="alignleft nav-previous"><a href="/samples/?path=<?php echo $previous->path; ?>">Previous</a></div>
	<?php } ?>
	<div class="aligncenter nav-main"><a id="menu" href="/samples/">Go back to list</a></div>
	<?php if ($next != null) {?>
	<div class="alignright nav-next"><a href="/samples/?path=<?php echo $next->path; ?>">Next</a></div>
	<?php } ?>
</nav>
<h1><?php echo $item->title; ?></h1>
<p><?php echo $item->desc; ?></p>
<iframe class='sampleShot' src='<?php echo $controller->getSampleUrl($item); ?>'></iframe>
