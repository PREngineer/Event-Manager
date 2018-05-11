<?php

/*
This contains the form submission handlers as well as the get submission handlers.

This is used to determine which element will be loaded into the center of the page.
*/

/*
* Role Menus Handling
*/
{
  // Show POC page
  if( $_GET['display'] == 'Poc' )
  {
    echo'
      <script>
        $("#Content").load("pocs.php");
      </script>
    ';
  }

  // Show Admins page
  if( $_GET['display'] == 'Admin' )
  {
    echo'
      <script>
        $("#Content").load("admin.php");
      </script>
    ';
  }

  // Approver's Menu
  if( $_GET['display'] == 'Approver' )
  {
    echo'
      <script>
        $("#Content").load("approvers.php");
      </script>
    ';
  }
}

/*
* Announcement Handling
*/
{
  // Show Announcements
  if( $_POST['display'] == 'Announcements' || $_GET['display'] == 'Announcements' )
  {
    echo'
      <script>
        $("#Content").load("announcements.php");
      </script>
    ';
  }

  // Show Announcements Menu (admin)
  if( $_POST['display'] == 'AnnouncementsMenu' || $_GET['display'] == 'AnnouncementsMenu' )
  {
    echo'
      <script>
        $("#Content").load("announcementsMenu.php");
      </script>
    ';
  }

  // Create Announcement (admin)
  if( $_GET['display'] == 'CreateAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("createAnnouncement.php");
      </script>
    ';
  }

  // Post to Edit Announcement (admin)
  if( $_POST['display'] == 'EditAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("announcementsMenu.php");
      </script>
    ';
  }

  // Edit Announcement (admin)
  if( $_GET['display'] == 'EditAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("editAnnouncement.php?id=' . $_GET['id'] . '");
      </script>
    ';
  }
}

/*
* Attendance Handling
*/
{
  // Show Attendance
  if( $_POST['display'] == 'Attendance' || $_GET['display'] == 'Attendance' )
  {
    echo'
      <script>
        $("#Content").load("attendanceMenu.php");
      </script>
    ';
  }


}

/*
* Membership Handling
*/
{
  // Show Attendance
  if( $_POST['display'] == 'Members' || $_GET['display'] == 'Members' )
  {
    echo'
      <script>
        $("#Content").load("membershipMenu.php");
      </script>
    ';
  }


}

/*
* Event Handling
*/
{
  // Add Actual Budget and Close Events (POCs)
  if( $_GET['display'] == 'POCAddActual' )
  {
    echo'
    <script>
      $("#Content").load("addActualBudget.php?display=' . $_GET['display'] . '&id=' . $_GET['id'] . '");
    </script>
    ';
  }

  // Add Actual Budget and Close Events Menu (POCs)
  if( $_POST['display'] == 'POCAction' || $_GET['display'] == 'POCAction' )
  {
    echo'
    <script>
      $("#Content").load("pocActionPending.php");
    </script>
    ';
  }

  // Checkin
  if( $_POST['display'] == 'Checkin' || $_GET['display'] == 'Checkin' )
  {
    echo'
      <script>
        $("#Content").load("checkinForm.php");
      </script>
    ';
  }

  // Create Event
  if( $_GET['display'] == 'CreateEvent' )
  {
    echo'
      <script>
        $("#Content").load("createEvent.php");
      </script>
    ';
  }

  // Show Current Events
  if( $_POST['display'] == 'Current' || $_GET['display'] == 'Current' )
  {
    echo'
      <script>
        $("#Content").load("current.php");
      </script>
    ';
  }

  // Edit Events (Admins)
  if( $_GET['display'] == 'EditEvent' )
  {
    echo'
    <script>
      $("#Content").load("editEvent.php?display=' . $_GET['display'] . '&id=' . $_GET['id'] . '");
    </script>
    ';
  }

  // Show All Events (Admins)
  if( $_POST['display'] == 'Events' || $_GET['display'] == 'Events' )
  {
    echo'
      <script>
        $("#Content").load("events.php");
      </script>
    ';
  }

  // Show Future Events
  if( $_POST['display'] == 'Future' || $_GET['display'] == 'Future' )
  {
    echo'
      <script>
        $("#Content").load("future.php");
      </script>
    ';
  }

  // My Events
  if( $_POST['display'] == 'MyEvents' || $_GET['display'] == 'MyEvents' )
  {
    echo'
      <script>
        $("#Content").load("myEvents.php");
      </script>
    ';
  }
}

