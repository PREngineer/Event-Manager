<?php

require '../lib/PHPMailer/class.phpmailer.php';
require '../lib/PHPMailer/class.smtp.php';

Function cancelRSVPMail($data)
{
	$msg = '
	<img src="http://' . $_SERVER['HTTP_HOST'] . preg_split("/content/", $_SERVER['PHP_SELF'])[0] . 'images/event.png" width="200" height="200" alt="Event Manager Banner"/>

	<br><br>
	Hello ' . $data[4] . ',

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
			<td colspan="2">
				---------------------------------------------------------
			</td>
		</tr>
		<tr>
			<td width="50%">
				Your EID:
			</td>
			<td width="50%">' .
				$data[4] . '
			</td>
		</tr>
		<tr>
			<td>
				Event Name:
			</td>
			<td>' .
				$data[1] . '
			</td>
		</tr>
		<tr>
			<td>
				Event Date:
			</td>
			<td>' .
				$data[2] . '
			</td>
		</tr>
		<tr>
			<td>
				Event Location:
			</td>
			<td>' .
				$data[3] . '
			</td>
		</tr>
		<tr>
			<td>
				Reason for cancellation:
			</td>
			<td>' .
				$data[6] . '
			</td>
		</tr>
		<tr>
			<td>
				Confirm:
			</td>
			<td>
				<a href="http://' . $_SERVER['HTTP_HOST'] . preg_split("/content/", $_SERVER['PHP_SELF'])[0] . 'content/index.php?display=doCancelRSVP&id=' . $data[0] .
								'&rsvpid=' . $data[5] . '&code=' . SHA1($data[4]) . '&eid=' . $data[4] . '">CONFIRM CANCELLATION</a>
			</td>
		</tr>
	</table>
	<br><br>

	Thank you,
	<br>
	Event Manager
	<br>
	My Company';

	// Used to view the e-mail that gets generated when coding changes.
	//echo $msg;

	$mail = new PHPMailer;

	// Set mailer to use SMTP
	$mail->isSMTP();
	// Specify main and backup SMTP servers
	$mail->Host = $data[7];
	// Enable SMTP authentication
	$mail->SMTPAuth = $data[8];
	// SMTP username
	$mail->Username = $data[9];
	// SMTP password
	$mail->Password = $data[10];
	// Enable TLS encryption
	if($data[11] == 1)
	{
		$mail->SMTPSecure = 'tls';
	}
	// Enable SSL encryption
	if($data[11] == 2)
	{
		$mail->SMTPSecure = 'ssl';
	}
	// TCP port to connect to
	$mail->Port = $data[12];

	// Set Sender
	$mail->setFrom($data[13], $data[14]);
	// Add a recipient
	$mail->addAddress($data[4] . '@' . $data[15], $data[4]);

	/*
	if($SMTPREPLYTO !== "")
	{
		$mail->addReplyTo($SMTPREPLYTOEMAIL, $SMTPREPLYTO);
	}

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

	$mail->Subject = "Event Manager - RSVP Cancellation Request";
	$mail->Body    = $msg;
	$mail->AltBody = $msg;

	// Add attachments
	//$mail->addAttachment("/var/tmp/file.tar.gz");
	// Optional name
	//$mail->addAttachment(""/tmp/image.jpg", "new.jpg");

	// Add the banner on top
	//$mail->AddEmbeddedImage("../images/logo.png", "banner");

	// Use if having troubles with the e-mail.
	//$mail->SMTPDebug = 2;

	if( !$mail->send() )
	{
		//echo 'Message could not be sent.';
		Return $mail->ErrorInfo;
	}
	else
	{
		//echo 'Message has been sent';
		Return True;
	}
}

?>
