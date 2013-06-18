<!DOCTYPE html>
<html>
	<head>
		<?php include 'include/_head.php' ?>
		<script type="text/javascript" src="/js/top-scrolling.js"></script>
	</head>
	<body class="documentation">
		<div id="top"><a href="#top"></a></div>
		<?php include 'include/_header.php' ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<div class="columns main-page two">

						<h1>FAQ</h1>
						<p>Below are answers to the most common questions regarding Aria Templates.<br/>If you have a question that is not adressed here, don't hesitate and <a href="/about/contact">contact us</a>.</p>

						<div id="questions">

							<div id="scrollMenu" class="up">
								<div>
									<a href="#top" onclick="smoothScroll('top');return false">Top</a>
								</div>
							</div>

							<h2>General</h2>
							<ul>
								<li>
									<h3>What is Aria Templates?  Is it a new library?</h3>
									<p>
										Aria Templates is an MVC Javascript framework based on client-side templating.
										AT provides a set of helpers that make it easier to develop web applications and, as a framework, enriches your code with familiar features inspired from common object-oriented concepts.  It also is a powerful templating which make creating user interfaces a breeze.
									</p>
								</li>
								<li>
									<h3>Why come up with another JavaScript framework?</h3>
									<p>
										At the time AT started, client-side templating was a new and promising concept with no real useable implementation.  Aria Templates has been designed from the ground up to be an enterprise grade framework that would shorten development cycles and be sufficiently robust to be used in production environments.  You can read more about AT's background in our <a href="/about">About section</a>.
									</p>
								</li>
								<li>
									<h3>Under what license is AT available?</h3>
									<p>
										Aria Templates uses the Apache 2.0 License. More information is available on the <a href="/license">license page</a>.
									</p>
								</li>
								<li>
									<h3>What are the supported browsers?</h3>
									<p>
										All modern browsers are supported as well as IE down to version 7.
									</p>
								</li>
							</ul>

							<h2>How do I...?</h2>
							<ul>
								<li>
									<h3>How do I create my first project?</h3>
									<p>
										You'll first need to <a href="/download">download a copy of the framework here</a>, then you can download one of the existing <a href="/guides">guides</a><!-- or start from one of the <a href="/samples">samples</a>-->.  To start a new project from scratch, install the <a href="/usermanual/latest/atgen">Atgen</a> utility.
									</p>
								</li>
								<li>
									<h3>How do I access DOM elements?</h3>
									<p>
										Aria Templates is designed so that you don't have to care about DOM micro-management, which is why you won't have to worry about that question.
									</p>
								</li>
								<li>
									<h3>How can I use framework/library X in my Aria Templates project?</h3>
									<p>
										Because of the way AT operates (sandboxing DOM access and refreshing it), using other JS libraries in your code might prove tricky at times.  One solution to this is to use the embed widget to create a container that will not be managed by AT.  Take a look at this article for more information.
									</p>
								</li>
								<li>
									<h3>How do I get syntax highlighting for my templates?</h3>
									<p>
										We're actively working on an IDE to make UI developers' life easier.<br />
										If you are an Eclipse user, you can already benefit from syntax highlighting and basic completion from the AT Eclipse plugin. Send us <a href="/about/contact">a message</a> to get information on how to install it.
									</p>
									<p>
										For Notepad++ or SublimeText users, we also have syntax highlighters available for you. Have a look at the <a href="https://github.com/ariatemplates/editors-tools" target="_blank">editor-tools</a> repository.
									</p>
								</li>
								<li>
									<h3>How to submit bug reports / suggestions?</h3>
									<p>
										If you find some problem, issue or bug, please report it <a href="http://github.com/ariatemplates/ariatemplates/issues">here</a>.  If you want to contribute to AT everything is explained on this <a href="/contribute">page</a>.  For general questions don't hesitate to <a href="/about/contact">drop us a message</a>!
									</p>
								</li>
							</ul>

							<h2>Common issues</h2>
							<ul>
								<li>
									<h3>Updating the data model does not trigger any refresh</h3>
									<p>
										You probably are modifying the data model directly instead of using the <a href="http://www.ariatemplates.com/aria/guide/apps/apidocs/#aria.utils.Json">appropriate helpers</a>.  For example, bindings will not be notified if you type
										<pre>this.data.score = 42;</pre>
										For this to work properly you need to write
										<pre>aria.utils.Json.setValue(this.data, "score", 42);</pre>
									</p>
								</li>
								<li>
									<h3>I added a controller and my app stopped working</h3>
									<p>
										Chances are that your controller implements an init() method that doesn't complete properly.  Remember that, because init can be implemented asynchronously, the framework has no way to tell when it finishes.  To state that you're done, your init method must at one point call back the framework like this:
										<pre>this.$callback(cb);</pre>
										The callback pattern is explained <a href="/usermanual/latest/working_in_an_asynchronous_world">here</a>.
									</p>
								</li>
							</ul>

						</div>

				</div>
			</section>
		</div>
		<?php include 'include/_footer.html' ?>
	</body>
</html>