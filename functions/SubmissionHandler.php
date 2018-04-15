<?php

/*
This contains the form submission handlers as well as the get submission handlers.

This is used to determine which element will be loaded into the center of the page.
*/

/*
* Roles Specific Handling
*/
{
  // Show POC page
  if( $_GET['action'] == 'Poc' )
  {
    echo'
      <script>
        $("#Content").load("pocs.php");
      </script>
    ';
  }

  // Show Admins page
  if( $_GET['action'] == 'Admin' )
  {
    echo'
      <script>
        $("#Content").load("admin.php");
      </script>
    ';
  }
}

/*
* Announcement Handling
*/
{
  // Show Announcements
  if( $_POST['action'] == 'Announcements' || $_GET['action'] == 'Announcements' )
  {
    echo'
      <script>
        $("#Content").load("announcements.php?action=Announcements");
      </script>
    ';
  }

  // Show Announcements Menu (admin)
  if( $_POST['action'] == 'AnnouncementsMenu' || $_GET['action'] == 'AnnouncementsMenu' )
  {
    echo'
      <script>
        $("#Content").load("announcementsMenu.php?action=AnnouncementsMenu");
      </script>
    ';
  }

  // Create Announcement (admin)
  if( $_POST['action'] == 'createAnnouncement' || $_GET['action'] == 'createAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("createAnnouncement.php?action=createAnnouncement");
      </script>
    ';
  }

  // Edit Announcement (admin)
  if( $_POST['action'] == 'editAnnouncement' || $_GET['action'] == 'editAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("editAnnouncement.php?action=editAnnouncement&id=' . $_GET['id'] . '");
      </script>
    ';
  }
}

/*
* Event Handling
*/
{
  // Checkin
  if( $_POST['action'] == 'checkin' || $_GET['action'] == 'checkin' )
  {
    echo'
      <script>
        $("#Content").load("checkinForm.php");
      </script>
    ';
  }

  // Create Event
  if( $_POST['action'] == 'createEvent' || $_GET['action'] == 'createEvent' )
  {
    echo'
      <script>
        $("#Content").load("createEvent.php");
      </script>
    ';
  }

  // Show Current Events
  if( $_POST['action'] == 'current' || $_GET['action'] == 'current' )
  {
    echo'
      <script>
        $("#Content").load("current.php");
      </script>
    ';
  }

  // Edit Events (Admins)
  if( $_POST['action'] == 'editEvent' || $_GET['action'] == 'editEvent' )
  {
    echo'
    <script>
      $("#Content").load("editEvent.php?id=' . $_GET['id'] . '");
    </script>
    ';
  }

  // Show All Events (Admins)
  if( $_POST['action'] == 'Events' || $_GET['action'] == 'Events' )
  {
    echo'
      <script>
        $("#Content").load("events.php");
      </script>
    ';
  }

  // Show Future Events
  if( $_POST['action'] == 'future' || $_GET['action'] == 'future' )
  {
    echo'
      <script>
        $("#Content").load("future.php");
      </script>
    ';
  }

  // Approver's Menu
  if( $_POST['action'] == 'myEvents' || $_GET['action'] == 'approve' )
  {
    echo'
      <script>
        $("#Content").load("approvers.php");
      </script>
    ';
  }

  // My Events
  if( $_POST['action'] == 'myEvents' || $_GET['action'] == 'myEvents' )
  {
    echo'
      <script>
        $("#Content").load("myEvents.php");
      </script>
    ';
  }
}

/*
* RSVP Handling
*/
{
  // Show cancellation confirmation
  if( $_POST['action'] == 'cancelRSVP' || $_GET['action'] == 'cancelRSVP' )
  {
    echo'
      <script>
        $("#Content").load("cancelRSVP.php?id=' . $_GET['id'] . '&eid=' . $_GET['eid'] . '");
      </script>
    ';
  }

  // Show My RSVPs
  if( $_POST['action'] == 'myRSVP' || $_GET['action'] == 'myRSVP' )
  {
    echo'
      <script>
        $("#Content").load("myRSVP.php?action=myRSVP&enterpriseID=' . $_POST['enterpriseID'] . '");
      </script>
    ';
  }

  // RSVP Form
  if( $_POST['action'] == 'RSVP' || $_GET['action'] == 'RSVP' )
  {
    echo'
      <script>
        $("#Content").load("RSVPForm.php");
      </script>
    ';
  }
}

