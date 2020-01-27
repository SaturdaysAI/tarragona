<?php

//FORM INPUT VARS
$name = $_POST['fname'];
$email = $_POST['email'];
$company = $_POST['company'];
$message = $_POST['message'];

//BUILDING MAIL
$formcontent = "From: $name \n Company: $company \n Message: $message";
$recipient = "zamora@shugert.com.mx";
$subject = "Message from $name. Sent from contact form";
$mailheader = "From: $email \r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die ("Error!");

echo "Email sent, we will contact you shortly.";
?>