/*
* Member Handling
*/
{
  // Show Create Member Form
  if( $_POST['display'] == 'CreateMember' || $_GET['display'] == 'CreateMember' )
  {
    echo'
      <script>
        $("#Content").load("createMember.php");
      </script>
    ';
  }
}

/*
* RSVP Handling
*/
{
  // Show cancellation confirmation
  if( $_POST['display'] == 'CancelRSVP' || $_GET['display'] == 'CancelRSVP' )
  {
    echo'
      <script>
        $("#Content").load("cancelRSVP.php?id=' . $_GET['id'] . '&eid=' . $_GET['eid'] . '");
      </script>
    ';
  }

  // Show My RSVPs
  if( $_POST['display'] == 'MyRSVP' || $_GET['display'] == 'MyRSVP' )
  {
    echo'
      <script>
        $("#Content").load("myRSVP.php?display=MyRSVP&enterpriseID=' . $_POST['enterpriseID'] . '");
      </script>
    ';
  }

  // RSVP Form
  if( $_POST['display'] == 'RSVP' || $_GET['display'] == 'RSVP' )
  {
    echo'
      <script>
        $("#Content").load("RSVPForm.php?id=' . $_GET['id'] . '");
      </script>
    ';
  }
}

/*
* Session Handling
*/
{
  // Login View
  if( $_GET['display'] == 'Login' )
  {
    echo'
      <script>
        $("#Content").load("login.php");
      </script>
    ';
  }

  // Login Posted
  if( $_POST['display'] == 'Login' )
  {
    echo'
      <script>
        $("#Content").load("login.php?username=' . $_POST['username'] . '&password=' . $_POST['password'] . '");
      </script>
    ';
  }

  // Logout
  if( $_GET['display'] == 'Logout' )
  {
    unset($_SESSION);
    session_destroy();

    echo '
      <script>
        window.location = "index.php";
      </script>
    ';
  }
}

/*
* Report Menu Handling
*/
{
  // Show Reports Menu (admin)
  if( $_POST['display'] == 'Reports' || $_GET['display'] == 'Reports' )
  {
    echo'
      <script>
        $("#Content").load("reports.php");
      </script>
    ';
  }
}

/*
* Membership Report Handling
*/
{
  // Show Membership Report 0 (admin)
  if( $_GET['display'] == 'MembershipReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=0");
      </script>
    ';
  }

  // Show Membership Report 1+ (admin)
  if( ($_GET['display'] == 'MembershipReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* Attendance Report Handling
*/
{
  // Show Attendance Report 0 (admin)
  if( $_GET['display'] == 'AttendanceReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("attendanceReport.php?report=0");
      </script>
    ';
  }

  // Show Attendance Report 1+ (admin)
  if( ($_GET['display'] == 'AttendanceReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("attendanceReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* Roles Report Handling
*/
{
  // Show Roles Report 0 (admin)
  if( $_GET['display'] == 'RolesReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=0");
      </script>
    ';
  }

  // Show Roles Report 1+ (admin)
  if( ($_GET['display'] == 'RolesReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* RSVP Report Handling
*/
{
  // Show RSVP Report 0 (admin)
  if( $_GET['display'] == 'RSVPReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("rsvpReport.php?report=0");
      </script>
    ';
  }

  // Show RSVP Report 1+ (admin)
  if( ($_GET['display'] == 'RSVPReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("rsvpReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* User Roles Handling
*/
{
  // Show Announcements
  if( $_POST['display'] == 'UserRoles' || $_GET['display'] == 'UserRoles' )
  {
    echo'
      <script>
        $("#Content").load("userRoles.php");
      </script>
    ';
  }
}

?>
