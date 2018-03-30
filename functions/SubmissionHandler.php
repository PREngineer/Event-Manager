<?php

// Handle Form Submissions

// All Events (Admins)
if( $_POST['action'] == 'Events' || $_GET['action'] == 'Events' )
{
  echo'
    <script>
      $("#Content").load("events.php");
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

// Create Member
if( $_POST['action'] == 'createMember' || $_GET['action'] == 'createMember' )
{
  echo'
    <script>
      $("#Content").load("createMember.html");
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

// My Events
if( $_POST['action'] == 'myEvents' || $_GET['action'] == 'myEvents' )
{
  echo'
    <script>
      $("#Content").load("myEvents.php");
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

// Show My RSVPs
if( $_POST['action'] == 'myRSVP' || $_GET['action'] == 'myRSVP' )
{
  echo'
    <script>
      $("#Content").load("myRSVP.php?action=myRSVP&enterpriseID=' . $_POST['enterpriseID'] . '");
    </script>
  ';
}

//print_r($_POST);

?>
