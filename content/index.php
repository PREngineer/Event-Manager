<?php

  session_start();

  // Include DB functions
  include '../functions/DB.php';

  // Include Session Init
  include '../functions/Init.php';

  // Redirect if settings was not found
  if( !file_exists('../functions/settings.php') )
  {
    echo '
      <script type="text/javascript">
        window.location.href = "../setup.php"
      </script>
    ';
  }

?>

<!DOCTYPE html>
<html lang="en">

  <!-- ******************* Head Section ******************* -->
  <head>
    <!-- Application Name -->
    <title>Event Manager</title>

    <!-- Encoding and Mobile First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="../theme/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="../theme/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
    <link href="../theme/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="../theme/css/jquery.timepicker.min.css" rel="stylesheet">

    <!-- Importing jQuery and other dependencies -->
    <script src="../theme/js/jquery-3.2.1.min.js"></script>
    <script src="../theme/js/bootstrap-datepicker.min.js"></script>
    <script src="../theme/js/jquery.timepicker.min.js"></script>
    <script src="../theme/js/BootstrapValidator.min.js"></script>
    <script src="../theme/js/validator.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="../theme/js/bootstrap.js"></script>
  </head>

  <body>

    <!-- ******************* NavBar Handler Section ******************* -->
    <script>
    $(document).ready(function(){
        $("a").click(function(){
          var url = $(this).attr("link");
          //window.alert(url.substr(url.lastIndexOf('/') + 1));
          $("#Content").load(url);
        });
    });
    </script>

    <!-- ******************* NavBar Section ******************* -->
    <a class="skip-navigation sr-only sr-only-focusable" href="#page-title">Skip Navigation</a>

	<div class="container">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle (hamburger) get grouped for better mobile display -->
          <div class="navbar-header">
            <!-- Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Brand icon -->
            <a class="navbar-brand" href="index.php">
              <img src="../images/logo.svg" width="30" height="30" alt="Logo">
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li id="announcementsLink">
                <a href="?action=Announcements" style="cursor: pointer;">Announcements</a>
              </li>
              <li id="currentLink">
                <a href="?action=current" style="cursor: pointer;">Current Events</a>
              </li>
              <li id="futureLink">
                <a href="?action=future" style="cursor: pointer;">Future Events</a>
              </li>
              <li id="createMemberLink">
                <a href="?action=createMember" style="cursor: pointer;">New Member</a>
              </li>
              <li id="myRSVP">
                <a href="?action=myRSVP" style="cursor: pointer;">My RSVPs</a>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
<?php

if( !isset($_SESSION['userRole']) )
{
  echo'
              <li id="loginLink">
                <a link="login.php" style="cursor: pointer;">Login</a>
              </li>
  ';
}
else if( $_SESSION['userRole'] == 1 )
{
  echo'
              <li id="approversLink">
                <a href="?action=approve" style="cursor: pointer;">Approvers</a>
              </li>
              <li id="loginLink">
                <a href="?action=logout" style="cursor: pointer;">Logout</a>
              </li>
  ';
}
else if( $_SESSION['userRole'] == 2 )
{
  echo'
              <li id="pocLink">
                <a link="pocs.php" style="cursor: pointer;">POCs</a>
              </li>
              <li id="loginLink">
                <a href="?action=logout" style="cursor: pointer;">Logout</a>
              </li>
  ';
}
else if( $_SESSION['userRole'] == 3 )
{
  echo'
              <li id="adminLink" class="dropdown">
                <a link="admin.php" style="cursor: pointer;">Administrators</a>
              </li>
              <li id="loginLink">
                <a href="?action=logout" style="cursor: pointer;">Logout</a>
              </li>
  ';
}

?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <!-- ******************* Actual Content Section ******************* -->
    <?php
    include '../functions/actions.php';
    ?>

    <div class="container" id="Content" name="Content" style="padding-top:40px;padding-bottom:30px;">
    </div>

<?php

    $events = get_CurrentEvents();

    if( sizeof($events) == 0 && empty($_GET) && empty($_POST) )
    {
      echo'
      <script>
      $(document).ready(function(){
          $("#Content").load("announcements.php");
      });
      </script>
      ';
    }
    else if( sizeof($events) >= 1 && empty($_GET) )
    {
      echo'
      <script>
      $(document).ready(function(){
          $("#Content").load("current.php");
      });
      </script>
      ';
    }
?>

    <!-- ******************* Footer Section ******************* -->
    <div class="container">
      <div class="nav navbar-inverse navbar-fixed-bottom">
        <p class="text-center text-muted">2017-<?php echo DATE("Y"); ?> My Company</p>
      </div>
    </div>

  </body>

</html>

<?php

// Include Form Submission Handler
include '../functions/SubmissionHandler.php';

?>
