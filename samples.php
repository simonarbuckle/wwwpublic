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
					<div class="columns main-page">
						<article class="column">							
							<a href="top"></a>
							<h1>Samples</h1>
							<p>These are the samples grouped by articles.</p>							
							<p></p>			
							<?php 			
								require_once "../libs/spyc-0.5/spyc.php";
								// Connect to the DB
								mysql_connect("localhost", "root", "Amadeus1") or die(mysql_error());
								mysql_select_db("atwiki") or die(mysql_error());
								
								$articlesPath = "/usermanual/";
								$samplesPath = "../ariadoc/samples/";
								
								$query = "SELECT 
														p.page_id AS PageID, 
														p.page_title AS PageTitle,
														t.old_text AS PageContent														
													FROM page p
													LEFT JOIN revision r ON p.page_latest=r.rev_id
													LEFT JOIN text t ON r.rev_text_id=t.old_id
													WHERE
														p.page_namespace=0														
														AND p.page_is_redirect=0";		
								
								$data = mysql_query($query);
								$pattern = "/<sample sample=\"(.*)\"/";
								
								while($info = mysql_fetch_array($data)) {
									if(strstr($info['PageContent'], "<sample sample=\"") !== false) {
										$pageTitle = str_replace("_", " ", $info['PageTitle']);
										Print "<div class=\"article\"><h3><a href=\"".$articlesPath.$info['PageTitle']."\">".$pageTitle."</a></h3></div>";										
										$num_samples = preg_match_all($pattern, $info['PageContent'], $matches);																																								
										Print "<div class=\"sample\">";
										for ($i = 0; $i < $num_samples; $i++) {											
											Print "<a href=\"".$articlesPath.$info['PageTitle']."#sample-".$i."\"><div class=\"box\">";
											$parsed = spyc_load_file($samplesPath.$matches[1][$i]."/sample.yml");
											$sampleTitle = preg_replace("/".$pageTitle."(.*) - /i", "", $parsed['title']);
											$sampleDescription = $parsed['description'];

											Print "<div class=\"title\"><h4>".$sampleTitle."</h4></div>";
											Print "<div class=\"tooltip\">Click to see the sample</div>";
											Print "<div class=\"description\">".$sampleDescription."</div>";											
											Print "</div></a>";
										}	
										Print "</div>";
									}
								}								
							?>		
							<div id="scrollMenu" class="up">
								<div>
									<a href="#top" onclick="smoothScroll('top');return false">Top</a>
								</div>
							</div>
						</article>
					</div>
				</div>
			</section>
		</div>
		<?php include 'include/_footer.html' ?>
	</body>
</html>