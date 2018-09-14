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

// Get the information if everything was provided
if( !empty($_GET['eid']) && !empty($_GET['id']) && !empty($_GET['rsvpid']) && !empty($_GET['code']) )
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

}

// Page just loaded, valid code prompt for reason
if( !isset($_GET['post']) && ( SHA1($_GET['eid']) == $_GET['code'] ) )
{
  echo '
  <!-- Form STARTS here -->

  <form class="container" method="POST" id="AttendanceNewEntry">
    <input name="display"   type="hidden" value="doCancelRSVP">

    <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

    <div class="form-group">
      <label for="Answer"> <label class="text-danger">*</label> Please, tell us why you are cancelling:</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="Scheduling&nbsp;conflict">
        <label class="form-check-label" for="Answer">
          Scheduling conflict
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="No&nbsp;longer&nbsp;interested">
        <label class="form-check-label" for="Answer">
          No longer interested
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="Personal&nbsp;circumstances">
        <label class="form-check-label" for="Answer">
          Personal circumstances
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Answer" id="Answer" value="RSVPed&nbsp;by&nbsp;accident">
        <label class="form-check-label" for="Answer">
          RSVPed by accident
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
}

// Page loaded, invalid code provided, show message
if( !isset($_GET['post']) && ( SHA1($_GET['eid']) !== $_GET['code'] ) )
{
  echo 'The request is not valid.  Please make sure to follow the link provided via e-mail.';
}

// Reason has been provided
if( !empty($_GET['post']) )
{
  // Check if the code provided is valid
  if( SHA1($_GET['eid']) == $_GET['code'] )
  {

    // Process the cancellation
    $success = cancelRSVP($_GET['rsvpid'], $_GET['post']);

    if($success == true)
    {
      $ts = date('Y-m-d H:m:s');
      echo '
      <h2>Your RSVP has been cancelled.</h2>
      <br>
      <p>
      Cancellation processed on ' . $ts . '
      <br><br>
      Please save a copy of this confirmation for your record.
      </p>
      ';
    }
    else
    {
      echo 'Something went wrong while trying to cancel your RSVP.  Please, try again.';
    }
  }
}
?>
