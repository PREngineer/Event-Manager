<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

?>

<title>Event Manager - Confirm RSVP Cancellation</title>

<!-- Heading -->
<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Confirm RSVP Cancellation</h1>

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

  //print_r($data);
}

//$success = cancelRSVPMail($data);

//if($success == true)
//{
  echo '
  <!-- Form STARTS here -->

  <form class="container" method="POST" id="AttendanceNewEntry">
    <input name="display"   type="hidden" value="doCancelRSVP">
    <input name="created"   type="hidden" value="">
    <input name="event"     type="hidden" value="">

    <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

    <div class="form-group">
      <label for="Answer"> <label class="text-danger">*</label> Please, tell us why you are cancelling:</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="Scheduling Conflict">
        <label class="form-check-label" for="Answer">
          Scheduling Conflict
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="No longer interested">
        <label class="form-check-label" for="Answer">
          No longer interested
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="Personal Reasons">
        <label class="form-check-label" for="Answer">
          Personal Reasons
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="Other">
        <label class="form-check-label" for="Answer">
          Other
        </label>
      </div>
    </div>

  <hr>

  <input class="btn btn-primary" type="submit" value="Submit">
  <input class="btn btn-primary" type="reset"  value="Clear">

  </form>
  <!-- Form ENDS here -->';
//}
//else
//{
//	echo '<h2>An error occurred while attempting to cancel your RSVP.  Please, try again.</h2>';
//}

?>
