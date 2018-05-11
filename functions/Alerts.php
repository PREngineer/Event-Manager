<?php

//echo '<br><br><br><br>Loaded Alerts';

/*
This contains the action alert notifications that appear on top.

The alerts are dismissible but they disappear after 5 a seconds with an upper scroll.
*/
?>

<!-- Close the alerts after 5 seconds -->
<script>
  window.setTimeout(function()
  {
    $(".alert").fadeTo(500, 0).slideUp(500, function()
    {
        $(this).remove();
    });
  }, 5000);
</script>

<?php

/*
* Announcement Actions
*/

{
  // Message upon Creation of Announcements
  if( ($_POST['display'] == 'AnnouncementsMenu') && isset($_POST['created']) )
  {
    $res = insert_newAnnouncement($_POST);

    if( $res == True)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              Your announcement has been created!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] ' . count($res) . ' Error(s) occurred while creating the announcement!<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Deletion of Announcement
  if( ($_GET['display'] == 'AnnouncementsMenu') && isset($_GET['deleted']) )
  {
    if( $_GET['deleted'] == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The announcement has been deleted.
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while deleting the announcement!  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Edition of Announcements
  if( ($_POST['display'] == 'AnnouncementsMenu') && isset($_POST['edited']) )
  {
    $res = update_Announcement($_POST);

    if( $res == True)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              Your announcement has been updated!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] ' . count($res) . ' Error(s) occurred while updating the announcement!<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Expiration of Announcement
  if( ( ($_GET['display'] == 'AnnouncementsMenu') && isset($_GET['expired']) ) )
  {
    if( $_GET['expired'] == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The announcement has been expired.
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while expiring the announcement!  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }
}

/*
* Event Actions
*/

{
  // Message upon Adding Actual Budget (POCs)
  if( ($_POST['display'] == 'POCAction') && isset($_POST['id']) )
  {
    $success = set_ActualBudget( $_POST );

    if( $success)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The event budget has been set and the event has been closed!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while setting the actual budget.  The event is still open.  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Approval of Events
  if( ( ($_GET['display'] == 'Approver') || ($_GET['display'] == 'Events') ) && isset($_GET['EventApproval']) )
  {
    if( $_GET['EventApproval'] == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The event has been approved!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while approving the event!  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Checkin
  if( ($_POST['display'] == 'Checkin') )
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
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              Your attendace has been taken!
            </div>';
    }
    else if( $res == 0)
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] The code that was provided is invalid.  Please, try again.</div>';
    }
    else
    {
      echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] Your attendance was already taken for this event.</div>';
    }
  }

  // Message upon Creation of Events
  if( ( ($_POST['display'] == 'MyEvents') || ($_POST['display'] == 'Events')  ) && isset($_POST['created']) )
  {
    $res = insert_newEvent($_POST);

    if( $res == '1')
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              Your event has been recorded!
            </div>';
    }
    else if( $res == '0')
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] Something went wrong while recording the new event.  Please, try again.</div>';
    }
    else
    {
      echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] This event already exists.</div>';
    }
  }

  // Message upon Deletion of Events
  if( ( ($_GET['display'] == 'MyEvents') || ($_GET['display'] == 'Events') ) && isset($_GET['EventDeletion']) )
  {
    if( $_GET['EventDeletion'] == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The event has been deleted!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while deleting the event!  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Disapproval of Events
  if( ( ($_GET['display'] == 'Approver') || ($_GET['display'] == 'Events') ) && isset($_GET['EventDisapproval']) )
  {
    if( $_GET['EventDisapproval'] == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The event has been disapproved!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while disapproving the event!  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Edition of Events
  if( ( ($_POST['display'] == 'MyEvents' || $_POST['display'] == 'Events') ) && isset($_POST['edited']) )
  {
    $res = update_Event($_POST);

    if( $res == True)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              Your event has been updated!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] ' . count($res) . ' Error(s) occurred while updating the event!<br><br>' .
              $res .
            '</div>';
    }
  }

  // Message upon Recovery of Events
  if( ( ($_GET['display'] == 'MyEvents') || ($_GET['display'] == 'Events') ) && isset($_GET['EventRecovery']) )
  {
    if( $_GET['EventRecovery'] == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              The event has been recovered!
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] An error occurred while recovering the event!  Please, try again.<br><br>' .
              $res .
            '</div>';
    }
  }
}

/*
* RSVP Actions
*/

{
  // Message upon RSVP Cancellation Request
  if( ($_GET['display'] == 'CancelRSVP') )
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              You will receive an e-mail.<br><br>
              Confirm this action to process the cancellation.
            </div>';
  }

  // Message upon RSVP
  if( ($_POST['display'] == 'RSVP') )
  {
    // Retrieve the codes for this event
    $res = user_RSVP($_POST['EID'], $_POST['id']);

    if( $res == 1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              Your reservation has been recorded!
            </div>';
    }
    else if( $res == 0)
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] Something went wrong while reserving your space.  Please, try again.
            </div>';
    }
    else if( $res == 2)
    {
      echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] You have already registered.
            </div>';
    }
    else
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] You cancellation was rolled back.
            </div>';
    }
  }
}

/*
* Member Actions
*/

{
  // Message upon Creation of Member
  if( ($_POST['display'] == 'CreateMember') )
  {
    // Insert new member
    $res = insert_newMember($_POST);

    if( $res == '1')
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              New Member has been recorded!
            </div>';
    }
    else if( $res == '0')
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] Something went wrong while recording New Member.  Please, try again.</div>';
    }
    else
    {
      echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] This Member already exists.</div>';
    }
  }
}

?>
