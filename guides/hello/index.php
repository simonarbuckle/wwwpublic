<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Hello Guide" ?>
		<?php include '../../include/_head.php' ?>
        <link rel="stylesheet" href="http://snippets.ariatemplates.com/css/highlight_skin.css" type="text/css"/>
        <style>
        pre.prettyprint code {
            background: none repeat scroll 0 0 #333333;
            border-radius: 4px 4px 4px 4px;
            color: #F8F8F8;
            display: block;
            padding: 0.5em;
            overflow-x: scroll;
        }
        </style>
	</head>
	<body class="learn">
		<?php include '../../include/_header.php' ?>
		<script type="text/javascript" src="/js/top-scrolling.js"></script>
		<div id="top"><a href="#top"></a></div>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<div class="columns main-page two">
						<article class="column guides">
							<div id="scrollMenu" class="up">
								<div>
									<a href="#top" onclick="smoothScroll('top');return false">Top</a>
								</div>
							</div>
							<div class="tutorial">
								<h1>Hello World</h1>
								<div class="intro">
									<p>As a developer, when you want to start with a new development framework you will try to write the "Hello World" and see how easy it is. Well, with aria templates, it's pretty easy.</p>
									<p></p>
									<p>This guide shows you how to write the very basic Hello World example and how to add few little things in 2 simple steps.</p>
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Write the very basic "Hello World" app.</li>
										<li>Add some logic and style to your app.</li>
									</ul>
								</div>
								<div class="content">
									<h3>Tutorial Hello World - Sample 1</h3>
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/hello/sample_1/</code>).</p>

									<h4>Step 2</h4>
									Inside <code>index.html</code> you will have to load the aria templates framework, define the container div and load the template that you will create.
									<p>To load the framework include these scripts: </p>
									<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"/aria/ariatemplates-1.2.0.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span><br>
<span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"/aria/css/atskin-1.2.0.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span></div></div></div>
									<p>To display your template you need to target a div that will contain it, so you have to define the div container like this:</p>
									<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">div</span> <span style="color: #00FF40;">id</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"myContainer"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">div</span>&gt;</span></div></div></div>
									To load the template you need to call the <code>Aria.loadTemplate()</code> function and specify the template classpath and the div container (defined previously):
									<div class="wp_syntax"><div class="code"><div class="javascript" style="font-family:monospace;"><span style="color: #F8F8F8">&lt;</span>script type<span style="color: #F8F8F8">=</span><span style="color: #80FF00;">"text/javascript"</span><span style="color: #F8F8F8">&gt;</span><br>
Aria.<span style="color: #F8F8F8;">loadTemplate</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"ariadoc.guides.hello.sample_1.view.Hello"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"myContainer"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; data<span style="color: #F8F8F8">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; msg<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"Hello World, this is AriaTemplates!"</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									In this case we have defined also the data model inside the <code>Aria.loadTemplate()</code> function using the <code>data</code> object.<br/>
									To have more info about how to load a template take a look at <a href="../usermanual/What_are_Templates%3F#Loading_templates">this article</a>.
									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Hello.tpl</b></i>. This is the template that will be used to display the message "Hello World".</p>
									<p>Save it inside the view folder inside your project (<code>/guides/hello/sample_1/view/</code>).</p>

									<h4>Step 4</h4>
									Define the classpath of your template and display the message that you have defined inside the data model, in this case "Hello World, this is aria templates!":
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'ariadoc.guides.hello.sample_1.view.Hello'</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> main<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>h1<span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>data.<span style="color: #F8F8F8;">msg</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>h1<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">Template</span><span style="color: #F8F8F8;">}</span></div></div></div>

									<h4>Step 5</h4>
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
									<p class="note"><b>Note:</b> If you have a doubt about the template syntax please take a look at <a href="/usermanual/What_are_Templates%3F#Templates_syntax">this page</a>.</p>
								</div>
								<div class="content">
									<h3>Tutorial Hello World - Sample 2</h3>

									<h4>Step 1</h4>
									<p>Create the <i><b>index.html</b></i> file like you did in sample 1 step 1.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/hello/sample_2/</code>).</p>

									<h4>Step 2</h4>
									Inside <code>index.html</code> you will have to load the aria templates framework and the template that you will create.
									<p>To load the framework and to define the div container use the same code used inside sample1 step 2.</p>
									To load the template:
													<div class="wp_syntax"><div class="code"><div class="javascript" style="font-family:monospace;"><span style="color: #F8F8F8">&lt;</span>script type<span style="color: #F8F8F8">=</span><span style="color: #80FF00;">"text/javascript"</span><span style="color: #F8F8F8">&gt;</span><br>
