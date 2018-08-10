<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';
include '../functions/Mail.php';
include '../lib/PHPMailer/class.phpmailer.php';
include '../lib/PHPMailer/class.smtp.php';
include '../functions/settings.php';

$msg = '
<img src="banner.png" alt="Event Manager Banner"/>

<br><br>
Hello Jorge,

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
    <td>
      Your EID:
    </td>
    <td>
    jorge.l.pabon.cruz
    </td>
  </tr>
  <tr>
    <td>
      Event Name:
    </td>
    <td>
    Testing Event
    </td>
  </tr>
  <tr>
    <td>
      Event Date:
    </td>
    <td>
    2025-08-08
    </td>
  </tr>
  <tr>
    <td>
      Event Location:
    </td>
    <td>
    Somewhere
    </td>
  </tr>
  <tr>
    <td>
      Reason for cancellation:
    </td>
    <td>
    Because I want to.
    </td>
  </tr>
  <tr>
    <td>
      Confirm:
    </td>
    <td>
      <a href="http://mycompany.com/doCancelRSVP.php?id=26&rsvpid=1">CONFIRM CANCELLATION</a>
    </td>
  </tr>
</table>
<br><br>

Thank you,
<br>
Event Manager
<br>
My Company';

echo $msg;

$mail = new PHPMailer;

// Set mailer to use SMTP
$mail->isSMTP();
// Specify main and backup SMTP servers
$mail->Host = $SMTPHOSTS;
// Enable SMTP authentication
$mail->SMTPAuth = $SMTPAUTHENTICATION;
// SMTP username
$mail->Username = $SMTPUSER;
// SMTP password
$mail->Password = $SMTPPASS;
// Enable TLS encryption
if($SMTPENC == 1)
{
  $mail->SMTPSecure = 'tls';
}
if($SMTPENC == 2)
{
  $mail->SMTPSecure = 'ssl';
}
// TCP port to connect to
$mail->Port = $SMTPPORT;

// Set Sender
$mail->setFrom("pianistapr@gmail.com", "Mailer");
// Add a recipient
$mail->addAddress("jorge.l.pabon.cruz@accenturefederal.com", "jorge.l.pabon.cruz@accenturefederal.com");

if($SMTPREPLYTO !== "")
{
  $mail->addReplyTo($SMTPREPLYTOEMAIL, $SMTPREPLYTO);
}

$mail->SMTPDebug = 2;

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

$mail->Subject = "Event Manager - RSVP Cancellation Request";
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
  echo "<br><br>" . $mail->ErrorInfo;
}
else
{
  //echo 'Message has been sent';
  echo "True";
}
?>
