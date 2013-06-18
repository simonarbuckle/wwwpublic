<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Treeview Guide" ?>
		<?php include '../../include/_head.php' ?>
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
								<h1>Treeview</h1>
								<div class="intro">									
									<p>In this guide you will learn how to design your own treeview in a very easy way. Normally the treeview is one of the most frustrating component, but in aria templates is very simple to use it.</p>
									<p></p>
									<p>This guide shows you how to write the very basic treeview component.</p>
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Create the treeview template.</li>
										<li>Create the module controller to manage the treeview logic.</li>
										<li>Use filter to simulate a server to fecth data from an external xml file.</li>
										<li>Use the submitJsonRequest to request data.</li>
										<li>Use the aria templates asynch paradigm.</li>
										<li>Use aria widgets.</li>
										<li>Use a section with automatic refresh bound to the data model.</li>
									</ul>
								</div>
								<div class="content">
									<h3>Tutorial</h3>
									
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/treeview/</code>).</p>
									
									<h4>Step 2</h4>
									Inside <code>index.html</code> you will have to load the aria templates framework, define the container div and load the template that you will create. 
									<p>To load the framework: </p>
									<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"/aria/ariatemplates-1.2.0.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span><br>
<span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"/aria/css/atskin-1.2.0.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span></div></div></div>
									<p>To define the div container:</p>
									<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">div</span> <span style="color: #00FF40;">id</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"root"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">div</span>&gt;</span></div></div></div>
									To load the template:
									<div class="wp_syntax"><div class="code"><div class="javascript" style="font-family:monospace;"><span style="color: #F8F8F8">&lt;</span>script type<span style="color: #F8F8F8">=</span><span style="color: #80FF00;">"text/javascript"</span><span style="color: #F8F8F8">&gt;</span><br>
