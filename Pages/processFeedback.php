<?php
//processFeedback.php

$messageToBusiness =
	"From: ".$_POST['salute']." "
	.$_POST['firstName']." "
	.$_POST['lastName']."\r\n".
	"E-mail Address: " .$_POST['email']."\r\n".
	"Phone Number: " .$_POST['phone']."\r\n".
	"Subject: " .$_POST['subject']."\r\n".
	$_POST['message']."\r\n";
	
$headerToBusiness = "From: $_POST[email]\r\n";;
mail("hunkelem08@uiu.edu",$_POST['subject'],$messageToBusiness,$headerToBusiness);

$messageToClient =
	"Dear ".$_POST['salute']." ".$_POST['lastName'].":\r\n".
	"The following estimate was created for you by the Chimney Sweep Helper:\r\n\r\n".
	"-----------------------------\r\nThank you for your patronage.\r\n".
	"The Chimney Sweep Helper\r\n-----------------------------\r\n";


$headerToClient = "From: hunkelem08@uiu.edu\r\n";
mail($_POST['email'],"RE: ".$_POST['subject'], $messageToClient, $headerToClient);

$display = str_replace("\r\n", "<br />\r\n", $messageToClient);
$display =
	"<html><head><title>Your Message</title></head><body><tt>".
	$display.
	"</tt></body></html>";
echo $display;

$fileVar = fopen("feedback.txt","a")
	or die("Error: Could not open the log file.");
fwrite($fileVar, "\n-----------------------------\n")
	or die("Error: Could not open the log file.");
fwrite ($fileVar, "Date received: " .date("jS \of F, Y \a\\t H:i:s\n"))
	or die("Error: Could not open the log file.");
fwrite($fileVar, $messageToBusiness)
	or die("Error: Could not open the log file.");
?>
	