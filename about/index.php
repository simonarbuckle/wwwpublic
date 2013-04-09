<!DOCTYPE html>
<html>
	<head>
		<?php include '../include/_head.php' ?>
	</head>
	<body class="about">
		<?php include '../include/_header.php' ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<div class="columns main-page two">
						<article class="column">
							<h1>About us</h1>
							<p>Aria Templates (a.k.a. AT) is a JavaScript framework aimed at building rich and highly scalable enterprise web applications. Its core components
							include a versatile object oriented language, a strong dependency management system and an efficient client-side templating engine, available for HTML
							and CSS, with bidirectional data bindings.</p>
							<h3>Why did we build Aria Templates</h3>
							<p>AT has been developed internally by Amadeus since 2009 for its professional products. It isn't the Amadeus' first JavaScript library, although it is
							the first to be released as <a href="/license">open source</a> software.</p>
							<p>Previous libraries, also built internally by Amadeus, had been around since early 2007, and offered a complete set of features, but based
							on different technological stack. At this time, all pages were made using JSPs. The library, developed as a JSP Tag Library associated to
							JavaScript objects (some of them homemade and some from YUI library), was providing a rich set of user interface widgets.</p>
							<p>On one hand, our support standards were based, and are still based, on many factors including usage stats and the upgrade paths available for
							our customers in term of resources (computers, browsers, ...). For instance, we still have a significant number of users on Internet Explorer 6.
							On the other hand our professional applications are more and more complex, involving 100+ different available screens.</p>
							<p>All these events prompted us, back in 2009, to start thinking at a more adapted and powerful solution for our technical stack: Aria Templates was born.</p>
							<h3>Seriously, a new framework ?</h3>
							<p>The first question to ask is « Why not use an existing library? »</p>
							<p>Back in 2009, no clear and wide range of open source JavaScript libraries was available. Most popular ones were
							<a href="http://www.sencha.com/products/extjs/">ExtJS</a>, <a href="http://developer.yahoo.com/yui/2/">YUI 2</a>, and <a href="http://jquery.com/">jQuery</a>.
							So we had a full review of these major libraries, but we found that none met our requirements and guidelines, with especially browser support and
							performances being major issues.</p>
							<p>The core idea that led us to the create Aria Templates is the advanced client side template engine. With such an engine :
							<ul>
								<li>We can manage in the DOM at one point in time only what is visible on screen.</li>
								<li>We can also benefit of bidirectional data bindings.</li>
								<li>We can have automatic refreshes.</li>
								<li>We can hide browsers hacks behind CSS templating.</li>
								<li>We can easily debug, everything is JavaScript!</li>
								<li>...</li>
								<li>Efficiency and performances are finally here!  In other words, « yes, we can ! »</li>
							</ul>
							</p>

							<h3>Why open source Aria Templates?</h3>
							<p>Amadeus has a strong tradition of using a lot of different open source softwares. We use it widely across many of our platforms. Unfortunately
							we are less used to contribute.</p>
							<p>So we decided to be also part of the adventure, and Aria Templates became an obvious candidate for open-sourcing. As a pure JavaScript library, it is
							free of dependencies, and therefore easy for anyone to use.</p>
							<p>The first release available is version 1.2, as we think it is now quite stable. It has been used for more than 2 years internally. More importantly, we already started
							thinking about what changes to commit for next version 2.0.</p>

							<p>Trying to create a wider community around AT, gather feedback, and help us building the future of Aria Templates was an opportunity we couldn't
							miss.</p>

							<p>Let's hope you'll like it, we invite you to take <a href="/usermanual">a look</a> at Aria Templates, <a href="/guides">try it out</a>, and
							share your <a href="/contact">thoughts</a> and <a href="/contribute">ideas</a>

							<h3>License</h3>
							<p>Aria Templates is an open source project under the <a href="/license">Apache 2.0 license</a>. All your contributions are very welcome, have a look at the
							<a href="/contribute">Contribute page</a> for more information.</p>


						</article>
						<aside class="column sidebar">
							<div>
								<h4>Amadeus</h4>
								<p>Amadeus is a leading transaction processor for the global travel and travel industry,
								providing transaction processing power and technology solutions to both travel providers and travel agencies.</p>
							</div>
							<div class="onsale">
								<h5>Amadeus on Internet</h5>
								<p>
									<ul>
										<li><a href="http://www.amadeus.com" target="_blank">Amadeus web site</a></li>
										<li><a href="http://www.facebook.com/AmadeusITGroup" target="_blank">Facebook page</a></li>
										<li><a href="http://twitter.com/#!/AmadeusITGroup" target="_blank">Twitter</a></li>
										<li><a href="http://www.linkedin.com/company/2780?trk=tyah" target="_blank">Linked In</a></li>
									</ul>
								</p>
							</div>
						</aside>
						<!--a class="go-to-top" href="">Top of page</a-->
					</div>
				</div>
			</section>
		</div>
		<?php include '../include/_footer.html' ?>
	</body>
</html>