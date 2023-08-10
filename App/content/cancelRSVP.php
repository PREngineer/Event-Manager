<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';
include '../functions/Mail.php';
include '../functions/settings.php';

?>

<title>Event Manager - Request RSVP Cancellation</title>
<!-- Heading -->
<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Event Registration Cancellation</h1>

<hr>

<?php

if( !empty($_GET) )
{
  $eventData = get_EventData( $_GET['id'] )[0];

  // -- Gather the data to pass to the e-mail function --
  // Event ID, Event Name, Event Date, Location, Enterprise ID, RSVP ID
  // SMTP Hosts, SMTP Authentication, SMTP User, SMTP Password, SMTP Encryption, SMTP Port
  $data[0]   = $eventData[0];
  $data[1]   = $eventData[1];
  $data[2]   = $eventData[2];
  $data[3]   = $eventData[7];
  $data[4]   = $_GET['eid'];
  $data[5]   = $_GET['rsvpid'];
  $data[6]   = "You will be prompted for the reason later.";
  $data[7]   = $SMTPHOSTS;
  $data[8]   = $SMTPAUTHENTICATION;
  $data[9]   = $SMTPUSER;
  $data[10]  = $SMTPPASS;
  $data[11]  = $SMTPENC;
  $data[12]  = $SMTPPORT;
  $data[13]  = $SMTPFROMEMAIL;
  $data[14]  = $SMTPFROMNAME;
  $data[15]  = $MYDOMAIN;

  //print_r($data);
}

$success = cancelRSVPMail($data);

if($success == true)
{
  echo '
    <h2>
    Your cancellation request has been received.
    </h2>

    <br>

    <table style="width:50%">

    <tr>
      <td style="width:50%">
        <strong>Event Name:</strong>
      </td>
      <td>'
        . $data[1] . '
      </td>
    </tr>

    <tr>
      <td>
        <strong>Event Date:</strong>
      </td>
      <td>'
        . $data[2] . '
      </td>
    </tr>

    <tr>
      <td>
        <strong>Event Location:</strong>
      </td>
      <td>'
        . $data[3] . '
      </td>
    </tr>

    <tr>
      <td>
        <strong>Event Reservation:</strong>
      </td>
      <td>'
        . $data[4] . '
      </td>
    </tr>

    </table>

    <br><br>
  ';
}
else
{
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span></button>
  Mailer Error: ' . $success . '</div>';
}

?>
