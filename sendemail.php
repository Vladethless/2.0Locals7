<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "youremail@mail.com" );

// Read the form values
$success = false;
$Sendername = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderSubject = isset( $_POST['subject'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $Sendername && $senderEmail && $senderSubject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $Sendername . " <" . $senderEmail . ">";
  $msgBody = " Username: " . $Sendername . " Email: " . $senderEmail . " Subject: " . $senderSubject . " Phone: " . $senderPhone . " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: login.html?message=Failed');	
}

?>