<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Drench Game Guide" ?>
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
								<h1>Drench Game</h1>
								<div class="intro">									
									<p>In this guide you will learn how to develop a funny game: Drench. The goal is to clear the board with the lowest possible number of moves, using the different colors.</p>
									<p></p>									
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Use sections bound to the data model.</li>
										<li>Use $dataReady statement.</li>
										<li>Use the aria templates DOM event.</li>										
										<li>Use foreach statement.</li>
									</ul>									
								</div>
								<div class="content">
									<h3>Tutorial</h3>	
									
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/drench/</code>).</p>
									
									<h4>Step 2</h4>
									Inside <code>index.html</code> you will have to load the aria templates framework, define the container div and load the template that you will create. 
									<p>To load the framework: </p>
									<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"/aria/ariatemplates-1.2.0.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span><br>
<span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">script</span> <span style="color: #00FF40;">type</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"text/javascript"</span> <span style="color: #00FF40;">src</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"/aria/css/atskin-1.2.0.js"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">script</span>&gt;</span></div></div></div>
									<p>To define the div container:</p>
											<div class="wp_syntax"><div class="code"><div class="html5" style="font-family:monospace;"><span style="color: #37A3ED">&lt;<span style="color: #37A3ED;">div</span> <span style="color: #00FF40;">id</span><span style="color: #37A3ED;">=</span><span style="color: #80FF80;">"output"</span>&gt;&lt;<span style="color: #37A3ED;">/</span><span style="color: #37A3ED;">div</span>&gt;</span></div></div></div>
									To load the template:
											<div class="wp_syntax"><div class="code"><div class="javascript" style="font-family:monospace;"><span style="color: #F8F8F8">&lt;</span>script type<span style="color: #F8F8F8">=</span><span style="color: #80FF00;">"text/javascript"</span><span style="color: #F8F8F8">&gt;</span><br>
