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

							<h2>General questions</h2>

								<h4>What is Aria Templates?</h4>
									<p>Aria Templates is a Javascript MVC framework that uses client-side templating.
									<p>AT consists in a template engine (see questions below) that makes creating user interfaces a breeze, and a set of libraries to help you develop web applications quickly and efficiently.


								<h4>Yet Another JavaScript Framework?</h4>
									<p>Back in 2009, at the time AT started, client-side templating was a new and promising concept with no real useable implementation.  Aria Templates has been designed from the ground up to be an enterprise grade framework that would shorten development cycles and be sufficiently robust to be used in production environments.  You can read more about AT's background in our <a href="http://ariatemplates.com/about">About section</a>.

								<h4>What is Atlas?</h4>
									<p>Atlas is the name of the first template engine that is used today in AT and stands for Aria Templates LAyout System.  It has been created in 2009 at the heart of the AT framework.
									<p>To know more about it, check out those samples <a href="http://ariatemplates.com/samples/">http://ariatemplates.com/samples/</a>

								<h4>What is HashSpace?</h4>
									<p>HashSpace is an additional template engine introduced in 2014 that provides several improvements over the current template syntax and concepts.
									<p>HashSpace has been designed to bring features and evolutions that were difficult to implement in Atlas.  It also aims at bridging the gap between AT users’ requirements and commonly used standards.
									<p>Please head to <a href="http://hashspace.ariatemplates.com/playground">http://hashspace.ariatemplates.com/playground</a> for practical examples of code.

								<h4>Is AT open source?  What license does it use?</h4>
									<p>Yes, Aria Templates – template engines and libraries – are all open source and available on <a href="https://github.com/ariatemplates">Github</a>.
									<p>Aria Templates uses the Apache 2.0 License. More information is available on the <a href="http://ariatemplates.com/license">license page</a>. 

								<h4>Is AT based on &lt;JQuery | AngularJS | FrameworkX&gt;’s code?</h4>
									<p>No.  Aria Templates’ code base does not borrow from other frameworks.
									<p>While both Atlas and HashSpace share some concepts with other MVC frameworks such as Angular or React, they don’t share the same internal mechanisms.

								<h4>What are the supported browsers?</h4>
								<p>All modern browsers are supported as well as IE down to version 7 when using Atlas and version 8 for HashSpace.

								<h4>Does AT pass the Turing test?</h4>
								<p>Sadly no, but our support hopefully does.

							<h2>HashSpace specifics</h2>

								<h4>Why “HashSpace”?</h4>
									<p>The name HashSpace is a reference to the characters used at the beginning of a template definition:
									<pre><span style="background-color:yellow"># </span>template hello(world)</pre>

								<h4>Is it a new framework?  Is it backward compatible?</h4>
									<p>HashSpace is an alternate engine inside AT, it is not a framework on its own.  The syntax it uses is different from the one used in Atlas and each engine is only able to process templates specifically written for it.
									<p>However, both may run in parallel, which means that different template kinds can run simultaneously inside the same application.  Specific components have also been designed for an even tighter integration to allow inclusion of HashSpace components inside Atlas templates or Atlas widgets inside HashSpace templates.

								<h4>Will HashSpace replace AT as we know it?</h4>
									<p>Inside AT, HashSpace can either be used on its own or alongside the current template engine but it does not replace it.  Atlas will continue to be maintained and developed as usual.

								<h4>When will it be available?  What is the roadmap?</h4>
									<p>Aria Templates 1.6 will be delivered mid-June 2014 and will include the new NoderJS dependency manager (read more about Noder <a href="http://noder-js.ariatemplates.com/">here</a>.)  This will pave the way for beta release of the HashSpace library, due mid-July 2014.

							<h2>How do I...?</h2>

								<h4>How do I create my first project?</h4>
									<p>The simplest way to start a project is to prototype it using our <a href="http://cdn.ariatemplates.com/">CDN</a>.  If you want to plan for a big project right from the start, we recommend you use our Yeoman project generator that creates everything you need to get started in a matter of seconds.  Read <a href="http://ariatemplates.com/blog/2013/07/generator-for-at-project-scaffolding/">this post</a> for the details.

								<h4>How can I use framework/library X in my Aria Templates project?</h4>
									<p>While there shouldn’t be any technical problem to include a third-party library in your project, you should keep in mind that the template engine handles DOM updates automatically so that you don’t have to.  To make sure other libraries play nice with AT, you should either rely on solutions provided by each engine: use <a href="http://ariatemplates.com/blog/2013/01/iframes/">embed elements</a> in Atlas or <a href="http://hashspace.ariatemplates.com/playground/">wrap external components</a> with HashSpace.

								<h4>How do I get syntax highlighting for my templates?</h4>
									<p>If you are using Atlas and Eclipse, you can already benefit from syntax highlighting and validation from the AT Eclipse plugin.  Amadeus users can check <a href="http://aria.nce.amadeus.net/ateditor/">this link</a> for the installation procedure.  The plugin will make its way to open source in the weeks to come.  Notepad++ or SublimeText users can benefit from syntax highlighters available in the <a href="https://github.com/ariatemplates/editors-tools">editor-tools</a> repository. 
									<p>If you are using HashSpace, a newer version of the Eclipse plugin is on its way.  We also plan to support SublimeText right after that release.

							<h2>Common issues</h2>

								<h4>(Atlas) Updating the data model does not trigger any refresh</h4>
									<p>You probably are modifying the data model directly instead of using the <a href="http://www.ariatemplates.com/aria/guide/apps/apidocs/#aria.utils.Json">appropriate helpers</a>.  For example, bindings will not be notified if you type
									<pre>this.data.score = 42;</pre>
									For this to work properly you need to write
									<pre>aria.utils.Json.setValue(this.data, "score", 42);</pre>

								<h4>(Atlas) I added a controller and my app stopped working</h4>
									<p>Chances are that your controller implements an init() method that doesn't complete properly.  Remember that, because init can be implemented asynchronously, the framework has no way to tell when it finishes.  To state that you're done, your init method must at one point call back the framework like this:
									<pre>this.$callback(cb);</pre>
									The callback pattern is explained <a href="/usermanual/latest/working_in_an_asynchronous_world">here</a>.

							<h2>Reaching us</h2>

								<h4>Can I contribute?</h4>
									<p>Why, of course!  If you want to contribute to AT everything is explained on <a href="http://ariatemplates.com/contribute">this page</a>. 

								<h4>How to submit bug reports?</h4>
									<p>If you’re an open source user, please report bugs or issues directly on <a href="http://github.com/ariatemplates/ariatemplates/issues">Github</a>.  If you have a question or a broader code issue, don’t hesitate to leave a post in our <a href="http://ariatemplates.com/forum/">forum</a> or to <a href="http://ariatemplates.com/about/contact">drop us a message</a>!
									<p>Amadeus users can open PTRs and assign them to R&amp;D-AQG-DUI-UCF-AFW or UAS.  You may also contact one of the guys in support for the current sprint according to the list on <a href="http://topspot/index.php/Aria_Templates">this page</a>.

								<h4>How can we ask for and follow up development of new features?</h4>
									<p>If you’re an open source user, you can either open an issue or – if you have code to suggest – a Pull Request directly on <a href="http://github.com/ariatemplates/ariatemplates/issues">Github</a>.  If you’d prefer to discuss with us beforehand, please head to the <a href="http://ariatemplates.com/forum/">forum</a> or <a href="http://ariatemplates.com/about/contact">drop us a message</a>.
									<p>Amadeus users should directly contact one of the product owners (Marc Laval or Olaf Kappes) so that your request can be added to our backlog and its priority defined with us.  Check <a href="http://topspot/index.php/Aria_Templates_bug_reporting_and_feature_requests">here</a> for details.

							<h2>Releases</h2>

								<h4>How often do you release a new version of AT?</h4>
									<p>Aria Templates is developed in SCRUM with 3-week sprints.  A new release is delivered at the end of every sprint.

								<h4>Is there a roadmap?</h4>
									<p>The content of the current sprint and our backlog is currently available on <a href="http://rndwww.nce.amadeus.net/agile/secure/RapidBoard.jspa?rapidView=230&amp;view=planning.nodetail">Jira</a> (Amadeus users only.)

								<h4>What about old releases and backward compatibility?</h4>
									<p>A given version of AT is supported for 8 sprints (24 weeks) after its release.
									<p>On specific occasions, some features may need to be replaced or simply removed.  When this happens, the deprecation is clearly announced in the corresponding release notes and the deprecation period starts.  During this period, which lasts from 9 to 15 weeks, deprecated feature will continue to work while issuing warnings in the console.  At the end of this period, a non-backward compatible release is delivered.

						</div>

				</div>
			</section>
		</div>
		<?php include 'include/_footer.html' ?>
	</body>
</html>