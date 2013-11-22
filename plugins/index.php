<?php
	require_once('IndexController.php');
	$controller = new IndexController();
	$list = $controller->getList();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include '../include/_head.php' ?>
		<link rel="stylesheet" href="/styles/plugins.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" media="all" href="http://ariatemplates.com/blog/wp-content/themes/ariatemplates/style.css">
		<script type="text/javascript" src="/js/top-scrolling.js"></script>
	</head>
	<body class="plugins">
		<div id="top"><a href="#top"></a></div>
		<?php include '../include/_header.php' ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<div class="columns main-page one">
						<div class="column">
							<h1>Plugins</h1>
							<div class="posts">
								<?php foreach($list->data as &$plugin) { ?>
									<article class="post type-post status-publish format-standard hentry category-css category-customization category-widget">
										<header>
											<h3><a href="<?php echo $plugin->urls->homepage; ?>"><?php echo $plugin->name; ?></a></h3>
											<p class="postmetadata">
												<?php echo $plugin->releaseDate; ?>
												<span class="verymeta">|</span>
												v<?php echo $plugin->version; ?>
												<span class="verymeta">|</span>
												<?php echo $plugin->author; ?>
										</header>
											<div>
												<?php if (isset($plugin->urls->thumbnail)) { ?>
													<a class="thumbnail" href="<?php echo $plugin->urls->sample; ?>"><img  src="<?php echo $plugin->urls->thumbnail ?>"/></a>
												<?php } ?>
												<p><?php echo $plugin->description; ?></p>
											</div>
										<footer>
											<a class="button blue more" href="<?php echo $plugin->urls->homepage; ?>">Home page</a>
											<a class="button blue more" href="<?php echo $plugin->urls->sample; ?>">Demo</a>
										</footer>
										
									</article>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include '../include/_footer.html' ?>
	</body>
</html>