Aria.<span style="color: #F8F8F8;">loadTemplate</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">'ariadoc.guides.drench.view.Main'</span><span style="color: #F8F8F8">,</span><br>
&nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"output"</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									
									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Main.tpl</b></i>. This is the template that will be used to display the Drench user interface.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/drench/view/</code>).</p>
									
									<h4>Step 4</h4>
									Define the classpath of your template and that it has a script.
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"ariadoc.guides.drench.view.Main"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; <span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span> true<br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define inside the main macro the div to display the level counter and the timer, using two different sections bound to the data model:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">&lt;</span>h1<span style="color: #F8F8F8;">&gt;</span>Clean the board<span style="color: #F8F8F8;">!&lt;/</span>h1<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"timer"</span><span style="color: #F8F8F8;">&gt;</span>Level<br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>strong<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"level"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"span"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"level"</span><span style="color: #F8F8F8;">,</span>inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$<span style="color: #F8F8F8;">{</span>data.<span style="color: #F8F8F8;">level</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>strong<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>span style<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"float:right"</span><span style="color: #F8F8F8;">&gt;</span>Time<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>strong<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"timer"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"span"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"timer"</span><span style="color: #F8F8F8;">,</span>inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"00"</span><span style="color: #F8F8F8;">+</span>data.<span style="color: #F8F8F8;">timer</span><span style="color: #F8F8F8;">)</span>.<span style="color: #F8F8F8;">slice</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">3</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>strong<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span></div></div></div>
									Define the div to dispaly the board with a section bound to the data model and with two foreach to cover the image with different colors:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">&lt;</span>div <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> click <span style="color: #80FF00;">"startGame"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"board"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"div"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"moves"</span><span style="color: #F8F8F8;">,</span>inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; attributes<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span>style<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"width:"</span><span style="color: #F8F8F8;">+</span>BOARDSIZE<span style="color: #F8F8F8;">*</span><span style="color: #FF3A83;">25</span><span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">"px"</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> line <span style="color: #BBBEFF">inArray</span> data.<span style="color: #F8F8F8;">board</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"line"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">foreach</span> cell <span style="color: #BBBEFF">inArray</span> line<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>span data<span style="color: #F8F8F8;">-</span>x<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${cell_index}"</span> data<span style="color: #F8F8F8;">-</span>y<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"${line_index}"</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> cell<span style="color: #F8F8F8;">==-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">}</span>class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"fade"</span><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span>style<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"background:${COLORS[cell]}"</span><span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">foreach</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span></div></div></div>
									Define the section to display:
										<ul>
											<li>the initial message to start the game;</li>
											<li>the message if the user wins/fails with the Next Level/Restart button;</li>
											<li>the clickable colors to play;</li>
										</ul>
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"banner"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"div"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"moves"</span><span style="color: #F8F8F8;">,</span>inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">]</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">!</span>data.<span style="color: #F8F8F8;">gameStarted</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"msg"</span><span style="color: #F8F8F8;">&gt;</span>You have <span style="color: #F8F8F8;">&lt;</span>span<span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>data.<span style="color: #F8F8F8;">moves</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span> moves to clean the board.<span style="color: #F8F8F8;">&lt;</span>br <span style="color: #F8F8F8;">/&gt;</span>Pick a place to start<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> data.<span style="color: #F8F8F8;">cleaned</span><span style="color: #F8F8F8;">==</span>TOTAL<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"msg"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>win<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"inset"</span><span style="color: #F8F8F8;">&gt;&lt;</span>button type<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"button"</span><span style="color: #F8F8F8;">&gt;</span>Next level<span style="color: #F8F8F8;">&lt;/</span>button<span style="color: #F8F8F8;">&gt;&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">elseif</span> data.<span style="color: #F8F8F8;">moves</span><span style="color: #F8F8F8;">==</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"msg"</span><span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>fail<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"inset"</span><span style="color: #F8F8F8;">&gt;&lt;</span>button type<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"button"</span><span style="color: #F8F8F8;">&gt;</span>Again<span style="color: #F8F8F8;">!</span> Again<span style="color: #F8F8F8;">!&lt;/</span>button<span style="color: #F8F8F8;">&gt;&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"msg"</span><span style="color: #F8F8F8;">&gt;&lt;</span>span<span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>data.<span style="color: #F8F8F8;">moves</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span> $<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">(</span>data.<span style="color: #F8F8F8;">moves</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #FF3A83;">1</span> <span style="color: #F8F8F8;">?</span> <span style="color: #80FF00;">"moves"</span> <span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"move"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span> left<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">for</span> <span style="color: #BBBEFF">var</span> c<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">;</span> c<span style="color: #F8F8F8;">&lt;</span>COLORS.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">;</span> c<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>span class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"color"</span><span style="color: #F8F8F8;">&gt;&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">for</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about sections take a look at <a href="/usermanual/latest/writing_templates#section">this page</a>.</p>
									
									<h4>Step 5</h4>	
									<p>Create a file and call it <i><b>MainScript.js</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/drench/view/</code>).</p>
									
									<h4>Step 6</h4>
									Define the classpath, the statics to declare the different colors and the constructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">tplScriptDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"ariadoc.guides.drench.view.MainScript"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $statics <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; BOARDSIZE<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">14</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; MAXMOVES<span style="color: #F8F8F8;">:</span> <span style="color: #FF3A83;">30</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; COLORS<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"transparent"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"#66CC00"</span><span style="color: #F8F8F8;">,</span> <span style="color: #666666">//green</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"#9999FF"</span><span style="color: #F8F8F8;">,</span> <span style="color: #666666">// blue</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"#743EF4"</span><span style="color: #F8F8F8;">,</span> <span style="color: #666666">// purple</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"#CCFFCC"</span><span style="color: #F8F8F8;">,</span> <span style="color: #666666">// cyan</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"#FF0000"</span><span style="color: #F8F8F8;">,</span> <span style="color: #666666">// red</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #80FF00;">"#FFCC00"</span> &nbsp;<span style="color: #666666">// yellow</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">]</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $constructor <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; this.<span style="color: #F8F8F8;">TOTAL</span><span style="color: #F8F8F8;">=</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">*</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Call the initialization function when the data has been loaded and the module associated to the template has been initialized:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">$dataReady <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">data</span> <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">initGameData</span><span style="color: #F8F8F8;">(</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> <span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
