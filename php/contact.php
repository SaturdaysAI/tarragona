<?php

$field_first_name = $_POST['fname'];

$field_email = $_POST['email'];

$field_company = $_POST['company'];

$field_message = $_POST['message'];

$mail_to = 'zamora@shugert.com.mx';

$subject = 'Message from a site visitor ' . $field_first_name;

$body_message = 'From: ' . $field_first_name . "\n";

$body_message .= 'E-mail: ' . $field_email . "\n";

$body_message .= 'Company: ' . $field_company . "\n";

$body_message .= 'Message: ' . $field_message;

$headers = 'From: ' . $field_email . "\r\n";

$headers .= 'Reply-To: ' . $field_email . "\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) {?>
	<script language="javascript" type="text/javascript">
		//alert('Thank you for the message. We will contact you shortly.');
		window.location = 'index.html';
	</script>
<?php
} else {?>
	<script language="javascript" type="text/javascript">
		//alert('Message failed. Please, send an email to gordon@template-help.com');
		window.location = 'index.html';
	</script>
<?php
}
?>