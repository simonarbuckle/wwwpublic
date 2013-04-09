<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Airport Map Guide" ?>
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
								<h1>Airport Map</h1>
								<div class="intro">									
									<p>In this guide you will learn how to create an iteractive airport map, showing airplanes parked and airplanes taking off.</p>
									<p></p>									
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Use a third part library with aria templates.</li>
										<li>Use filters to simulate a server to fecth data from an external xml file.</li>
										<li>Use the submitJsonRequest to request data.</li>
										<li>Use the aria templates asynch paradigm.</li>
										<li>Use $viewReady statement.</li>
										<li>Use the onModuleEvent method.</li>
										<li>Add and use listeners.</li>
									</ul>									
								</div>
								<div class="content">
									<h3>Tutorial</h3>	
									
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/airportmap/</code>).</p>
									
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
&nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">'ariadoc.guides.airportmap.view.Main'</span><span style="color: #F8F8F8">,</span><br>
&nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"root"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; moduleCtrl<span style="color: #F8F8F8">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; classpath <span style="color: #F8F8F8">:</span> <span style="color: #80FF00;">"ariadoc.guides.airportmap.Controller"</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									To use the external library you have to import it inside the index.html after the framework scripts:
									<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"./lib/raphael-min.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span></div></div></div>
									
									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Main.tpl</b></i>. This is the template that will be used to display the airport map.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/airportmap/view/</code>).</p>
									
									<h4>Step 4</h4>
									Define the classpath of your template and declare that it has a script and a CSS template:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'ariadoc.guides.airportmap.view.Main'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span> true<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$css</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.airportmap.view.MainStyle'</span><span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>macro main()</code> to display the links to interact with the airport map and to define the map canvas:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> main<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"toplinks"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>a <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> click <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"showMap"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span>Show Map<span style="color: #F8F8F8;">&lt;/</span>a<span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;|&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>a <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> click <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"zoom"</span><span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">0.5</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span>Zoom<span style="color: #F8F8F8;">+&lt;/</span>a<span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;|&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>a <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> click <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"zoom"</span><span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">:-</span><span style="color: #FF3A83;">0.5</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span>Zoom<span style="color: #F8F8F8;">-&lt;/</span>a<span style="color: #F8F8F8;">&gt;&amp;</span>nbsp<span style="color: #F8F8F8;">;|&amp;</span>nbsp<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>a <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> click <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"zoom"</span><span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span>Zoom <span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">&lt;/</span>a<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;</span>div style<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"position:relative"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"mapcanvas"</span> style<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"position:absolute;top:0px;left:0px"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"hourcanvas"</span> &nbsp;style<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"position:absolute;top:5px;left:995px"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>

									<h4>Step 5</h4>	
									<p>Create a file and call it <i><b>MainScript.js</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/airportmap/view/</code>).</p>
									
									<h4>Step 6</h4>
									Define the classpath, the dependencies and the constructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">tplScriptDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.airportmap.view.MainScript'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$dependencies</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #80FF00;">'ariadoc.guides.airportmap.view.svg.MapCanvas'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #80FF00;">'ariadoc.guides.airportmap.view.svg.HourCanvas'</span><br>
&nbsp; <span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">paper</span><span style="color: #F8F8F8;">=</span>null<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">uiData</span><span style="color: #F8F8F8;">=</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; W<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">1000</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; H<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">750</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>

									Call, inside the <code>$viewReady</code>, the module controller method to load the initial data and the module controller zoom method inside the zoom function:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">$viewReady<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #666666">// get the initial data</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">loadData</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><br>
