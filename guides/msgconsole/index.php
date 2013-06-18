<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Message Console Guide" ?>
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
								<h1>Message Console</h1>
								<div class="intro">									
									<p>In this guide you will learn how to create a console to display on real time incoming messages.</p>
									<p></p>									
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Use filters to simulate a server to fecth data from an external xml file.</li>
										<li>Use the submitJsonRequest to request data.</li>
										<li>Use the aria templates asynch paradigm.</li>
										<li>Use sections and repeaters.</li>
										<li>Play with the refresh mechanism.</li>
										<li>Use aria templates widgets (@aria:Tooltip, @aria:Text and @aria:Button)</li>
									</ul>									
								</div>
								<div class="content">
									<h3>Tutorial</h3>	
									
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/msgconsole/</code>).</p>
									
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
&nbsp; &nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">'ariadoc.guides.msgconsole.view.Main'</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"root"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; &nbsp; moduleCtrl<span style="color: #F8F8F8">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; classpath <span style="color: #F8F8F8">:</span> <span style="color: #80FF00;">"ariadoc.guides.msgconsole.MsgController"</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									Inside the bootstrap you are defining also the module controller.

									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Main.tpl</b></i>. This is the template that will be used to display the message console.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/msgconsole/view/</code>).</p>
									
									<h4>Step 4</h4>
									Define the classpath of your template and declare that it has a CSS template:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'ariadoc.guides.msgconsole.view.Main'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span> false<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$css</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.msgconsole.view.MainStyle'</span><span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define inside the <code>macro main()</code> the html and the section to manage the start button and the beginning message, than call the <code>pauseBtn()</code> macro:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">&lt;</span>table class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"toppanel"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>tr<span style="color: #F8F8F8;">&gt;&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"topmsg"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"startBtn"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"retrievalStarted"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"nbrOfMsgs"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">!</span>data.<span style="color: #F8F8F8;">retrievalStarted</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"start"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Message Retrieval has not started yet<span style="color: #F8F8F8;">:</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>a<span style="color: #F8F8F8;">&gt;</span>Start Retrieval<span style="color: #F8F8F8;">&lt;/</span>a<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Total messages<span style="color: #F8F8F8;">:</span> $<span style="color: #F8F8F8;">{</span>data.<span style="color: #F8F8F8;">nbrOfMsgs</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>i<span style="color: #F8F8F8;">&gt;</span><span style="color: #F8F8F8;">(</span>Open Firebug to see the message traffic<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">&lt;/</span>i<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> pauseBtn<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;&lt;/</span>tr<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">&lt;/</span>table<span style="color: #F8F8F8;">&gt;</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about sections take a look at <a href="/usermanual/latest/writing_templates#section">this page</a>.</p>
									Define a table with a repeater bound to the data model to display the incoming messages:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"listcontainer"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>table class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"msglist"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span>repeater <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;loopType<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"array"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;content<span style="color: #F8F8F8;">:</span> data.<span style="color: #F8F8F8;">msgs</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"TBODY"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;childSections <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"msgrow"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; name<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"msgRow"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; args<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; scope<span style="color: #F8F8F8;">:</span>this<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"TR"</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>table<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about repeaters take a look at <a href="/usermanual/latest/writing_templates#repeater">this page</a>.</p>
									Define the <code>pauseBtn()</code> macro to display the pause button that allow the users to pause and resume the incoming messages:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> pauseBtn<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"pauseBtn"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"retrievalStarted"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"retrievalPaused"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> data.<span style="color: #F8F8F8;">retrievalStarted</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">!</span>data.<span style="color: #F8F8F8;">retrievalPaused</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:Button</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; label<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Pause"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">80</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; onclick<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"pauseMsgRetrieval"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;scope<span style="color: #F8F8F8;">:</span>moduleCtrl<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:Button</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; label<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"Resume"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">80</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; onclick<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"startMsgRetrieval"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;scope<span style="color: #F8F8F8;">:</span>moduleCtrl<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>msgRow()</code> macro to manage the single lines of the message console, with the <code>@aria:Tooltip</code> widget to add a tooltip and the <code>@aria:Text</code> widget for the message description:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> msgRow<span style="color: #F8F8F8;">(</span>itm<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">set</span> msg<span style="color: #F8F8F8;">=</span>itm.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:Tooltip</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"msgTip"</span><span style="color: #F8F8F8;">+</span>msg.<span style="color: #F8F8F8;">uid</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; width<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">250</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; name<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"msgTooltip"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; args<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span>msg<span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">set</span> cls<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"sev"</span><span style="color: #F8F8F8;">+</span>msg.<span style="color: #F8F8F8;">severity</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} idx"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>msg.<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} prio"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">severity</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} date"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">date</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} cat"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">cat</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} loc"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">location</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} desc"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: red; font-weight: bold;">@aria:Text</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; text<span style="color: #F8F8F8;">:</span> msg.<span style="color: #F8F8F8;">description</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tooltipId<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"msgTip"</span><span style="color: #F8F8F8;">+</span>msg.<span style="color: #F8F8F8;">uid</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">240</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>td class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cls} auth"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">author</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>td<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>msgTooltip()</code> macro to generate the tooltip over the message description:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> msgTooltip<span style="color: #F8F8F8;">(</span>msg<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #666666">// macro generating the tooltip over the message description</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>b<span style="color: #F8F8F8;">&gt;</span>Message Severity<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">&lt;/</span>b<span style="color: #F8F8F8;">&gt;</span> $<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">severity</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;</span>br <span style="color: #F8F8F8;">/&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>b<span style="color: #F8F8F8;">&gt;</span>Message Category<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">&lt;/</span>b<span style="color: #F8F8F8;">&gt;</span> $<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">cat</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;</span>br <span style="color: #F8F8F8;">/&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>b<span style="color: #F8F8F8;">&gt;</span>Location<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">&lt;/</span>b<span style="color: #F8F8F8;">&gt;</span> $<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">location</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;</span>br <span style="color: #F8F8F8;">/&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>b<span style="color: #F8F8F8;">&gt;</span>Description<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">&lt;/</span>b<span style="color: #F8F8F8;">&gt;</span> $<span style="color: #F8F8F8;">{</span>msg.<span style="color: #F8F8F8;">description</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									
									<h4>Step 5</h4>
									<p>Create a file and call it <i><b>MsgControllerInterface.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/msgconsole/</code>).</p>
									
									<h4>Step 6</h4>
									Define the classpath, which class the controller interface extends, that is always <code>aria.templates.IModuleCtrl</code> and write the signature of all the methods of your controller:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp; Aria.<span style="color: #F8F8F8;">interfaceDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.msgconsole.MsgControllerInterface'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.IModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; $interface <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;startMsgRetrieval <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;pauseMsgRetrieval <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span></div></div></div>
									
									<h4>Step 7</h4>	
									<p>Create a file and call it <i><b>MsgController.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/msgconsole/</code>).</p>
									
									<h4>Step 8</h4>	
									Define the classpath, which class the controller extends, that is always <code>aria.templates.ModuleCtrl</code>, which controller interface implements, in our case <code>ariadoc.guides.msgconsole.MsgControllerInterface</code> (that's the controller interface defined in the previous step), define the constructor and the destructor. Remember to add the filter to fetch the data from the xml file in order to simulate the server requests:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">classDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.msgconsole.MsgController'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.ModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $implements <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.msgconsole.MsgControllerInterface'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$dependencies</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'aria.core.Timer'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.$ModuleCtrl.<span style="color: #F8F8F8;">constructor</span>.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #666666">// Test handler to mock responses</span><br>
&nbsp; &nbsp; &nbsp;aria.<span style="color: #F8F8F8;">core</span>.<span style="color: #F8F8F8;">IOFiltersMgr</span>.<span style="color: #F8F8F8;">addFilter</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">'ariadoc.guides.msgconsole.mocks.TestMsgHandler'</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this._count<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span> <span style="color: #666666">// internal counter used to retrieve different data</span><br>
&nbsp; &nbsp; &nbsp;this._msgCount<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this._data <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;retrievalStarted<span style="color: #F8F8F8;">:</span>false<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;retrievalPaused<span style="color: #F8F8F8;">:</span>false<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;lastMsgs<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;msgs <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $destructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.$ModuleCtrl.$destructor.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Define the functions: <code>startMsgRetrieval()</code> and <code>pauseMsgRetrieval()</code> to change the value of <code>this._data</code> when the user clicks on the start/pause button:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">startMsgRetrieval <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"retrievalStarted"</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"retrievalPaused"</span><span style="color: #F8F8F8;">,</span>false<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this._retrieveMsgs<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
pauseMsgRetrieval <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"retrievalPaused"</span><span style="color: #F8F8F8;">,</span>true<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>									
									Than define <code>this._retrieveMsgs()</code> function to make the Json request to fetch the message and the callback to manage the server answer.
									
									<h4>Step 9</h4>	
									<p>Create a file and call it <i><b>MainStyle.tpl.css</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/msgconsole/view/</code>).</p>
									
									<h4>Step 10</h4>	
									<p>Give some style to your todo app.</p>
									
									<h4>Step 11</h4>	
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
								</div>
							</div>
						</article>
						<aside class="column sidebar">
							<div class="tryit">
								<a class="runguide button blue" href="/ariadoc/guides/msgconsole/" target="_blank">See how it works</a>
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