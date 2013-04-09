<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include '../include/_head.php' ?>
	</head>
	<body class="about">
		<?php include '../include/_header.php' ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="wrapper">
					<div class="columns main-page two">
						<article class="column contact">
							<h1>Contact Us</h1>
							<?php
							//init variables
							$cf = array();
							$sr = false;
							
							if(isset($_SESSION['cf_returndata'])){
								$cf = $_SESSION['cf_returndata'];
								$sr = true;
							}
							
							if ($sr && !$cf['form_ok']) {
							?>
							<h5>There were some problems with your form submission</h5>
							<ul id="errors">
								<?php 
								if(isset($cf['errors']) && count($cf['errors']) > 0) :
									foreach($cf['errors'] as $error) :
								?>
								<li><?php echo $error ?></li>
								<?php
									endforeach;
								endif;
								?>
							</ul>
							<?php
							}
							
							if ($sr && $cf['form_ok'] && $cf['mail_ok']) {
							?>
								<p id="success">Thanks for your message! We will get back to you ASAP!</p>
							<?php
							} else if ($sr && $cf['form_ok'] && !$cf['mail_ok']){
							?>
								<p id="fail">Something bad happened while sending your message</p>
							<?php
							}
							?>
            
							<form method="POST" action="/about/form">
								<div class="name">
									<h4><label for="name">What's your name?</label></h4>
									<p>
										<input type="text" name="name" id="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>"/>
									</p>
								</div>
								<div class="email">
									<h4><label for="email">What's your email?</label></h4>
									<p>								
										<input type="text" name="email" id="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>"/>
									</p>
								</div>
								<div class="topic">
									<h4><label for="topic">What for?</label></h4>
									<p>								
										<input type="text" name="topic" id="topic" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['topic'] : '' ?>"/>
									</p>
								</div>
								<h4><label for="message">What's your message?</label></h4>
								<p>
									<textarea name="message" id="message" cols="79" rows="10"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>
								</p>
								<button>Submit</button>
							</form>
							<?php unset($_SESSION['cf_returndata']); ?>
							
						</article>
						<aside class="column sidebar">
							<div>
								<h5>By email is also working!</h5>
								<p>You can also contact us directly by email, just send your request to <a href="mailto:contact@ariatemplates.com">contact@ariatemplates.com</a>.</p>
							</div>
							
							<div style="margin-top: 50px">
								<h5>Be social</h5>
								<h6>Twitter</h6>
								<p>
									<a href="https://twitter.com/ariatemplates" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @ariatemplates</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								</p>
								<h6>Github</h6>
								<p>Fork us on <a href="/contribute">Github</a></p>
							</div>
						</aside>
						<!--a class="go-to-top" href="">Top of page</a-->
					</div>
				</div>
			</section>
		</div>
		<?php include '../include/_footer.html' ?>
	</body>
</html>