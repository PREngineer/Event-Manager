<?php

// Handle Form Submissions

// Create Member
if( $_POST['action'] == 'createMember' || $_GET['action'] == 'createMember' )
{
  echo'
<script>
$("#Content").load("createMember.html");
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

// My Events
if( $_POST['action'] == 'myEvents' || $_GET['action'] == 'myEvents' )
{
  echo'
<script>
$("#Content").load("myEvents.php");
</script>
  ';
}

// All Events (Admins)
if( $_POST['action'] == 'Events' || $_GET['action'] == 'Events' )
{
  echo'
<script>
$("#Content").load("events.php");
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
  session_destroy();

  echo '
  <script>
    window.location = "index.php";
  </script>
  ';
}

//print_r($_POST);

?>
