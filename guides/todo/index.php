<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Todo Mvc Guide" ?>
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
								<h1>Todo MVC</h1>
								<div class="intro">									
									<p>In this guide you will learn how to develop a tipical Todo app using aria templates, taking advantage of his strong MVC orientation.</p>
									<p></p>
									
									<p>By referring to this guide, you will be able to:</p>
									<ul>
										<li>Put in practice the MVC pattern with aria templates.</li>
										<li>Use the aria templates DOM events (on keydown, on click, on blur).</li>										
										<li>Use sections with repeater.</li>
										<li>Add and use listeners.</li>
										<li>Play with the refresh mechanism.</li>
									</ul>									
								</div>
								<div class="content">
									<h3>Tutorial</h3>	
									
									<h4>Step 1</h4>
									<p>Create a file using your favourite editor and call it <i><b>index.html</b></i>. This will be the bootstrap for your app.</p>
									<p>Save it inside the root of your project (e.g. <code>/guides/todo/</code>).</p>
									
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
&nbsp; classpath<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">'ariadoc.guides.todo.view.Todo'</span><span style="color: #F8F8F8">,</span><br>
&nbsp; div<span style="color: #F8F8F8">:</span><span style="color: #80FF00;">"output"</span><span style="color: #F8F8F8">,</span><br>
&nbsp; moduleCtrl<span style="color: #F8F8F8">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; classpath <span style="color: #F8F8F8">:</span> <span style="color: #80FF00;">"ariadoc.guides.todo.TodoCtrl"</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8">;</span><br>
<span style="color: #F8F8F8">&lt;/</span>script<span style="color: #F8F8F8">&gt;</span></div></div></div>
									Inside the bootstrap you are defining also the module controller.
									
									<h4>Step 3</h4>
									<p>Create a file and call it <i><b>Todo.tpl</b></i>. This is the template that will be used to display the Todo user interface.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/todo/view/</code>).</p>
									
									<h4>Step 4</h4>
									Define the classpath of your template and that it has a script:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">Template</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"ariadoc.guides.todo.view.Todo"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp;<span style="color: #9FCA78">$hasScript</span><span style="color: #F8F8F8;">:</span> true<br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span></div></div></div>
									Define the html structure of the app with the call to the macro to manage the mark all tasks functionality, the section with a repeater to list the tasks and the call to the macro to manage the number of tasks left and the clear all completed tasks:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> main<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>div<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>h1<span style="color: #F8F8F8;">&gt;</span>Todos<span style="color: #F8F8F8;">&lt;/</span>h1<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> listControl<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"markall"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span>repeater <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"tasklist"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;content<span style="color: #F8F8F8;">:</span> data.<span style="color: #F8F8F8;">tasks</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"ul"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;childSections<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"task"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"taskline"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"li"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>el<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span> return <span style="color: #F8F8F8;">[</span> <span style="color: #F8F8F8;">{</span>inside<span style="color: #F8F8F8;">:</span>el.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">]</span> <span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">call</span> listControl<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"status"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>div<span style="color: #F8F8F8;">&gt;</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info abour repeater take a look at <a href="/usermanual/Writing_Templates#repeater">this page</a>.</p>
									Define the macro to manage the mark all tasks feature, the number of tasks left and the clear all completed tasks using a section with the refresh bound to the tasks inside the data model:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;"><span style="color: #FFFF80">/**<br>
&nbsp;* listControl<br>
&nbsp;* --<br>
&nbsp;* outputs list controls<br>
&nbsp;* if type=markall the Mark All As bar is used<br>
&nbsp;* if type=status &nbsp;the status bar is used<br>
&nbsp;*/</span><br>
&nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> listControl<span style="color: #F8F8F8;">(</span>type<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">section</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #BBBEFF">id</span><span style="color: #F8F8F8;">:</span> type<span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; type<span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"div"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; attributes<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;classList<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"todo-"</span><span style="color: #F8F8F8;">+</span>type<span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">bindRefreshTo</span><span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span> <span style="color: #F8F8F8;">{</span>to<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"tasks"</span><span style="color: #F8F8F8;">,</span> inside<span style="color: #F8F8F8;">:</span>data<span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">]</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>data.<span style="color: #F8F8F8;">tasks</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">&gt;</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> t<span style="color: #F8F8F8;">=</span>this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">tasksLeft</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>type<span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"markall"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>label<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mark all as completed<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>label<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">elseif</span> <span style="color: #F8F8F8;">(</span>type<span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"status"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>strong<span style="color: #F8F8F8;">&gt;</span>$<span style="color: #F8F8F8;">{</span>t<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">&lt;/</span>strong<span style="color: #F8F8F8;">&gt;</span> $<span style="color: #F8F8F8;">{</span>t<span style="color: #F8F8F8;">&gt;</span><span style="color: #FF3A83;">1</span> <span style="color: #F8F8F8;">?</span> <span style="color: #80FF00;">'tasks'</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'task'</span><span style="color: #F8F8F8;">}</span> left.<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">var</span> c<span style="color: #F8F8F8;">=</span>data.<span style="color: #F8F8F8;">tasks</span>.<span style="color: #F8F8F8;">length</span><span style="color: #F8F8F8;">-</span>t<span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>c<span style="color: #F8F8F8;">&gt;</span><span style="color: #FF3A83;">0</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>a class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"todo-clear"</span><span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Clear $<span style="color: #F8F8F8;">{</span>c<span style="color: #F8F8F8;">}</span> completed $<span style="color: #F8F8F8;">{</span>c<span style="color: #F8F8F8;">&gt;</span><span style="color: #FF3A83;">1</span> <span style="color: #F8F8F8;">?</span> <span style="color: #80FF00;">'tasks'</span><span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">'task'</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;/</span>a<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp;<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">section</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about sections take a look at <a href="/usermanual/Writing_Templates#section">this page</a>.</p>
									Define the macro to manage the change of a task, displaying an input text to allow the user to update the task content and the icon to remove a task from the list:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">&nbsp;<span style="color: #FFFF80">/**<br>
&nbsp; * taskLine<br>
&nbsp; * --<br>
&nbsp; * outputs a line in the list of tasks<br>
&nbsp; */</span><br>
&nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">macro</span> taskline<span style="color: #F8F8F8;">(</span>el<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>el.<span style="color: #F8F8F8;">item</span>.<span style="color: #F8F8F8;">edit</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>input type<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"text"</span> class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"editBox"</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">id</span> <span style="color: #80FF00;">"editBox"</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> blur <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"leaveEdit"</span><span style="color: #F8F8F8;">,</span> scope<span style="color: #F8F8F8;">:</span>this<span style="color: #F8F8F8;">,</span> args<span style="color: #F8F8F8;">:</span>el<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">on</span> keydown <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span><span style="color: #80FF00;">"editTask"</span><span style="color: #F8F8F8;">,</span> scope<span style="color: #F8F8F8;">:</span>this<span style="color: #F8F8F8;">,</span> args<span style="color: #F8F8F8;">:</span>el<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">/&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">else</span><span style="color: #F8F8F8;">/</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;</span>span<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>input type<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"checkbox"</span> <span style="color: #F8F8F8;">{</span><span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>el.<span style="color: #F8F8F8;">item</span>.<span style="color: #F8F8F8;">done</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">}</span>checked<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span> <span style="color: #F8F8F8;">/&gt;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$<span style="color: #F8F8F8;">{</span>el.<span style="color: #F8F8F8;">item</span>.<span style="color: #F8F8F8;">desc</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">&lt;</span>a class<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"remove"</span> title<span style="color: #F8F8F8;">=</span><span style="color: #80FF00;">"Remove this task"</span><span style="color: #F8F8F8;">&gt;&lt;/</span>a<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; &nbsp; <span style="color: #F8F8F8;">&lt;/</span>span<span style="color: #F8F8F8;">&gt;</span><br>
&nbsp; &nbsp; <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">if</span><span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">/</span><span style="color: #BBBEFF">macro</span><span style="color: #F8F8F8;">}</span></div></div></div>
									<h4>Step 5</h4>	
									<p>Create a file and call it <i><b>TodoScript.js</b></i>.</p>									
									<p>Save it inside the view folder inside your project (<code>/guides/todo/view/</code>).</p>
									
									<h4>Step 6</h4>
									Define the classpath and the function scripts to manage the DOM events.<br/>
									Basically:
									<ul>
										<li><code>addTask: function(e)</code> calls <code>this.moduleCtrl.addTask(v)</code> inside the module controller;</li>
										<li><code>clearTask: function(e)</code> calls <code>this.moduleCtrl.deleteTask(v)</code> inside the module controller;</li>
										<li><code>markAll: function(e)</code> calls <code>this.moduleCtrl.flagTask(i, checked)</code> inside the module controller for each task;</li>
									</ul><br/>
									The <code>clickTask()</code> function marks a task or allows the user to change the text of the task clicked:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">clickTask<span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>e<span style="color: #F8F8F8;">,</span> el<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #BBBEFF">if</span> <span style="color: #F8F8F8;">(</span>e.<span style="color: #F8F8F8;">target</span>.<span style="color: #F8F8F8;">tagName</span>.<span style="color: #F8F8F8;">toUpperCase</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">==</span><span style="color: #80FF00;">"INPUT"</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">flagTask</span><span style="color: #F8F8F8;">(</span>el.<span style="color: #F8F8F8;">index</span><span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">!</span>el.<span style="color: #F8F8F8;">item</span>.<span style="color: #F8F8F8;">done</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span> <span style="color: #BBBEFF">else</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;aria.<span style="color: #F8F8F8;">utils</span>.<span style="color: #F8F8F8;">Json</span>.<span style="color: #F8F8F8;">inject</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span>edit<span style="color: #F8F8F8;">:</span>true<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span> el.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #666666">// the following is a tiny hack to put focus on the field and cursor at the end</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #BBBEFF">var</span> tf <span style="color: #F8F8F8;">=</span> this.$getElementById<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"editBox"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;tf.<span style="color: #F8F8F8;">focus</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp; &nbsp;tf.<span style="color: #F8F8F8;">setValue</span><span style="color: #F8F8F8;">(</span>el.<span style="color: #F8F8F8;">item</span>.<span style="color: #F8F8F8;">desc</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									The <code>leaveEdit()</code> function calls <code>this.moduleCtrl.updateTask()</code> function inside module controller to stop and resume the refresh to avoid extra refresh when the value changes:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">leaveEdit<span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>e<span style="color: #F8F8F8;">,</span> el<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; <span style="color: #666666">// We use the RefreshManager stop() and resume() to avoid an extra refresh when the value changes</span><br>
&nbsp; &nbsp; aria.<span style="color: #F8F8F8;">templates</span>.<span style="color: #F8F8F8;">RefreshManager</span>.<span style="color: #F8F8F8;">stop</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; this.<span style="color: #F8F8F8;">moduleCtrl</span>.<span style="color: #F8F8F8;">updateTask</span><span style="color: #F8F8F8;">(</span>this.$getElementById<span style="color: #F8F8F8;">(</span><span style="color: #80FF00;">"editBox"</span><span style="color: #F8F8F8;">)</span>.<span style="color: #F8F8F8;">getValue</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">,</span> el.<span style="color: #F8F8F8;">index</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; aria.<span style="color: #F8F8F8;">utils</span>.<span style="color: #F8F8F8;">Json</span>.<span style="color: #F8F8F8;">deleteKey</span><span style="color: #F8F8F8;">(</span>el.<span style="color: #F8F8F8;">item</span><span style="color: #F8F8F8;">,</span> <span style="color: #80FF00;">"edit"</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; aria.<span style="color: #F8F8F8;">templates</span>.<span style="color: #F8F8F8;">RefreshManager</span>.<span style="color: #F8F8F8;">resume</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
<span style="color: #F8F8F8;">}</span></div></div></div>
									<p class="note"><b>Note:</b> To get more info about the refresh manager take a look at <a href="/usermanual/Refresh#Stopping_and_resuming_refreshes">this page</a>.</p>
									
									<h4>Step 7</h4>
									<p>Create a file and call it <i><b>ITodoCtrl.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/todo/</code>).</p>
									
									<h4>Step 8</h4>
									Define the classpath, which class the controller interface extends, that is always <code>aria.templates.IModuleCtrl</code> and write the signature of all the methods of your controller:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">interfaceDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"ariadoc.guides.todo.ITodoCtrl"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$extends</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"aria.templates.IModuleCtrl"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $interface<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;tasksLeft<span style="color: #F8F8F8;">:</span> &nbsp;function<span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;addTask<span style="color: #F8F8F8;">:</span> &nbsp; &nbsp;function<span style="color: #F8F8F8;">(</span>desc<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;updateTask<span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>desc<span style="color: #F8F8F8;">,</span> idx<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;deleteTask<span style="color: #F8F8F8;">:</span> function<span style="color: #F8F8F8;">(</span>idx<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; &nbsp; &nbsp;flagTask<span style="color: #F8F8F8;">:</span> &nbsp; function<span style="color: #F8F8F8;">(</span>idx<span style="color: #F8F8F8;">,</span> done<span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><span style="color: #F8F8F8;">}</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span><br>
<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span></div></div></div>
									
									<h4>Step 9</h4>	
									<p>Create a file and call it <i><b>TodoCtrl.js</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/todo/</code>).</p>
									
									<h4>Step 10</h4>	
									Define the classpath, which class the controller extends, that is always <code>aria.templates.ModuleCtrl</code>, which controller interface implements, in our case <code>ariadoc.guides.todo.ITodoCtrl</code> (that's the controller interface defined in the previous step) and define the constructor:
									<div class="wp_syntax"><div class="code"><div class="at" style="font-family:monospace;">Aria.<span style="color: #F8F8F8;">classDefinition</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; <span style="color: #9FCA78">$classpath</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"ariadoc.guides.todo.TodoCtrl"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; <span style="color: #9FCA78">$extends</span><span style="color: #F8F8F8;">:</span> <span style="color: #80FF00;">"aria.templates.ModuleCtrl"</span><span style="color: #F8F8F8;">,</span><br>
&nbsp; $implements<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #80FF00;">"ariadoc.guides.todo.ITodoCtrl"</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">,</span><br>
<br>
&nbsp; $constructor<span style="color: #F8F8F8;">:</span> function <span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp;this.$ModuleCtrl.<span style="color: #F8F8F8;">constructor</span>.<span style="color: #BBBEFF">call</span><span style="color: #F8F8F8;">(</span>this<span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">setData</span><span style="color: #F8F8F8;">(</span><span style="color: #F8F8F8;">{</span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tasks<span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">(</span>localStorage.<span style="color: #F8F8F8;">tasklist</span> <span style="color: #F8F8F8;">?</span> JSON.<span style="color: #F8F8F8;">parse</span><span style="color: #F8F8F8;">(</span>localStorage.<span style="color: #F8F8F8;">tasklist</span><span style="color: #F8F8F8;">)</span> <span style="color: #F8F8F8;">:</span> <span style="color: #F8F8F8;">[</span><span style="color: #F8F8F8;">]</span><span style="color: #F8F8F8;">)</span><br>
&nbsp; &nbsp; &nbsp;<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">)</span><span style="color: #F8F8F8;">;</span><br>
&nbsp; &nbsp; &nbsp;this.<span style="color: #F8F8F8;">json</span>.<span style="color: #F8F8F8;">addListener</span><span style="color: #F8F8F8;">(</span>this._data<span style="color: #F8F8F8;">,</span> <span style="color: #80FF00;">"tasks"</span><span style="color: #F8F8F8;">,</span> <span style="color: #F8F8F8;">{</span>fn<span style="color: #F8F8F8;">:</span>this.__saveTasks<span style="color: #F8F8F8;">,</span> scope<span style="color: #F8F8F8;">:</span>this<span style="color: #F8F8F8;">}</span><span style="color: #F8F8F8;">,</span> false<span style="color: #F8F8F8;">,</span> true<span style="color: #F8F8F8;">)</span><br>
&nbsp; <span style="color: #F8F8F8;">}</span></div></div></div>
									Inside the constructor we check the localStorage to load an existing tasklist and we add a listener to the data model to automathically save, inside the localStorage, the task that the user add.
									<p class="note"><strong>Note:</strong> To read more about listeners take a look at <a href="/usermanual/Helpers#JSON_Helper">this page</a>.</p>
									<br/>
									<p>Than the other functions:</p>
									<ul>
										<li><code>tasksLeft: function()</code> that just count the number of task left;</li>
										<li><code>addTask: function(desc)</code> that calls <code>this.json.add</code> to add a task to the todo list;</li>
										<li><code>updateTask: function(desc, idx)</code> that calls <code>this.json.inject</code> to update a task;</li>
										<li><code>deleteTask: function(idx)</code> that calls <code>this.json.removeAt</code> to remove a task from the todo list;</li>
										<li><code>flagTask: function(idx, done)</code> that calls <code>this.json.setValue</code> to mark a task as completed;</li>
										<li><code>__saveTasks: function()</code> that saves the tasklisk inside the localStorage;</li>
									</ul>
									
									<h4>Step 11</h4>	
									<p>Create a file and call it <i><b>style.css</b></i>.</p>									
									<p>Save it inside the root folder inside your project (<code>/guides/todo/</code>).</p>
									
									<h4>Step 12</h4>	
									<p>Give some style to your todo app.</p>
									
									<h4>Step 13</h4>	
									<p><strong>That's it!</strong> Open the <code>index.html</code> with your favourite browser (e.g. Chrome) and enjoy.</p>
								</div>
							</div>							
						</article>
						<aside class="column sidebar">							
							<div class="tryit">
								<a class="runguide button blue" href="/ariadoc/guides/todo/" target="_blank">See how it works</a>
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