/*
* RSVP Handling
*/
{
  // Show Create Member Form
  if( $_POST['action'] == 'createMember' || $_GET['action'] == 'createMember' )
  {
    echo'
      <script>
        $("#Content").load("createMember.php");
      </script>
    ';
  }
}

/*
* Session Handling
*/
{
  // Login
  if( $_POST['action'] == 'login')
  {
    echo'
      <script>
        $("#Content").load("login.php");
      </script>
    ';

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $res = login($user, $pass);

    if( $res['Result'] )
    {
      $userdata = mysqli_fetch_all( $res['Data'] )[0];

      $_SESSION['userID'] = $userdata[0];
      $_SESSION['userRole'] = $userdata[1];

      echo '
      <script>
        window.location = "index.php";
      </script>
      ';
    }
  }

  // Logout
  if( $_GET['action'] == 'logout' )
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
* Membership Report Handling
*/
{
  // Show Reports Menu (admin)
  if( $_POST['action'] == 'Reports' || $_GET['action'] == 'Reports' )
  {
    echo'
      <script>
        $("#Content").load("reports.php");
      </script>
    ';
  }

  // Show Member Default Report (admin)
  if( ($_GET['action'] == 'MembersReport') && ($_GET['report'] == 0) )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=0");
      </script>
    ';
  }

  // Show Members Report (admin)
  if( $_GET['action'] == 'MembersReport' && $_GET['report'] == 1 )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=1");
      </script>
    ';
  }

  // Show Members Report (admin)
  if( $_GET['action'] == 'MembersReport' && $_GET['report'] == 2 )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=2");
      </script>
    ';
  }
}

/*
* Attendance Report Handling
*/
{
  // Show Attendance Report (admin)
  if( $_GET['action'] == 'AttendanceReport' )
  {
    echo'
      <script>
        $("#Content").load("attendanceReport.php");
      </script>
    ';
  }

  // Show Member Default Report (admin)
  if( ($_GET['action'] == 'AttendanceReport') && ($_GET['report'] == 0) )
  {
    echo'
      <script>
        $("#Content").load("attendaceReport.php?report=0");
      </script>
    ';
  }

  // Show Member Default Report (admin)
  if( ($_GET['action'] == 'AttendanceReport') && ($_GET['report'] == 1) )
  {
    echo'
      <script>
        $("#Content").load("attendaceReport.php?report=1");
      </script>
    ';
  }

  // Show Member Default Report (admin)
  if( ($_GET['action'] == 'AttendanceReport') && ($_GET['report'] == 2) )
  {
    echo'
      <script>
        $("#Content").load("attendaceReport.php?report=2");
      </script>
    ';
  }
}

/*
* Roles Report Handling
*/
{
  // Show Roles Report (admin)
  if( $_GET['action'] == 'RolesReport' )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php");
      </script>
    ';
  }

  // Show Roles Default Report (admin)
  if( ($_GET['action'] == 'RolesReport') && ($_GET['report'] == 0) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=0");
      </script>
    ';
  }

  // Show Roles Report 1 (admin)
  if( ($_GET['action'] == 'RolesReport') && ($_GET['report'] == 1) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=1");
      </script>
    ';
  }

  // Show Roles Report 2 (admin)
  if( ($_GET['action'] == 'RolesReport') && ($_GET['report'] == 2) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=2");
      </script>
    ';
  }
}

/*
* RSVP Report Handling
*/
{
  // Show RSVP Report (admin)
  if( $_GET['action'] == 'RSVPReport' )
  {
    echo'
      <script>
        $("#Content").load("rsvpReport.php");
      </script>
    ';
  }

}

?>
