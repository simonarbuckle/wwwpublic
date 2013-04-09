<?php
if( isset($_POST) ){
	
	require_once '../../libs/Swift-4.1.5/lib/swift_required.php';
	
	//form validation vars
	$formok = true;
	$errors = array();
	
	//sumbission data
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$date = date('d/m/Y');
	$time = date('H:i:s');
	
	//form data
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$topic = $_POST['topic'];
	$message = $_POST['message'];
	
	//validate form data
	
	//validate name is not empty
	if(empty($name)){
		$formok = false;
		$errors[] = "You have not entered a name";
	}

	//validate email address is not empty
	if(empty($email)){
		$formok = false;
		$errors[] = "You have not entered an email address";
	//validate email address is valid
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$formok = false;
		$errors[] = "You have not entered a valid email address";
	}
	
	//validate message is not empty
	if(empty($message)){
		$formok = false;
		$errors[] = "You have not entered a message";
	}
	//validate message is greater than 20 charcters
	elseif(strlen($message) < 20){
		$formok = false;
		$errors[] = "Your message must be greater than 20 characters";
	}

	$result = 1;
	//send email if all is ok
	if($formok){
	
		$transport = Swift_SmtpTransport::newInstance('localhost', 25);
		// Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);
	
		// Create the message
		$message = Swift_Message::newInstance()
			->setCharset('utf-8')
			// Give the message a subject
			->setSubject("New Enquiry: '{$topic}'")
			// Set the From address with an associative array
			->setFrom(array('admin@ariatemplates.com' => 'Contact Page'))
			->setSender('admin@ariatemplates.com')
			// Set the To addresses with an associative array
			->setTo(array(
				'contact@ariatemplates.com'
			))
			// Give it a body
			->setBody("<div><p>You have received a new message from the contact page.</p>
					  <p><strong>Name: </strong> {$name} </p>
					  <p><strong>Email Address: </strong> {$email} </p>
					  <p><strong>Topic: </strong> {$topic} </p>
					  <p><strong>Message: </strong> {$message} </p>
					  <small>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</small></div>", 'text/html');

		// Send the message
		try {
			$result = $mailer->send($message);
		} catch(Exception $e) {
			$result = 0;
		}
	}
	
	//what we need to return back to our form
	$returndata = array(
		'posted_form_data' => array(
			'name' => $name,
			'email' => $email,
			'topic' => $topic,
			'message' => $message
		),
		'form_ok' => $formok,
		'mail_ok' => $result,
		'errors' => $errors
	);
			
	//set session variables
	session_start();
	$_SESSION['cf_returndata'] = $returndata;
		
	//redirect back to form
	header('location: ' . $_SERVER['HTTP_REFERER']);
}