Aria.<span style="color: #F8F8F8;">loadTemplate</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">'ariadoc.guides.treeview.view.Main'</span><span style="color: #F8F8F8">,</span><br>
&nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"root"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; moduleCtrl<span style="color: #F8F8F8">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; classpath <span style="color: #F8F8F8">:</span> <span style="color: #80FF00;">"ariadoc.guides.treeview.Controller"</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									Inside the bootstrap you are defining also the module controller.
									
									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Main.tpl</b></i>. This is the template that will be used to display the treeview.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/treeview/view/</code>).</p>
									
									<h4>Step 4</h4>
									Define the classpath of your template, define that your template has some CSS style and a script:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'ariadoc.guides.treeview.view.Main'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span> true<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$css</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.treeview.view.MainStyle'</span><span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define inside the <code>macro main()</code> the <code>@aria:Link</code> widget to load the data inside the treeview and call the <code>treview()</code> macro:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> main<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:Link</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; label<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Load Data"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; onclick<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"loadData"</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> treeview<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the macro <code>treeview()</code> to display the html using a section:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> treeview<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"mainMenu"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"treeviewSection"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"menu"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">,</span> recursive<span style="color: #F8F8F8;">:</span>false<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">!</span>data.<span style="color: #F8F8F8;">menu</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">[</span>no data<span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> tv2_array<span style="color: #F8F8F8;">(</span>data.<span style="color: #F8F8F8;">menu</span>.<span style="color: #F8F8F8;">menus</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>											
											Define the <code>tv2_array()</code> macro and the <code>tv2()</code> macro to create the treeview content:
											<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> tv2_array<span style="color: #F8F8F8;">(</span>mnuArray<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> mnuArray<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>ul<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> submenu <span style="color: #BBBEFF">inArray</span> mnuArray<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> tv2<span style="color: #F8F8F8;">(</span>submenu<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>ul<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>											
											
											<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* tv2: list with expand/collapse links<br>
&nbsp;*/</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> tv2<span style="color: #F8F8F8;">(</span>mnu<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">!</span>mnu.<span style="color: #F8F8F8;">menus</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// no sub-menu</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>li class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"tv"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>mnu.<span style="color: #F8F8F8;">text</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>li<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// this menu has sub menus</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"treeviewSection"</span><span style="color: #F8F8F8;">+</span>mnu.<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"LI"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; cssClass<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"tv"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"data:expanded"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>mnu<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #666666">// process css class</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> cls<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">(</span>mnu<span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"data:expanded"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">?</span><span style="color: #80FF00;">"tvOpen"</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"tvClosed"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>span class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"tvIcon ${cls}"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $<span style="color: #F8F8F8;">{</span>mnu.<span style="color: #F8F8F8;">text</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> mnu<span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"data:expanded"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> tv2_array<span style="color: #F8F8F8;">(</span>mnu.<span style="color: #F8F8F8;">menus</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about sections take a look at <a href="/usermanual/latest/writing_templates#section">this page</a>.</p>
										
									<h4>Step 5</h4>	
									<p>Create a file and call it <i><b>MainScript.js</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/treeview/view/</code>).</p>
									
									<h4>Step 6</h4>
									Define the classpath, the dependencies and the costructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">tplScriptDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.treeview.view.MainScript'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$dependencies</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'aria.utils.Json'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the function <code>loadData()</code> to call the controller method to load the data from the xml file:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">loadData<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">loadData</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"some param"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the function <code>toggleMenu()</code> to expand or not the treeview:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">toggleMenu<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> mnu<span style="color: #F8F8F8;">=</span>args<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> expanded<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">(</span>mnu<span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"data:expanded"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;aria.<span style="color: #F8F8F8;">utils</span>.<span style="color: #F8F8F8;">Json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>mnu<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"data:expanded"</span><span style="color: #F8F8F8;">,!</span>expanded<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
											<p class="note"><b>Note:</b> If you have a doubt about the template script syntax please take a look at <a href="/usermanual/latest/template_scripts">this page</a>.</p>
									
									<h4>Step 7</h4>
									<p>Create a file and call it <i><b>ControllerInterface.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/treeview/</code>).</p>
									
									<h4>Step 8</h4>
									Define the classpath, which class the controller interface extends, that is always <code>aria.templates.IModuleCtrl</code> and write the signature of all the methods of your controller:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">interfaceDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.treeview.ControllerInterface'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.IModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;$interface <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; loadData <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">,</span>$callbackParam<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span></div></div></div>
									
									<h4>Step 9</h4>	
									<p>Create a file and call it <i><b>Controller.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/treeview/</code>).</p>
									
									<h4>Step 10</h4>	
									Define the classpath, which class the controller extends, that is always <code>aria.templates.ModuleCtrl</code>, which controller interface implements, in our case <code>ariadoc.guides.treeview.ControllerInterface</code> (that's the controller interface defined in the previous step), define the constructor and the destructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">classDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.treeview.Controller'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.ModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;$implements <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.treeview.ControllerInterface'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;$constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.$ModuleCtrl.<span style="color: #F8F8F8;">constructor</span>.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;$destructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.$ModuleCtrl.$destructor.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span></div></div></div>
									Add the filter in order to simulate the server to fetch the data:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">aria.<span style="color: #F8F8F8;">core</span>.<span style="color: #F8F8F8;">IOFiltersMgr</span>.<span style="color: #F8F8F8;">addFilter</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">'ariadoc.guides.treeview.mocks.TestMsgHandler'</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span></div></div></div>
									Define the function <code>loadData()</code> to fetch the data from the xml file to load them inside the treeview using a <code>submitJsonRequest</code> and add the callback to set the values returned:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Load some data to display in the treeview<br>
&nbsp; * @param {String} param sample parameter<br>
&nbsp; * @param {aria.core.JsObject.Callback} cb callback<br>
&nbsp; */</span><br>
loadData <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>param<span style="color: #F8F8F8;">,</span>cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> requestData <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span>myparam<span style="color: #F8F8F8;">:</span>param<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span> <span style="color: #666666">// set json rewquest params here</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">submitJsonRequest</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"getData"</span><span style="color: #F8F8F8;">,</span> requestData<span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; fn <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"_loadData"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; scope <span style="color: #F8F8F8;">:</span> this<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; args <span style="color: #F8F8F8;">:</span> cb<br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
<br>
<span style="color: #FFFF80">/**<br>
&nbsp; * loadDataset callback - called when server response is received<br>
&nbsp; * @param {Object} res the return value of submitJsonrequest<br>
&nbsp; * @param {Callback} args the callback arcugment passed by loadDataset<br>
&nbsp; */</span><br>
&nbsp; _loadData<span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>res<span style="color: #F8F8F8;">,</span> args<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> cb<span style="color: #F8F8F8;">=</span>args<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>res.<span style="color: #F8F8F8;">error</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; return<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds <span style="color: #F8F8F8;">=</span> res.<span style="color: #F8F8F8;">response</span><span style="color: #F8F8F8;">;</span><br>
<br>
&nbsp; &nbsp; <span style="color: #666666">// add dataset to the list and select it</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"menu"</span><span style="color: #F8F8F8;">,</span>ds.<span style="color: #F8F8F8;">menu</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									
									<h4>Step 11</h4>	
									<p>Create a file and call it <i><b>MainStyle.tpl.css</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/treeview/</code>).</p>
									
									<h4>Step 12</h4>	
									<p>Give some style to your todo app.</p>
									<p class="note"><b>Note:</b> If you have a doubt about the CSS template syntax please take a look at <a href="/usermanual/latest/css_templates">this page</a>.</p>
									
									<h4>Step 13</h4>	
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
								</div>
							</div>
						</article>
						<aside class="column sidebar">
							<div class="tryit">							
								<a class="runguide button blue" href="/ariadoc/guides/treeview/" target="_blank">See how it works</a>
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