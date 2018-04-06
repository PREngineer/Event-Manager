<?php
/*
This contains the action alert notifications that appear on top.

The alerts are dismissible but they disappear after 5 a seconds with an upper scroll.
*/
?>

<!-- Close the alerts after 5 seconds -->
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);
</script>

<?php

// Message upon Creation of Events
if( !empty($_POST) && ($_POST['action'] == 'createEvent') )
{
  $res = insert_newEvent($_POST);

  if( $res == True)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            Your event has been created!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] ' . count($res) . ' Error(s) occurred while creating the event!<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Edition of Events
if( !empty($_POST) && ($_POST['action'] == 'editEvent') )
{
  $res = update_Event($_POST, $_GET['id']);

  if( $res == True)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            Your event has been updated!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] ' . count($res) . ' Error(s) occurred while updating the event!<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Approval of Events
if( isset($_GET['approval']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'approve') ) )
{
  if( $_GET['approval'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been approved!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while approving the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Disapproval of Events
if( isset($_GET['disapproval']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'approve') ) )
{
  if( $_GET['disapproval'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been disapproved!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while disapproving the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Deletion of Events
if( isset($_GET['delete']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'myEvents') ) )
{
  if( $_GET['delete'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been deleted!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while deleting the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Recovery of Events
if( isset($_GET['recover']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'myEvents') ) )
{
  if( $_GET['recover'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been recovered!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while recovering the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Event Checkin
if( !empty($_POST) && ($_POST['action'] == 'checkin') )
{
  // Retrieve the codes for this event
  $codes = get_eventCodes( $_GET['id'] );

  // Check if the code provided is valid
  if( $_POST['code'] == $codes[0] || $_POST['code'] == $codes[1] )
  {
    // If In Person Code
    if( $_POST['code'] == $codes[0] )
    {
      $res = user_checkIn( $_POST['enterpriseID'], $_GET['id'], 0 );
    }
    // If Remote code
    else
    {
      $res = user_checkIn( $_POST['enterpriseID'], $_GET['id'], 1 );
    }
  }
  else
  {
    $res = False;
  }

  if( $res == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            Your attendace has been taken!
          </div>';
  }
  else if( $res == 0)
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] The code that was provided is invalid.  Please, try again.</div>';
  }
  else
  {
    echo '<div class="container alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] You attendance was already taken for this event.</div>';
  }
}

// Message upon RSVP
if( !empty($_POST) && ($_POST['action'] == 'RSVP') )
{
  // Retrieve the codes for this event
  $res = user_RSVP($_POST['EID'], $_GET['id']);

  if( $res == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            Your reservation has been recorded!
          </div>';
  }
  else if( $res == 0)
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] Something went wrong while reserving your space.  Please, try again.</div>';
  }
  else if( $res == 2)
  {
    echo '<div class="container alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] You have already registered.</div>';
  }
  else
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] You cancellation was rolled back.</div>';
  }
}

// Message upon RSVP Cancellation Request
if( !empty($_GET) && ($_GET['action'] == 'cancelRSVP') )
{
  echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            You will receive an e-mail.<br><br>
            Confirm this action to process the cancellation.
          </div>';
}

// Message upon Creation of Member
if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{
  // Insert new member
  $res = insert_newMember($_POST);

  if( $res == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            New Member has been recorded!
          </div>';
  }
  else if( $res == 0)
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] Something went wrong while recording New Member.  Please, try again.</div>';
  }
  else
  {
    echo '<div class="container alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] This Member already exists.</div>';
  }
}

?>
