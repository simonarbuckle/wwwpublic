<?php
	require_once('IndexController.php');
	$controller = new IndexController();
	$data = $controller->getData();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include '../include/_head.php' ?>
		<link rel="stylesheet" href="/styles/samples.css" type="text/css"/>
		<script type="text/javascript" src="/js/top-scrolling.js"></script>
	</head>
	<body class="documentation sampleslist">
		<div id="top"><a href="#top"></a></div>
		<?php include '../include/_header.php' ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<?php if ($data->isList) { ?>
					<div class="columns two">
						<article class="column"><?php include('samples.php'); ?></article>
						<aside class="column sidebar"><?php include('categories.php'); ?></aside>
					</div>
					<?php } else { ?>
					<div class="columns main-page two">
						<?php include('sample.php') ?>
					</div>
					<?php } ?>
				</div>
			</section>
		</div>
		<?php include '../include/_footer.html' ?>
	</body>
</html>