<br>
zoom<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">,</span>factor<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">zoom</span><span style="color: #F8F8F8;">(</span>factor<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>

									Call, inside the <code>onModuleEvent</code>, the map refresh to react to the event raised by the module controller:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">onModuleEvent<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">(</span>evt.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"methodCallback"</span> <span style="color: #F8F8F8;">||</span> evt.<span style="color: #F8F8F8;">name</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"methodCallEnd"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">&amp;&amp;</span> evt.<span style="color: #F8F8F8;">method</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"updateData"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">mapCanvas</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">mapCanvas</span>.<span style="color: #F8F8F8;">refreshDisplay</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about the onModuleEvent take a look at <a href="/usermanual/Template_Scripts#Reacting_to_module_and_flow_events">this page</a>.</p>
									Display the map:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">showMap<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>evt<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">initialized</span><span style="color: #F8F8F8;">)</span> return<span style="color: #F8F8F8;">;</span> <span style="color: #666666">// otherwise we will create 2 papers (!)</span><br>
&nbsp; this.<span style="color: #F8F8F8;">initialized</span><span style="color: #F8F8F8;">=</span>true<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> pkg<span style="color: #F8F8F8;">=</span>ariadoc.<span style="color: #F8F8F8;">guides</span>.<span style="color: #F8F8F8;">airportmap</span>.<span style="color: #F8F8F8;">view</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.<span style="color: #F8F8F8;">mapCanvas</span> <span style="color: #F8F8F8;">=</span> new pkg.<span style="color: #F8F8F8;">svg</span>.<span style="color: #F8F8F8;">MapCanvas</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span><span style="color: #F8F8F8;">{</span>containerId<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"mapcanvas"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.<span style="color: #F8F8F8;">hourCanvas</span> <span style="color: #F8F8F8;">=</span> new pkg.<span style="color: #F8F8F8;">svg</span>.<span style="color: #F8F8F8;">HourCanvas</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span><span style="color: #F8F8F8;">{</span>containerId<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"hourcanvas"</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.<span style="color: #F8F8F8;">paper</span><span style="color: #F8F8F8;">=</span>this.<span style="color: #F8F8F8;">mapCanvas</span>.<span style="color: #F8F8F8;">createMap</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.<span style="color: #F8F8F8;">hourCanvas</span>.<span style="color: #F8F8F8;">display</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Inside the svg folder (<code>/guides/airportmap/view/svg</code>) you can find the classes that create an abstract layer to wrap the third part library code to be used with aria templates to display the airport map.<br/>
									Inside this folder you will find:
									<ul>
										<li>the <code>FlightsLayer.js</code> that it is used to draw the aircrafts;</li>
										<li>the <code>HourCanvas.js</code> that it is used to display the timer;</li>
										<li>the <code>MapCanvas.js</code> that it is used to display the airport;</li>
										<li>the <code>LayerMgr.js</code> that it is used to manage the different layers;</li>
									</ul>
									Those classes will not be described inside this guide, but feel free to read the code.
									
									<h4>Step 7</h4>
									<p>Create a file and call it <i><b>ControllerInterface.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/airportmap/</code>).</p>
									
									<h4>Step 8</h4>
									Define the classpath, which class the controller interface extends, that is always <code>aria.templates.IModuleCtrl</code> and write the signature of all the methods of your controller:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">interfaceDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.airportmap.ControllerInterface'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.IModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $interface <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;loadData <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">,</span>$callbackParam<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;updateData <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">,</span>$callbackParam<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;zoom<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>$type <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"Function"</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span></div></div></div>
									
									<h4>Step 9</h4>	
									<p>Create a file and call it <i><b>Controller.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/airportmap/</code>).</p>
									
									<h4>Step 10</h4>	
									Define the classpath, which class the controller extends, that is always <code>aria.templates.ModuleCtrl</code>, which controller interface implements, in our case <code>ariadoc.guides.airportmap.ControllerInterface</code> (that's the controller interface defined in the previous step), define the constructor and the destructor. Remember to add the filter to fetch the data from the xml file in order to simulate the server requests:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">classDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$classpath</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'ariadoc.guides.airportmap.Controller'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$extends</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">'aria.templates.ModuleCtrl'</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;$implements <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'ariadoc.guides.airportmap.ControllerInterface'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$dependencies</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">'aria.core.Timer'</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;$constructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; this.$ModuleCtrl.<span style="color: #F8F8F8;">constructor</span>.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<br>
&nbsp; &nbsp; <span style="color: #666666">// add test filter for response mocks</span><br>
&nbsp; &nbsp; aria.<span style="color: #F8F8F8;">core</span>.<span style="color: #F8F8F8;">IOFiltersMgr</span>.<span style="color: #F8F8F8;">addFilter</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">'ariadoc.guides.airportmap.mocks.TestMsgHandler'</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <br>
&nbsp; &nbsp; this._data <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;pollTimeout<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">500</span><span style="color: #F8F8F8;">,</span><span style="color: #666666">// by default new data will be requested every 500ms</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;viewPort<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; hDim<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">1129</span><span style="color: #F8F8F8;">,</span> &nbsp; &nbsp;<span style="color: #666666">// horizontal dimension</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; vDim<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">726</span><span style="color: #F8F8F8;">,</span> &nbsp; &nbsp; <span style="color: #666666">// vertical dimension</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; zoom<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> &nbsp; &nbsp; &nbsp; <span style="color: #666666">// zoom level - cannot be 1</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; vPosition<span style="color: #F8F8F8;">:</span><span style="color: #FF3A83;">0</span> &nbsp; <span style="color: #666666">// vertical position of the viewport when zoom&gt;1</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;layers<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;$destructor <span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;this.$ModuleCtrl.$destructor.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the method to make a Json request to fetch the data:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* Retrieve the data to be displayed on the map<br>
&nbsp;* @param {Callback} cb<br>
&nbsp;*/</span><br>
&nbsp;loadData<span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> requestData <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">submitJsonRequest</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"getData"</span><span style="color: #F8F8F8;">,</span> requestData<span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;fn <span style="color: #F8F8F8;">:</span> this._loadData<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;scope <span style="color: #F8F8F8;">:</span> this<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;args <span style="color: #F8F8F8;">:</span> cb<br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									When the response is received load the mechanism to poll the data automatically: 
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* loadData internal callback - called when the server response is received<br>
&nbsp;* @param {} res the submitJsonRequest return value<br>
&nbsp;* @param {Callback} args<br>
&nbsp;*/</span><br>
&nbsp;_loadData<span style="color: #F8F8F8;">:</span>function <span style="color: #F8F8F8;">(</span>res<span style="color: #F8F8F8;">,</span> cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>res.<span style="color: #F8F8F8;">error</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;return<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> ds <span style="color: #F8F8F8;">=</span> res.<span style="color: #F8F8F8;">response</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #666666">// add dataset to the list and select it</span><br>
&nbsp; this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"layers"</span><span style="color: #F8F8F8;">,</span> ds.<span style="color: #F8F8F8;">layers</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this._queueDataUpdate<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Queue update requests:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* queue a request to updateData<br>
&nbsp;*/</span><br>
&nbsp;_queueDataUpdate<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #666666">// trigger polling</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> interfaceWrapper<span style="color: #F8F8F8;">=</span>this.$interface<span style="color: #F8F8F8;">(</span>this.$publicInterfaceName<span style="color: #F8F8F8;">)</span><br>
&nbsp; &nbsp;aria.<span style="color: #F8F8F8;">core</span>.<span style="color: #F8F8F8;">Timer</span>.<span style="color: #F8F8F8;">addCallback</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;fn<span style="color: #F8F8F8;">:</span>interfaceWrapper.<span style="color: #F8F8F8;">updateData</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;scope<span style="color: #F8F8F8;">:</span>interfaceWrapper<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;delay<span style="color: #F8F8F8;">:</span>this._data.<span style="color: #F8F8F8;">pollTimeout</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									and generate request to get updated data:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* Sends a request to get updated data<br>
&nbsp;* This request is automatically polled once loadData has been called<br>
&nbsp;*/</span><br>
&nbsp;updateData<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #666666">// send the request</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> timeStamp<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">123456789</span><span style="color: #F8F8F8;">;</span> <span style="color: #666666">// TODO use timestamp received with last data update</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> requestArgs <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span>since<span style="color: #F8F8F8;">:</span>timeStamp<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; this.<span style="color: #F8F8F8;">submitJsonRequest</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"getDataUpdates"</span><span style="color: #F8F8F8;">,</span> requestArgs<span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; fn <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"_updateDataResponse"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; scope <span style="color: #F8F8F8;">:</span> this<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; args <span style="color: #F8F8F8;">:</span> cb<br>
&nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									and manage the response updating the data for each layer:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">_updateDataResponse<span style="color: #F8F8F8;">:</span>function<span style="color: #F8F8F8;">(</span>res<span style="color: #F8F8F8;">,</span>args<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> cb<span style="color: #F8F8F8;">=</span>args<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>res.<span style="color: #F8F8F8;">error</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.$callback<span style="color: #F8F8F8;">(</span>cb<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; return<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #BBBEFF">var</span> ds <span style="color: #F8F8F8;">=</span> res.<span style="color: #F8F8F8;">response</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #666666">// go through each layer and update the data model with the response data</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>ds.<span style="color: #F8F8F8;">layers</span> <span style="color: #F8F8F8;">&amp;&amp;</span> ds.<span style="color: #F8F8F8;">layers</span>.<span style="color: #F8F8F8;">flights</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">!</span>this._data.<span style="color: #F8F8F8;">layers</span><span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"layers"</span><span style="color: #F8F8F8;">,</span><span style="color: #F8F8F8;">{</span>flights<span style="color: #F8F8F8;">:</span><span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">else</span> <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">!</span>this._data.<span style="color: #F8F8F8;">layers</span>.<span style="color: #F8F8F8;">flights</span><span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data.<span style="color: #F8F8F8;">layers</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"flights"</span><span style="color: #F8F8F8;">,</span><span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> flights<span style="color: #F8F8F8;">=</span>this._data.<span style="color: #F8F8F8;">layers</span>.<span style="color: #F8F8F8;">flights</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> newItems<span style="color: #F8F8F8;">=</span>ds.<span style="color: #F8F8F8;">layers</span>.<span style="color: #F8F8F8;">flights</span>.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">,</span> newItem<span style="color: #F8F8F8;">,</span> item<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> key <span style="color: #BBBEFF">in</span> newItems<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;newItem<span style="color: #F8F8F8;">=</span>newItems<span style="color: #F8F8F8;">[</span>key<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;item<span style="color: #F8F8F8;">=</span>flights.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">[</span>key<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">!</span>item<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #666666">// new flight</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>flights.<span style="color: #F8F8F8;">items</span><span style="color: #F8F8F8;">,</span>key<span style="color: #F8F8F8;">,</span>newItem<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span> <span style="color: #BBBEFF">else</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #666666">// new postions</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>newItem.<span style="color: #F8F8F8;">positions</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #666666">// append new positions to the position list</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> p<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> max<span style="color: #F8F8F8;">=</span>newItem.<span style="color: #F8F8F8;">positions</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span>max<span style="color: #F8F8F8;">&gt;</span>p<span style="color: #F8F8F8;">;</span>p<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">add</span><span style="color: #F8F8F8;">(</span>item.<span style="color: #F8F8F8;">positions</span><span style="color: #F8F8F8;">,</span>newItem.<span style="color: #F8F8F8;">positions</span><span style="color: #F8F8F8;">[</span>p<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">)</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #666666">// splice if more than 20 positions</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">var</span> maxsz<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">20</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>item.<span style="color: #F8F8F8;">positions</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">&gt;</span>maxsz<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">splice</span><span style="color: #F8F8F8;">(</span>item.<span style="color: #F8F8F8;">positions</span><span style="color: #F8F8F8;">,</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span>item.<span style="color: #F8F8F8;">positions</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">-</span>maxsz<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><br>
&nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp;<span style="color: #666666">// TODO don't forget mechanism to flush un-used data - e.g. when a plane has taken-off</span><br>
&nbsp;this._queueDataUpdate<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the zoom function:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp;<span style="color: #FFFF80">/**<br>
&nbsp; * Update the zoom factor<br>
&nbsp; * Note: the call will be ignored if the increment results in a zoom which is less than 1<br>
&nbsp; * @param {int} increment the update factor - can be positive or negative, if 0 the zoom will be reset<br>
&nbsp; */</span><br>
&nbsp; zoom<span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span>increment<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> zoom2<span style="color: #F8F8F8;">=</span>this._data.<span style="color: #F8F8F8;">viewPort</span>.<span style="color: #F8F8F8;">zoom</span><span style="color: #F8F8F8;">+</span>increment<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>increment<span style="color: #F8F8F8;">==</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span> zoom2<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">1</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>zoom2<span style="color: #F8F8F8;">&gt;=</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this._data.<span style="color: #F8F8F8;">viewPort</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"zoom"</span><span style="color: #F8F8F8;">,</span>zoom2<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>

									<h4>Step 11</h4>	
									<p>Create a file and call it <i><b>MainStyle.tpl.css</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/airportmap/view/</code>).</p>
									
									<h4>Step 12</h4>	
									<p>Give some style to your todo app.</p>
									
									<h4>Step 13</h4>	
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
								</div>
							</div>
						</article>
						<aside class="column sidebar">
							<div class="tryit">
								<a class="runguide button blue" href="/ariadoc/guides/airportmap/" target="_blank">See how it works</a>
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