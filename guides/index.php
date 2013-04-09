<!DOCTYPE html>
<html>
	<head>
		<?php include '../include/_head.php' ?>
	</head>
	<body class="learn">
		<?php include '../include/_header.php' ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<div class="columns main-page">
						<article class="column guides">
							<h1>Guides</h1>
							<h3>Beginners</h3>
							<div class="container">
								<div class="guide left">
									<h4>Hello 
										<small style="color:#5092BD;">try</small>
										<small><a href="/ariadoc/guides/hello/sample_1/index.html" target="_blank">step 1</a> - </small>
										<small><a href="/ariadoc/guides/hello/sample_2/index.html" target="_blank">step 2</a></small>										
									</h4>
									<p>This is the most simple guide. It allows you to understand how a small Hello World application could be achieved in only few lines of code.<br/><br/>
									Take a look to the sample:
										<ul>
											<li>Inside the first sample you can see how simple is to create the Hello World application in aria templates, using the bootstrap to load the framework and to load the <a href="../usermanual/Writing_Templates">template</a> with the message.</li>
											<li>Inside the second sample you can see how to use a <a href="../usermanual/Template_Scripts">Template Script</a> to interact with the template and how to give some style, using a <a href="../usermanual/CSS_Templates">CSS Template</a>, to your template.</li>											
										</ul>	
									</p>									
								</div>						
								<div class="guide right">								
									<h4>TreeView <small><a href="/ariadoc/guides/treeview/" target="_blank">try it</a></small></h4>
									<p>A treeview is the most common component that can be turned into a nightmare. Thanks to the templating engine, Aria Templates makes it really easy to code your own treeview.<br/><br/>
									The guide loads the template and define the module controller inside the bootstrap. It uses the <a href="../usermanual/Link">@aria:Link</a> widget to load the data.<br/>
									In this example we simulate the server using a <a href="../usermanual/Filters">filter</a> and an xml file. The filter intercepts the JSON request and provides the response taking the data from data.xml.<br/>
									To display the treeview the guide uses a <a href="../usermanual/Refresh#Section_automatic_refresh">section with automatic refresh</a> bound to the data model.</p>									
								</div>
								<div class="footer">
									<span class="left">
										<a href="/guides/hello/">View step by step instructions</a> - 
										<a href="/ariadoc/guides/hello-guide-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'HelloWorld']);">Download this guide</a>
									</span>
									<span class="right">
										<a href="/guides/treeview/">View step by step instructions</a> - 
										<a href="/ariadoc/guides/treeview-guide-1.2.0.zip">Download this guide</a>
									</span>
								</div>
							</div>
							<h3>Applications</h3>
							<div class="guide withImg">
								<div class="screenshot todo"><div class="overlay"><a href="/ariadoc/guides/todo-guide-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'Todo']);"><img src="/images/guides/boxdownload42.png"></img>Download this guide</a></div></div>
								<h4>Todo <small><a href="/ariadoc/guides/todo/" target="_blank">try it</a></small></h4>
								<p>This guide has been written in the scope of an opensource project: <a href="">TodoMVC</a>.<br />
								This project is about building a common todo application for the most popular JavaScript MVC frameworks.<br/><br/>
								To add a task to the list the guide uses the <a href="../usermanual/DOM_Events#Keyboard_events">on keydown DOM event</a> inside the template. To display all the tasks it uses a <a href="../usermanual/Writing_Templates#repeater">repeater</a>, to manage the 'mark all' and the 'task left' functionalities uses a section bound to the data model. The remove action for a task is made by the <a href="../usermanual/DOM_Events#Mouse_events">on click DOM event</a> and to modify a single task the application display an input text when the on blur event is raised on a task.</p>
								<p>
									<a href="/guides/todo/">View step by step instructions</a> - Click on the image to download the guide
								</p>
							</div>
							
							<div class="guide withImg">
								<div class="screenshot drench"><div class="overlay"><a href="/ariadoc/guides/drench-guide-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'Drench']);"><img src="/images/guides/boxdownload42.png"></img>Download this guide</a></div></div>
								<h4>Drench <small><a href="/ariadoc/guides/drench/" target="_blank">try it</a></small></h4>
								<p>This application is about a funny game.<br/>
								The goal is to clear the board with the lowest possible number of moves, using the different colors.<br/><br/>
								This application is created by four <a href="../usermanual/Refresh#Section_automatic_refresh">sections</a> (level, timer, board, banner) and all of them are bound to the data model (level, timer, moves). To manage the interaction with the user the app uses the <a href="../usermanual/DOM_Events#Mouse_events">on click DOM event</a> and to generate the colored board uses the <a href="../usermanual/Writing_Templates#foreach">foreach</a> statement.</p>
								<p>
									<a href="/guides/drench/">View step by step instructions</a> - Click on the image to download the guide
								</p>
							</div>
							
							<h3>More specific guides</h3>
							<div class="guide withImg">
								<div class="screenshot airportmap"><div class="overlay"><a href="/ariadoc/guides/airportmap-guide-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'AirportMap']);"><img src="/images/guides/boxdownload42.png"></img>Download this guide</a></div></div>
								<h4>Airport Map <small><a href="/ariadoc/guides/airportmap/" target="_blank">try it</a></small></h4>
								<p>This application simulate an airport map, showing airplanes parked and airplanes taking off.<br/><br/>
								In this guide we simulate the request/response mechanism using a <a href="../usermanual/Filters">filter</a>, in order to load flights data from different xml files. The application polls the xml files to have the updated data about the flights. When the application starts, it loads the data using the <a href="../usermanual/Template_Scripts#Intercepting_template_lifecycle_phases">$viewReady</a> statement. To update the data the app uses the <a href="../usermanual/Template_Scripts#Reacting_to_module_and_flow_events">onModuleEvent</a> method.</p>
								<p>Inside this guide it is used an external library, Raphael, with aria templates.</p>
								<p>
									<a href="/guides/airportmap/">View step by step instructions</a> - Click on the image to download the guide
								</p>
							</div>
							
							<div class="guide withImg">
								<div class="screenshot msgconsole"><div class="overlay"><a href="/ariadoc/guides/msgconsole-guide-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'MsgConsole']);"><img src="/images/guides/boxdownload42.png"></img>Download this guide</a></div></div>
								<h4>Message Console <small><a href="/ariadoc/guides/msgconsole/" target="_blank">try it</a></small></h4>
								<p>This guide shows how to create a console that display incoming messages.<br/><br/>
								To simulate the incoming messages, the application uses a <a href="../usermanual/Filters">filter</a> to fetch data from different xml files. It shows also how to stop and resume the requests. The interface is composed by <a href="../usermanual/Refresh#Section_automatic_refresh">sections</a>, one containing the initial message and the info about the total messages and another one with the pause/resume button, both bound to the data model. Than there are three widgets: <a href="../usermanual/Tooltip">@aria:Tooltip</a>, <a href="../usermanual/Text">@aria:Text</a> and <a href="/usermanual/Button">@aria:Button</a>. To display the incoming messages the app uses a <a href="../usermanual/Writing_Templates#repeater">repeater</a>.</p>
								<p>
									<a href="/guides/msgconsole/">View step by step instructions</a> - Click on the image to download the guide
								</p>
							</div>
							
							<div class="guide withImg">
								<div class="screenshot spreadsheet"><div class="overlay"><a href="/ariadoc/guides/spreadsheet-guide-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'Spreadsheet']);"><img src="/images/guides/boxdownload42.png"></img>Download this guide</a></div></div>
								<h4>Spreadsheet <small><a href="/ariadoc/guides/spreadsheet/" target="_blank">try it</a></small></h4>
								<p>This guide simulate a program to generate and use spreadsheets. It allows you to create a new spreadsheet, to load it, using external xml files, and to copy an existing one. The goal is to show how easy is to use a large amount of data with aria templates and how the partial refresh works with repeaters.<br/><br/>
								To load datasets the app uses a <a href="../usermanual/Filters">filter</a> to fetch data from an xml file. It uses different macros, the <a href="/usermanual/Link">@aria:Link</a> and the <a href="../usermanual/TextField">@aria:TextField</a> widgets and a <a href="../usermanual/Writing_Templates#repeater">repeater</a> to create the interface.</p>
								<p>
									<a href="/guides/spreadsheet/">View step by step instructions</a> - Click on the image to download the guide							
								</p>
							</div>
							<div class="allguides">
								<a href="/ariadoc/guides/all-guides-1.2.0.zip" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Guides', 'All_Guides']);">Download all Guides at once</a>
							</div>
						</article>			
					</div>
				</div>
			</section>
		</div>
		<?php include '../include/_footer.html' ?>
	</body>
</html>