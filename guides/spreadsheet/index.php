<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Spreadsheet Guide" ?>
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
								<h1>Spreadsheet</h1>
								<div class="intro">									
									<p>In this guide you will learn how to develop a program to generate and use spreadsheets, giving you the possibility to create new ones, to load and to copy existing ones.</p>
									<p></p>									
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Use filters to simulate a server to fecth data from an external xml file.</li>
										<li>Use the submitJsonRequest to request data.</li>
										<li>Use the aria templates asynch paradigm.</li>
										<li>Use partial refresh mechanism with repeaters.</li>
										<li>Use aria templates widget @aria:TextField.</li>
									</ul>									
								</div>
								<div class="content">
									<h3>Tutorial</h3>	
									
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/spreadsheet/</code>).</p>
									
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
&nbsp; &nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">'ariadoc.guides.spreadsheet.view.Main'</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"root"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp; <span style="color: #666666">// In this sample, we associate a controller to our template</span><br>
&nbsp; &nbsp; moduleCtrl<span style="color: #F8F8F8">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; classpath <span style="color: #F8F8F8">:</span> <span style="color: #80FF00;">"ariadoc.guides.spreadsheet.Controller"</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									Here we are defining also the module controller.
									
									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Main.tpl</b></i>. This is the template that will be used to display the spreadsheet interface.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/spreadsheet/view/</code>).</p>
									
									<h4>Step 4</h4>
									Define the classpath of your template and declare that it has a script and a CSS template.
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'ariadoc.guides.spreadsheet.view.Main'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span> true<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$css</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.spreadsheet.view.MainStyle'</span><span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>macro main()</code>:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> main<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> mainLinks<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> mainLayout<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define inside the macro <code>mainLinks()</code> the links to load, save, copy, cancel and create a new dataset using the <code>@aria:Link</code> widgets:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"mainLinks"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> links<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>name<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Load Dataset"</span><span style="color: #F8F8F8;">,</span>cbfn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"loadDataset"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>name<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"New Dataset"</span><span style="color: #F8F8F8;">,</span>cbfn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"createNewDataset"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>name<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Copy Dataset"</span><span style="color: #F8F8F8;">,</span>cbfn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"copyDataset"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>name<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Save"</span><span style="color: #F8F8F8;">,</span>cbfn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"saveChanges"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>name<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Cancel"</span><span style="color: #F8F8F8;">,</span>cbfn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"cancelChanges"</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> lnk <span style="color: #BBBEFF">in</span> links<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">separator</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&amp;</span>nbsp<span style="color: #F8F8F8;">;|&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">separator</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:Link</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; label<span style="color: #F8F8F8;">:</span>lnk.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; onclick<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; fn<span style="color: #F8F8F8;">:</span>lnk.<span style="color: #F8F8F8;">cbfn</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; scope<span style="color: #F8F8F8;">:</span>moduleCtrl<br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span></div></div></div>
									and a section to display the list of the dataset loaded:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"dsList"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"datasets"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">,</span> recursive<span style="color: #F8F8F8;">:</span>false<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"currentDs"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> data.<span style="color: #F8F8F8;">datasets</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">==</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; No dataset loaded yet..<br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// Display list of currently loaded datasets</span><br>