<br>
initGameData <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>lvl<span style="color: #F8F8F8;">,</span> time<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> b <span style="color: #F8F8F8;">=</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">board</span> <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span> i<span style="color: #F8F8F8;">&lt;</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">;</span> i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;b<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span> <span style="color: #F8F8F8;">=</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> j<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span> j<span style="color: #F8F8F8;">&lt;</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">;</span> j<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>j<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">=</span>parseInt<span style="color: #F8F8F8;">(</span>Math.<span style="color: #F8F8F8;">random</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">*</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">COLORS</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">gameStarted</span> <span style="color: #F8F8F8;">=</span> false<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;this.$json.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span> <span style="color: #80FF00;">"level"</span><span style="color: #F8F8F8;">,</span> lvl<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;this.$json.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span> <span style="color: #80FF00;">"moves"</span><span style="color: #F8F8F8;">,</span> this.<span style="color: #F8F8F8;">MAXMOVES</span><span style="color: #F8F8F8;">-</span>lvl<span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>time<span style="color: #F8F8F8;">!=</span>undefined<span style="color: #F8F8F8;">)</span> this.$json.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span> <span style="color: #80FF00;">"timer"</span><span style="color: #F8F8F8;">,</span> time<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">interval</span> <span style="color: #F8F8F8;">=</span> setInterval<span style="color: #F8F8F8;">(</span>function<span style="color: #F8F8F8;">(</span>t<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">{</span>t.$json.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>t.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span><span style="color: #80FF00;">"timer"</span><span style="color: #F8F8F8;">,</span>t.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">timer</span><span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span> <span style="color: #FF3A83;">1000</span><span style="color: #F8F8F8;">,</span> this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To check how to use $dataReady take a look at <a href="/usermanual/latest/template_scripts#intercepting-template-lifecycle-phases">this page</a>.</p>
									Define the <code>startGame()</code> function:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">startGame <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>e<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">gameStarted</span><span style="color: #F8F8F8;">)</span> return<span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>e.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">getData</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"x"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">&amp;&amp;</span> e.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">getData</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"y"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">x</span> <span style="color: #F8F8F8;">=</span> e.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">getData</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"x"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">*</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">y</span> <span style="color: #F8F8F8;">=</span> e.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">getData</span><span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"y"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">*</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">gameStarted</span> <span style="color: #F8F8F8;">=</span> true<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">spread</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">x</span><span style="color: #F8F8F8;">,</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">y</span><span style="color: #F8F8F8;">,</span><br/>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">board</span><span style="color: #F8F8F8;">[</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">y</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">x</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the <code>newGame()</code> function to re-initializate the game or to increase the level:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">newGame <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>e<span style="color: #F8F8F8;">,</span> levelUp<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>levelUp<span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">initGameData</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">level</span><span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">else</span> this.<span style="color: #F8F8F8;">initGameData</span><span style="color: #F8F8F8;">(</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> <span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the functions to manage the spreads on the board when the user clicks a color:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">spread <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>x<span style="color: #F8F8F8;">,</span> y<span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">cleaned</span> <span style="color: #F8F8F8;">=</span> <span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">convert</span><span style="color: #F8F8F8;">(</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">spread2</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">x</span><span style="color: #F8F8F8;">,</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">y</span><span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">convert</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">2</span><span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.$json.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span><span style="color: #F8F8F8;">,</span> <span style="color: #80FF00;">"moves"</span><span style="color: #F8F8F8;">,</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">moves</span><span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>

									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">spread2 <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>x<span style="color: #F8F8F8;">,</span> y<span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">var</span> b <span style="color: #F8F8F8;">=</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">board</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>b<span style="color: #F8F8F8;">[</span>y<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>x<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==</span>c<span style="color: #F8F8F8;">)</span> &nbsp;<span style="color: #F8F8F8;">{</span> b<span style="color: #F8F8F8;">[</span>y<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>x<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">=-</span><span style="color: #FF3A83;">2</span><span style="color: #F8F8F8;">;</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">cleaned</span><span style="color: #F8F8F8;">++;</span> <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">else</span> <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>b<span style="color: #F8F8F8;">[</span>y<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>x<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span> b<span style="color: #F8F8F8;">[</span>y<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>x<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span> &nbsp;this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">cleaned</span><span style="color: #F8F8F8;">++;</span> <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">else</span> return<span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #666666">//top</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>y<span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">&gt;=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">spread2</span><span style="color: #F8F8F8;">(</span>x<span style="color: #F8F8F8;">,</span> y<span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #666666">//right</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>x<span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">&lt;</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">spread2</span><span style="color: #F8F8F8;">(</span>x<span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> y<span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; <span style="color: #666666">//bottom</span><br>
&nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>y<span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span> this.<span style="color: #F8F8F8;">spread2</span><span style="color: #F8F8F8;">(</span>x<span style="color: #F8F8F8;">-</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">,</span> y<span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>

									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">clean <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>e<span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;this.<span style="color: #F8F8F8;">spread</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">x</span><span style="color: #F8F8F8;">,</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">y</span><span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>

									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">convert <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>from<span style="color: #F8F8F8;">,</span> to<span style="color: #F8F8F8;">,</span> c<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">var</span> b <span style="color: #F8F8F8;">=</span> this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">board</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;<span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> i<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span> i<span style="color: #F8F8F8;">&lt;</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">;</span> i<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">for</span> <span style="color: #F8F8F8;">(</span><span style="color: #BBBEFF">var</span> j<span style="color: #F8F8F8;">=</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">;</span> j<span style="color: #F8F8F8;">&lt;</span>this.<span style="color: #F8F8F8;">BOARDSIZE</span><span style="color: #F8F8F8;">;</span> j<span style="color: #F8F8F8;">++</span><span style="color: #F8F8F8;">)</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>b<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>j<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">==</span>from<span style="color: #F8F8F8;">)</span> b<span style="color: #F8F8F8;">[</span>i<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">[</span>j<span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">=</span>to<span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									Define the functions to display the message if the user finish the level or not:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">fail <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;clearInterval<span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">interval</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;return <span style="color: #80FF00;">"You failed miserably at level "</span><span style="color: #F8F8F8;">+</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">level</span><span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">" after "</span><span style="color: #F8F8F8;">+</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">timer</span><span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">"s of struggle."</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
<br>
win <span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;clearInterval<span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">interval</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp;return <span style="color: #80FF00;">"Wooohooo! You cleaned the board in "</span><span style="color: #F8F8F8;">+</span><span style="color: #F8F8F8;">(</span>this.<span style="color: #F8F8F8;">MAXMOVES</span><span style="color: #F8F8F8;">-</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">level</span><span style="color: #F8F8F8;">+</span><span style="color: #FF3A83;">1</span><span style="color: #F8F8F8;">-</span>this.<span style="color: #F8F8F8;">data</span>.<span style="color: #F8F8F8;">moves</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">+</span><span style="color: #80FF00;">" moves! :)"</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									
									<h4>Step 7</h4>	
									<p>Create a file and call it <i><b>global.css</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/drench/view</code>).</p>
									
									<h4>Step 8</h4>	
									<p>Give some style to your todo app.</p>
									
									<h4>Step 9</h4>	
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
								</div>
							</div>
						</article>
						<aside class="column sidebar">
							<div class="tryit">
								<a class="runguide button blue" href="/ariadoc/guides/drench/" target="_blank">See how it works</a>
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