Aria.<span style="color: #F8F8F8;">loadTemplate</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp;classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"ariadoc.guides.hello.sample_2.view.Hello"</span><span style="color: #F8F8F8">,</span><br>
&nbsp;div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"myContainer"</span><span style="color: #F8F8F8">,</span><br>
&nbsp;data<span style="color: #F8F8F8">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; people<span style="color: #F8F8F8">:</span><span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BDAE9D">name</span><span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"John"</span><span style="color: #F8F8F8">,</span>age<span style="color: #F8F8F8">:</span><span style="color: #FF3A83;">27</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BDAE9D">name</span><span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"Mary"</span><span style="color: #F8F8F8">,</span>age<span style="color: #F8F8F8">:</span><span style="color: #FF3A83;">25</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BDAE9D">name</span><span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"David"</span><span style="color: #F8F8F8">,</span>age<span style="color: #F8F8F8">:</span><span style="color: #FF3A83;">35</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BDAE9D">name</span><span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"Fabien"</span><span style="color: #F8F8F8">,</span>age<span style="color: #F8F8F8">:</span><span style="color: #FF3A83;">28</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">]</span><br>
&nbsp;<span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
											Here we are defining a data model with some people with name and age.

									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Hello.tpl</b></i>.</p>
									<p>Save it inside the view folder inside your project (<code>/guides/hello/sample_2/view/</code>).</p>

									<h4>Step 4</h4>
									Define the classpath of your template, specify that your template will have some CSS style and a script:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'ariadoc.guides.hello.sample_2.view.Hello'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$css</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.hello.sample_2.view.HelloStyle'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span>true<br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Declare the <code>macro main()</code> and inside of it display all people's name using a foreach and display all the people's attribute using a repeater:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> main<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"travelerForm"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"formHelpMsg"</span><span style="color: #F8F8F8;">&gt;</span>Hello <br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> people <span style="color: #BBBEFF">inArray</span> data.<span style="color: #F8F8F8;">people</span><span style="color: #F8F8F8;">}</span> <br>
&nbsp; &nbsp; &nbsp; $<span style="color: #F8F8F8;">{</span>people.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span> this is Aria Templates<span style="color: #F8F8F8;">!</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>br <span style="color: #F8F8F8;">/&gt;&lt;</span>br <span style="color: #F8F8F8;">/&gt;</span>Click <span style="color: #BBBEFF">on</span> a person to view its personal details<span style="color: #F8F8F8;">:</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>repeater <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;loopType<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"array"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;content<span style="color: #F8F8F8;">:</span> data.<span style="color: #F8F8F8;">people</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"DIV"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;childSections <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"psection"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"personDisplay"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"getRepeaterSectionBinding"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"DIV"</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the macro to manage the sections inside the repeater and define the on click event on them:
<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> personDisplay<span style="color: #F8F8F8;">(</span>repeaterItem<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> person<span style="color: #F8F8F8;">=</span>repeaterItem.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> detailsVisible<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">(</span>person<span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"data:detailsVisible"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> cls<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">(</span>detailsVisible<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">?</span> <span style="color: #80FF00;">"pwdetails"</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"pnodetail"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls}"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; $<span style="color: #F8F8F8;">{</span>person.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> detailsVisible<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">:</span> $<span style="color: #F8F8F8;">{</span>person.<span style="color: #F8F8F8;">age</span><span style="color: #F8F8F8;">}</span> years old <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
                                    Finally, don't forget to close the opening Template tag:
                                    <div class="wp_syntax"><div class="code"><div class="at" style="font-family: monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">Template</span><span style="color: #F8F8F8;">}</span></div></div></div>

									<h4>Step 5</h4>
									<p>Create a file and call it <i><b>HelloScript.js</b></i>.</p>
									<p>Save it inside the view folder inside your project (<code>/guides/hello/sample_2/view/</code>).</p>

									<h4>Step 6</h4>
									Define the classpath, the dependencies and the constructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.hello.sample_2.view.HelloScript'</span><span style="color: #F8F8F8;">,</span><br>
<span style="color: #9FCA78">$dependencies</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'aria.utils.Json'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
$constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the functions to manage the on click event to display the age for the clicked person:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">getRepeaterSectionBinding<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>repItem<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> person<span style="color: #F8F8F8;">=</span>repItem.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; return <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"data:detailsVisible"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>person<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>


											<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">toggleDetailDisplay<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> person<span style="color: #F8F8F8;">=</span>args<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> detailsVisible<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">(</span>person<span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"data:detailsVisible"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; aria.<span style="color: #F8F8F8;">utils</span>.<span style="color: #F8F8F8;">Json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>person<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"data:detailsVisible"</span><span style="color: #F8F8F8;">,!</span>detailsVisible<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> If you have a doubt about the template script syntax please take a look at <a href="/usermanual/Template_Scripts">this page</a>.</p>

									<h4>Step 7</h4>
									<p>Create a file and call it <i><b>HelloStyle.tpl.css</b></i>.</p>
									<p>Save it inside the view folder inside your project (<code>/guides/hello/sample_2/view/</code>).</p>

									<h4>Step 8</h4>
									Give some style to your app.
									<p class="note"><b>Note:</b> If you have a doubt about the CSS template syntax please take a look at <a href="/usermanual/CSS_Templates">this page</a>.</p>

									<h4>Step 9</h4>
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>

								</div>
							</div>
						</article>
						<aside class="column sidebar">
							<div class="tryit">
								<a class="runguide hello button blue" href="#">See how it works</a>
								<div class="steps">
									<a class="one" href="/ariadoc/guides/hello/sample_1/index.html" target="_blank">Sample 1</a>
									<a class="two" href="/ariadoc/guides/hello/sample_2/index.html" target="_blank">Sample 2</a>
								</div>
							</div>
							<?php include '../_gobacktolist.html' ?>
						</aside>
					</div>
				</div>
			</section>
		</div>
		<?php include '../../include/_footer.html' ?>
	</body>
</html>