&nbsp; &nbsp; &nbsp; Datasets<span style="color: #F8F8F8;">:&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> ds <span style="color: #BBBEFF">in</span> data.<span style="color: #F8F8F8;">datasets</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">separator</span><span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">-</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">separator</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> ds<span style="color: #F8F8F8;">==</span>data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>b<span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>ds.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>b<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>a<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$<span style="color: #F8F8F8;">{</span>ds.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>a<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define inside the macro <code>mainLayout()</code> a section to display the spreadsheet inside a table. 
									<p>The table will have this structure:</p>
									<ul>
										<li>for the first row call the <code>dataDiv()</code> macro to generate a div containing the data specified by the dataCat attribute;</li>
										<li>for the second row call the <code>scrollbarDiv()</code> macro to generate a div that will handle the scrollbar;</li>
										<li>for the third row call the <code>dataDiv()</code> macro to generate a div containing the data specified by the dataCat attribute;</li>										
										<li>for the fourth row call the <code>scrollbarDiv()</code> macro to generate a div that will handle the second scrollbar;</li>
									</ul>
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"mainLayout"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"currentDs"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #666666">// process table width to have fixed column sizes</span><br>
&nbsp; &nbsp;<span style="color: #666666">// otherwise column size might change when content is updated</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">!=</span>null<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> borderWidth<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> tblWidthFixed<span style="color: #F8F8F8;">=</span>borderWidth<span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> tblWidthScroll<span style="color: #F8F8F8;">=</span>borderWidth<span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> col <span style="color: #BBBEFF">in</span> data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"fixedColumns"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">set</span> tblWidthFixed<span style="color: #F8F8F8;">+=</span>borderWidth<span style="color: #F8F8F8;">+</span>col.<span style="color: #F8F8F8;">width</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> col <span style="color: #BBBEFF">in</span> data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"scrollableColumns"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">set</span> tblWidthScroll<span style="color: #F8F8F8;">+=</span>borderWidth<span style="color: #F8F8F8;">+</span>col.<span style="color: #F8F8F8;">width</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>table class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"mainLayout"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>tbody<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #666666">// query row</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"dataBlock"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> dataDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"fixedColumns"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"filter1"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"filter"</span><span style="color: #F8F8F8;">,</span>tblWidthFixed<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"dataBlock"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> dataDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"scrollableColumns"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"filter2"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"filter"</span><span style="color: #F8F8F8;">,</span>tblWidthScroll<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"vscroll"</span><span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #666666">// scrollbar row</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hscroll"</span><span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hscroll"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> scrollbarDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"hscroll1"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"hscrollbar"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"width:"</span><span style="color: #F8F8F8;">+</span>tblWidthScroll<span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">"px"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hscroll"</span><span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #666666">// data row</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"dataBlock"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> dataDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"fixedColumns"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"part1"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"data"</span><span style="color: #F8F8F8;">,</span>tblWidthFixed<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"dataBlock"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> dataDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"scrollableColumns"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"part2"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"data"</span><span style="color: #F8F8F8;">,</span>tblWidthScroll<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"vscroll"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> scrollbarDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"vscroll"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"vscrollbar"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"height:2400px"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #666666">// 2nd scrollbar row</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hscroll"</span><span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hscroll"</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> scrollbarDiv<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"hscroll2"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"hscrollbar"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"width:"</span><span style="color: #F8F8F8;">+</span>tblWidthScroll<span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">"px"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hscroll"</span><span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>tbody<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>table<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the macro <code>scrollbarDiv()</code> to generate a div that will habdle the scrollbar using the onScroll event:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> scrollbarDiv<span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">,</span>cssClass<span style="color: #F8F8F8;">,</span>contentStyle<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;</span>div <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">id</span> <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span> class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cssClass}"</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> scroll <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"onScroll"</span><span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">:</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">id</span> <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">"Content"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span> class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cssClass}Content"</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> contentStyle<span style="color: #F8F8F8;">}</span> style<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${contentStyle}"</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the macro <code>dataDiv()</code> to generate a div containing the data specified by the dataCat attribute:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> dataDiv<span style="color: #F8F8F8;">(</span>colType<span style="color: #F8F8F8;">,</span>cssClass<span style="color: #F8F8F8;">,</span>type<span style="color: #F8F8F8;">,</span>tblWidth<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${colType} ${cssClass}"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"dataDiv"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">!</span>data.<span style="color: #F8F8F8;">currentDs</span> <span style="color: #F8F8F8;">||</span> <span style="color: #F8F8F8;">!</span>data.<span style="color: #F8F8F8;">currentDs</span>.<span style="color: #F8F8F8;">items</span> <span style="color: #F8F8F8;">||</span> data.<span style="color: #F8F8F8;">currentDs</span>.<span style="color: #F8F8F8;">items</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">==</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>table class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"datasheet"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>thead<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> col <span style="color: #BBBEFF">in</span> data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">[</span>colType<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>th<span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>col.<span style="color: #F8F8F8;">title</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>th<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>thead<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span>repeater <span style="color: #F8F8F8;">{</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; loopType<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"array"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; content<span style="color: #F8F8F8;">:</span> data.<span style="color: #F8F8F8;">currentDs</span>.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"TBODY"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; childSections <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"dsrow_"</span><span style="color: #F8F8F8;">+</span>colType<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"getRowBindRefresh"</span><span style="color: #F8F8F8;">,</span> scope<span style="color: #F8F8F8;">:</span>this<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;name<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"dsRow"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;args<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span>data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">[</span>colType<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;scope<span style="color: #F8F8F8;">:</span>this<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"TR"</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>table<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>dsRow()</code> macro to display a row of the dataset table:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> dsRow<span style="color: #F8F8F8;">(</span>cols<span style="color: #F8F8F8;">,</span> itm<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> item<span style="color: #F8F8F8;">=</span>itm.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> cellItm<span style="color: #F8F8F8;">=</span>null<span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> cls<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"cell"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> item.<span style="color: #F8F8F8;">editMode</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">set</span> cls<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"selected"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> col <span style="color: #BBBEFF">in</span> cols<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">set</span> cellItm<span style="color: #F8F8F8;">=</span>item<span style="color: #F8F8F8;">[</span>col.<span style="color: #F8F8F8;">colId</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls}"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> item.<span style="color: #F8F8F8;">editMode</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:TextField</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; autoselect<span style="color: #F8F8F8;">:</span>true<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width<span style="color: #F8F8F8;">:</span> col.<span style="color: #F8F8F8;">width</span><span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">2</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; bind<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; value<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"editValue"</span><span style="color: #F8F8F8;">,</span>inside<span style="color: #F8F8F8;">:</span>cellItm<span style="color: #F8F8F8;">}</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$<span style="color: #F8F8F8;">{</span>cellItm.<span style="color: #F8F8F8;">value</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									To switch the cell from read only state to editable state it is used the partial refresh, this means that when the user clicks to change the cell's value and when the user saves the change only the cell clicked is refresh instead of all the widgets or all the page.
									
									<h4>Step 5</h4>	
									<p>Create a file and call it <i><b>MainScript.js</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/spreadsheet/view/</code>).</p>
									
									<h4>Step 6</h4>
									Define the classpath and the constructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">tplScriptDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.spreadsheet.view.MainScript'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
