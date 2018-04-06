<?php

require '../lib/PHPMailer/class.phpmailer.php';
require '../lib/PHPMailer/class.smtp.php';

Function cancelRSVPMail($data)
{
	$msg = '
	<img src="banner.png" alt="Event Manager Banner"/>

	<br><br>
	Hello ' . $data['FirstName'] . ' ' . $data['LastName'] . ',

	<br><br>
	We have received a request to cancel a reservation on ' . date("m/d/Y") . ' through the Event Manager.

	<br><br>
	Please confirm that you want to cancel this reservation by clicking the link provided.

	<br><br>

	<hr>

	<br>

	<table>
		<tr>
			<td colspan="2">
			Reservation Information
			</td>
		</tr>
		<tr>
			<td>
				Your EID:
			</td>
			<td>' .
				$data[eid] . '
			</td>
		</tr>
		<tr>
			<td>
				Event Name:
			</td>
			<td>' .
				$data[name] . '
			</td>
		</tr>
		<tr>
			<td>
				Event Date:
			</td>
			<td>' .
				$data[date] . '
			</td>
		</tr>
		<tr>
			<td>
				Event Location:
			</td>
			<td>' .
			$data[location] . '
			</td>
		</tr>
		<tr>
			<td>
				Reason for cancellation:
			</td>
			<td>' .
				$data[reason] . '
			</td>
		</tr>
		<tr>
			<td>
				Confirm by clicking here
			</td>
			<td>
				<a href="">http://doCancelRSVP?id=' . $data[id] . '
			</td>
		</tr>
	</table>
	<br><br>

	Thank you,
	<br>
	Project Ark Mailer
	<br>
	My Company';

	$mail = new PHPMailer;

	// Set mailer to use SMTP
	$mail->isSMTP();
	// Specify main and backup SMTP servers
	$mail->Host = SMTPHOSTS;
	// Enable SMTP authentication
	$mail->SMTPAuth = SMTPAUTHENTICATION;
	// SMTP username
	$mail->Username = SMTPUSER;
	// SMTP password
	$mail->Password = SMTPPASS;
	// Enable TLS encryption
	if(SMTPENC == 1)
	{
		$mail->SMTPSecure = 'tls';
	}
	if(SMTPENC == 2)
	{
		$mail->SMTPSecure = 'ssl';
	}
	// TCP port to connect to
	$mail->Port = SMTPPORT;

	// Set Sender
	$mail->setFrom("Project.Ark.Mailer@mycompany.com", "Project Ark Mailer");
	// Add a recipient
	$mail->addAddress($data['Email'], $data['FirstName'] . ' ' . $data['LastName']);

	if(SMTPREPLYTO !== "")
	{
		$mail->addReplyTo(SMTPREPLYTO, "Project Ark Admin");
	}

	/*
	if(SMTPCC !== "")
	{
		$mail->addCC(SMTPCC);
	}
	if(SMTPBCC !== "")
	{
		$mail->addBCC(SMTPBCC);
	}
	*/

	// Set email format to HTML
	$mail->isHTML(true);

	$mail->Subject = SMTPSUBJECT;
	$mail->Body    = $msg;
	$mail->AltBody = $msg;

	// Add attachments
	//$mail->addAttachment("/var/tmp/file.tar.gz");
	// Optional name
	//$mail->addAttachment(""/tmp/image.jpg", "new.jpg");

	// Add the banner on top
	$mail->AddEmbeddedImage("img/banner.png", "banner");

	if( !$mail->send() )
	{
		//echo 'Message could not be sent.';
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
		Mailer Error: ' . $mail->ErrorInfo . '</div>';
	}
	else
	{
		//echo 'Message has been sent';
	}
}

?>
