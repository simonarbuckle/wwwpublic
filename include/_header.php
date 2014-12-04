<header id="header">
	<div class="logo">
		<?php if(isset($home) && $home): ?>
			<h1><a href="/"><img src="/images/logo-home.png" alt="Aria Templates"/></a></h1>
		<?php else: ?>
			<h5><a href="/"><img src="/images/logo-page.png" alt="Aria Templates"/></a></h5>
		<?php endif; ?>
	</div>
	<nav>
		<a class="documentation" href="/documentation">Documentation</a>
		<a class="blog" href="/blog">Blog</a>
		<a class="forum" href="/forum">Forum</a>
		<a class="plugins" href="/plugins">Plugins</a>
		<a class="contribute" href="/contribute">Contribute</a>
		<a class="about" href="/about">About</a>
		<a class="download button green" href="/download">Download</a>
	</nav>
</header>