<?php
//processFeedback.php

$messageToBusiness =
	"From: ".$_POST['Name']."\r\n".
	"E-mail Address: " .$_POST['Email']."\r\n".
	"Phone Number: " .$_POST['Phone']."\r\n".
	"Subject: " .$_POST['Subject']."\r\n".
	$_POST['message']."\r\n";
	
$headerToBusiness = "From: $_POST[Email]\r\n";;
mail("hunkelem08@uiu.edu",$_POST['Subject'],$messageToBusiness,$headerToBusiness);

$messageToClient =
	"Dear ".$_POST['Name'].":\r\n".
	"The following order has been placed with Copperfield Chimney Supply:\r\n\r\n".$_POST['message'].
	"\r\n\r\n-----------------------------\r\nThank you for your patronage.\r\n".
	"The Chimney Sweep Helper\r\n-----------------------------\r\n";


$headerToClient = "From: hunkelem08@uiu.edu\r\n";
mail($_POST['Email'],"RE: ".$_POST['Subject'], $messageToClient, $headerToClient);

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