<br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>onModuleEvent</code> to refresh the dataset table:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">onModuleEvent<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; return<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>evt.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"methodCallBack"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span>alert<span style="color: #F8F8F8;">(</span><span style="color: #FF3A83;">123</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>evt.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"methodCallEnd"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>evt.<span style="color: #F8F8F8;">method</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"xloadDataset"</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">||</span> evt.<span style="color: #F8F8F8;">method</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"createNewDataset"</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">||</span> evt.<span style="color: #F8F8F8;">method</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"copyDataset"</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">||</span> evt.<span style="color: #F8F8F8;">method</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"selectDataset"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.$refresh<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about the onModuleEvent take a look at <a href="/usermanual/latest/template_scripts#reacting-to-module-and-flow-events">this page</a>.</p>
									Define the <code>onScroll()</code> function to manage the vertical and horizontal scroll inside the dataset table:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp;<span style="color: #FFFF80">/**<br>
&nbsp; * Event Handler called when a scrollbar is used<br>
&nbsp; * Will change the content scroll and synchronize all scrollbars<br>
&nbsp; */</span><br>
&nbsp; onScroll<span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">,</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"vscroll"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// vertical scroll</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> vs<span style="color: #F8F8F8;">=</span>this.$getElementById<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"vscroll"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>vs<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> sTop<span style="color: #F8F8F8;">=</span>vs.<span style="color: #F8F8F8;">getScroll</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span>.<span style="color: #F8F8F8;">scrollTop</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; vs.$dispose<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> arr<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"dataCont_fixedColumns_data"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"dataCont_scrollableColumns_data"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span>sid <span style="color: #BBBEFF">in</span> arr<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; div<span style="color: #F8F8F8;">=</span>this.$getElementById<span style="color: #F8F8F8;">(</span>arr<span style="color: #F8F8F8;">[</span>sid<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>div<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; div.<span style="color: #F8F8F8;">setScroll</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span>scrollTop<span style="color: #F8F8F8;">:</span>sTop<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; div.$dispose<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span> <span style="color: #BBBEFF">else</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// horizontal scroll</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> hIdA<span style="color: #F8F8F8;">=</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">,</span> hIdB<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"hscroll1"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">?</span> <span style="color: #80FF00;">"hscroll2"</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"hscroll1"</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> hA<span style="color: #F8F8F8;">=</span>this.$getElementById<span style="color: #F8F8F8;">(</span>hIdA<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">,</span> div<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>hA<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> sLeft<span style="color: #F8F8F8;">=</span>hA.<span style="color: #F8F8F8;">getScroll</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span>.<span style="color: #F8F8F8;">scrollLeft</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; hA.$dispose<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> arr<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"dataCont_scrollableColumns_data"</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"dataCont_scrollableColumns_filter"</span><span style="color: #F8F8F8;">,</span>hIdB<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span>sid <span style="color: #BBBEFF">in</span> arr<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; div<span style="color: #F8F8F8;">=</span>this.$getElementById<span style="color: #F8F8F8;">(</span>arr<span style="color: #F8F8F8;">[</span>sid<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>div<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; div.<span style="color: #F8F8F8;">setScroll</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span>scrollLeft<span style="color: #F8F8F8;">:</span>sLeft<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; div.$dispose<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>onDsDataCellClick()</code> function used when a data cell is clicked to allow the user to edit the cell content:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* Event Handler called when a data cell is clicked<br>
&nbsp;*/</span><br>
&nbsp;onDsDataCellClick<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">=</span>evt.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">getExpando</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"id"</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"TABLE"</span><span style="color: #F8F8F8;">)</span> return<span style="color: #F8F8F8;">;</span> <span style="color: #666666">// event did not hapen in a cell</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> colId<span style="color: #F8F8F8;">=</span>evt.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">getExpando</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"colId"</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">editCell</span><span style="color: #F8F8F8;">(</span>parseInt<span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">,</span><span style="color: #FF3A83;">10</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">,</span>colId<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp;<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>getRowBindRefresh()</code> function to return the bindRefreshTo for each data table row section and the <code>selectDataset()</code> function to call the controller method to select a different dataset:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Return the bindRefreshTo value for each data table row section<br>
&nbsp; * @param {Object} itm the item passed as argument of each Repeater childSection callback<br>
&nbsp; * cf. Repeater documentation<br>
&nbsp; */</span><br>
&nbsp; getRowBindRefresh<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> item<span style="color: #F8F8F8;">=</span>itm.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; return <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>item<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
<br>
<span style="color: #FFFF80">/**<br>
&nbsp; * Event Handler called when a link/tab is clicked to change the current dataset<br>
&nbsp; * @param {Integer} idx the dataset index that should become the current one<br>
&nbsp; */</span><br>
&nbsp; selectDataset<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">,</span>idx<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">selectDataset</span><span style="color: #F8F8F8;">(</span>idx<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									
									<h4>Step 7</h4>
									<p>Create a file and call it <i><b>ControllerInterface.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/spreadsheet/</code>).</p>
									
									<h4>Step 8</h4>
									Define the classpath, which class the controller interface extends, that is always <code>aria.templates.IModuleCtrl</code> and write the signature of all the methods of your controller:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">interfaceDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.spreadsheet.ControllerInterface'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.IModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $interface <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; createNewDataset <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; copyDataset <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; loadDataset <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">,</span>$callbackParam<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; editCell <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; selectDataset <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; saveChanges <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; cancelChanges <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span></div></div></div>
									
									<h4>Step 9</h4>	
									<p>Create a file and call it <i><b>Controller.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/spreadsheet/</code>).</p>
									
									<h4>Step 10</h4>	
									Define the classpath, which class the controller extends, that is always <code>aria.templates.ModuleCtrl</code>, which controller interface implements, in our case <code>ariadoc.guides.spreadsheet.ControllerInterface</code> (that's the controller interface defined in the previous step), define the constructor and the destructor. Remember to add the filter to fetch the data from the xml file in order to simulate the server requests:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">classDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.spreadsheet.Controller'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.ModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $implements <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.spreadsheet.ControllerInterface'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.$ModuleCtrl.<span style="color: #F8F8F8;">constructor</span>.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #666666">// add test filter for response mocks</span><br>
&nbsp; &nbsp; aria.<span style="color: #F8F8F8;">core</span>.<span style="color: #F8F8F8;">IOFiltersMgr</span>.<span style="color: #F8F8F8;">addFilter</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">'ariadoc.guides.spreadsheet.mocks.TestMsgHandler'</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this._data <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;currentDs<span style="color: #F8F8F8;">:</span>null<span style="color: #F8F8F8;">,</span> <span style="color: #666666">// current dataset - cf. createNewDataset for the structure</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;datasets<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span> &nbsp; <span style="color: #666666">// list of loaded datasets</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $destructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.$ModuleCtrl.$destructor.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>copyDataset()</code> function to copy an existing dataset:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Copy the current dataset into a new dataset<br>
&nbsp; * and set is as current dataset<br>
&nbsp; */</span><br>
&nbsp; copyDataset<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">!</span>this._data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">)</span> return<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds<span style="color: #F8F8F8;">=</span>this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">copy</span><span style="color: #F8F8F8;">(</span>this._data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #666666">// change name</span><br>
&nbsp; &nbsp; nm<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">name</span>.<span style="color: #F8F8F8;">replace</span><span style="color: #F8F8F8;">(</span><span style="color: #FFFF80">/\(.*\)$/</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">''</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; ds.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">=</span>nm<span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">"("</span><span style="color: #F8F8F8;">+</span>this._data.<span style="color: #F8F8F8;">datasets</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">")"</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #666666">// add dataset to the list and select it</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">add</span><span style="color: #F8F8F8;">(</span>this._data.<span style="color: #F8F8F8;">datasets</span><span style="color: #F8F8F8;">,</span>ds<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"currentDs"</span><span style="color: #F8F8F8;">,</span>ds<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>createNewDataset()</code> function to create a new dataset:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Create a new dataset and add it to the dataset list (but will not be selected by default)<br>
&nbsp; */</span><br>
&nbsp; createNewDataset<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>nm<span style="color: #F8F8F8;">,</span>createData<span style="color: #F8F8F8;">,</span>setAsCurrentDataset<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>typeof<span style="color: #F8F8F8;">(</span>nm<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">!=</span><span style="color: #80FF00;">'string'</span><span style="color: #F8F8F8;">)</span> nm<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"New "</span><span style="color: #F8F8F8;">+</span>this._data.<span style="color: #F8F8F8;">datasets</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>typeof<span style="color: #F8F8F8;">(</span>createData<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">!=</span><span style="color: #80FF00;">'boolean'</span><span style="color: #F8F8F8;">)</span> createData<span style="color: #F8F8F8;">=</span>true<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>typeof<span style="color: #F8F8F8;">(</span>setAsCurrentDataset<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">!=</span><span style="color: #80FF00;">'boolean'</span><span style="color: #F8F8F8;">)</span> setAsCurrentDataset<span style="color: #F8F8F8;">=</span>true<span style="color: #F8F8F8;">;</span><br>
<br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; name<span style="color: #F8F8F8;">:</span>nm<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; fixedColumns<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; scrollableColumns<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; items<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">add</span><span style="color: #F8F8F8;">(</span>this._data.<span style="color: #F8F8F8;">datasets</span><span style="color: #F8F8F8;">,</span>ds<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>createData<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// create Columns</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> nbrOfColumns<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">20</span><span style="color: #F8F8F8;">,</span> nbrOfFixedColumns<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">3</span><span style="color: #F8F8F8;">,</span> nbrOfLines<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">100</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> colIds<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span> d<span style="color: #F8F8F8;">,</span> colId<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span>nbrOfColumns<span style="color: #F8F8F8;">&gt;</span>i<span style="color: #F8F8F8;">;</span>i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; colId<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"c"</span><span style="color: #F8F8F8;">+</span>i<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; colIds.<span style="color: #F8F8F8;">push</span><span style="color: #F8F8F8;">(</span>colId<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; d<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; colId<span style="color: #F8F8F8;">:</span>colId<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; title<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Col "</span><span style="color: #F8F8F8;">+</span>i<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">90</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>ii<span style="color: #F8F8F8;">;</span>i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; d<span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">{</span>editMode<span style="color: #F8F8F8;">:</span>false<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> j<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> maxJ<span style="color: #F8F8F8;">=</span>colIds.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span>maxJ<span style="color: #F8F8F8;">&gt;</span>j<span style="color: #F8F8F8;">;</span>j<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; d<span style="color: #F8F8F8;">[</span>colIds<span style="color: #F8F8F8;">[</span>j<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span>i<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; value<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">""</span><span style="color: #F8F8F8;">,</span> <span style="color: #666666">//+i+":"+j,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; editMode<span style="color: #F8F8F8;">:</span>false<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; ds.<span style="color: #F8F8F8;">items</span>.<span style="color: #F8F8F8;">push</span><span style="color: #F8F8F8;">(</span>d<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>setAsCurrentDataset<span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"currentDs"</span><span style="color: #F8F8F8;">,</span>ds<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; return ds<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>selectDataset()</code> function to set a dataset as current dataset:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Set a dataset as current dataset - i.e. referenced by 'currentDs'<br>
&nbsp; * in the data model<br>
&nbsp; * @param {Integer} dsIdx the dataset index in the datasets array<br>
&nbsp; */</span><br>
&nbsp; selectDataset <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>dsIdx<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>dsIdx<span style="color: #F8F8F8;">&gt;-</span><span style="color: #FF3A83;">1</span> <span style="color: #F8F8F8;">&amp;&amp;</span> this._data.<span style="color: #F8F8F8;">datasets</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">&gt;</span>dsIdx<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"currentDs"</span><span style="color: #F8F8F8;">,</span>this._data.<span style="color: #F8F8F8;">datasets</span><span style="color: #F8F8F8;">[</span>dsIdx<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>cancelChanges()</code> function to cancel the changes made in the current dataset:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Cancel the changes made in the current dataset<br>
&nbsp; */</span><br>
&nbsp; cancelChanges<span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds<span style="color: #F8F8F8;">=</span>this._data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> cols<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">fixedColumns</span>.<span style="color: #F8F8F8;">concat</span><span style="color: #F8F8F8;">(</span>ds.<span style="color: #F8F8F8;">scrollableColumns</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> items<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">,</span> itm<span style="color: #F8F8F8;">,</span> colId<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> iMax<span style="color: #F8F8F8;">=</span>items.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span>iMax<span style="color: #F8F8F8;">&gt;</span>i<span style="color: #F8F8F8;">;</span>i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; itm<span style="color: #F8F8F8;">=</span>items<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>itm.<span style="color: #F8F8F8;">editMode</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> k <span style="color: #BBBEFF">in</span> cols<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; colId<span style="color: #F8F8F8;">=</span>cols<span style="color: #F8F8F8;">[</span>k<span style="color: #F8F8F8;">]</span>.<span style="color: #F8F8F8;">colId</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">[</span>colId<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span>false<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span>false<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #666666">// TODO submit changes</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>saveChanges()</code> function to save the changes made in the current dataset:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp; * Save the changes made in the current dataset<br>
&nbsp; */</span><br>
&nbsp; saveChanges<span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds<span style="color: #F8F8F8;">=</span>this._data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> cols<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">fixedColumns</span>.<span style="color: #F8F8F8;">concat</span><span style="color: #F8F8F8;">(</span>ds.<span style="color: #F8F8F8;">scrollableColumns</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> items<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">,</span> itm<span style="color: #F8F8F8;">,</span> colId<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> iMax<span style="color: #F8F8F8;">=</span>items.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span>iMax<span style="color: #F8F8F8;">&gt;</span>i<span style="color: #F8F8F8;">;</span>i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; itm<span style="color: #F8F8F8;">=</span>items<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>itm.<span style="color: #F8F8F8;">editMode</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> k <span style="color: #BBBEFF">in</span> cols<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; colId<span style="color: #F8F8F8;">=</span>cols<span style="color: #F8F8F8;">[</span>k<span style="color: #F8F8F8;">]</span>.<span style="color: #F8F8F8;">colId</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">[</span>colId<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span>false<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">[</span>colId<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"value"</span><span style="color: #F8F8F8;">,</span>itm<span style="color: #F8F8F8;">[</span>colId<span style="color: #F8F8F8;">]</span>.<span style="color: #F8F8F8;">editValue</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span>false<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>editCell()</code> function to set a cell and its associated row to editable mode:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp;<span style="color: #FFFF80">/**<br>
&nbsp; &nbsp;* Set a cell and its associated row to editable mode<br>
&nbsp; &nbsp;* @param {Integer} itemId line id<br>
&nbsp; &nbsp;* @param {String} colId column id<br>
&nbsp; &nbsp;*/</span><br>
&nbsp; editCell <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>itemId<span style="color: #F8F8F8;">,</span>colId<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #666666">// set the cell in edit mode</span><br>
&nbsp; &nbsp; <span style="color: #666666">// itemId is not necessarily the index in the array</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds<span style="color: #F8F8F8;">=</span>this._data.<span style="color: #F8F8F8;">currentDs</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> cols<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">fixedColumns</span>.<span style="color: #F8F8F8;">concat</span><span style="color: #F8F8F8;">(</span>ds.<span style="color: #F8F8F8;">scrollableColumns</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> items<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">,</span> itm<span style="color: #F8F8F8;">,</span> tmpId<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> iMax<span style="color: #F8F8F8;">=</span>items.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span>iMax<span style="color: #F8F8F8;">&gt;</span>i<span style="color: #F8F8F8;">;</span>i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; itm<span style="color: #F8F8F8;">=</span>items<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">[</span>colId<span style="color: #F8F8F8;">]</span>.<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">==</span>itemId<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">!</span>itm.<span style="color: #F8F8F8;">editMode</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #666666">// set all editValues (used to not change the value until save is called</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> k <span style="color: #BBBEFF">in</span> cols<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tmpId<span style="color: #F8F8F8;">=</span>cols<span style="color: #F8F8F8;">[</span>k<span style="color: #F8F8F8;">]</span>.<span style="color: #F8F8F8;">colId</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">[</span>tmpId<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">[</span>tmpId<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editValue"</span><span style="color: #F8F8F8;">,</span>itm<span style="color: #F8F8F8;">[</span>tmpId<span style="color: #F8F8F8;">]</span>.<span style="color: #F8F8F8;">value</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #666666">//this.json.setValue(itm[colId],"hasFocus",true);</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"editMode"</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; break<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>loadDataset()</code> function to make a Json request to load a dataset inside the data model and the <code>_loadDataset()</code> function to manage the answer from the server:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp;<span style="color: #FFFF80">/**<br>
&nbsp; &nbsp;* Load a dataset in the data model<br>
&nbsp; &nbsp;*/</span><br>
&nbsp; &nbsp;loadDataset <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>ref<span style="color: #F8F8F8;">,</span>cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">var</span> requestData <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span>datasetRef<span style="color: #F8F8F8;">:</span>ref<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">submitJsonRequest</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"getDataset"</span><span style="color: #F8F8F8;">,</span> requestData<span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;fn <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"_loadDataset"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;scope <span style="color: #F8F8F8;">:</span> this<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;args <span style="color: #F8F8F8;">:</span> cb<br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
<br>
&nbsp;<span style="color: #FFFF80">/**<br>
&nbsp; &nbsp;* loadDataset callback - called when server response is received<br>
&nbsp; &nbsp;*/</span><br>
&nbsp; &nbsp;_loadDataset<span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>res<span style="color: #F8F8F8;">,</span> args<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> cb<span style="color: #F8F8F8;">=</span>args<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>res.<span style="color: #F8F8F8;">error</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; return<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> ds <span style="color: #F8F8F8;">=</span> res.<span style="color: #F8F8F8;">response</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// modify the cell values to use a structure instead of a string</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">var</span> item<span style="color: #F8F8F8;">,</span> tmp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> iMax<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">items</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span>iMax<span style="color: #F8F8F8;">&gt;</span>i<span style="color: #F8F8F8;">;</span>i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; item<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> k <span style="color: #BBBEFF">in</span> item<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>k<span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"id"</span><span style="color: #F8F8F8;">)</span> continue<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tmp<span style="color: #F8F8F8;">=</span>item<span style="color: #F8F8F8;">[</span>k<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; item<span style="color: #F8F8F8;">[</span>k<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span>i<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; value<span style="color: #F8F8F8;">:</span>tmp<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #666666">// add dataset to the list and select it</span><br>
&nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">add</span><span style="color: #F8F8F8;">(</span>this._data.<span style="color: #F8F8F8;">datasets</span><span style="color: #F8F8F8;">,</span>ds<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"currentDs"</span><span style="color: #F8F8F8;">,</span>ds<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									
									<h4>Step 11</h4>	
									<p>Create a file and call it <i><b>MainStyle.tpl.css</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/spreadsheet/view/</code>).</p>
									
									<h4>Step 12</h4>	
									<p>Give some style to your todo app.</p>
									
									<h4>Step 13</h4>	
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
								</div>
							</div>
						</article>
						<aside class="column sidebar">
							<div class="tryit">
								<a class="runguide button blue" href="/ariadoc/guides/spreadsheet/" target="_blank">See how it works</a>
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