<?php

  // Include DB functions
  include '../functions/DB.php';

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
    <div class="container">
      <nav class="navbar navbar-inverse">
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
              <li id="currentLink">
                <a link="current.php" style="cursor: pointer;">Current Events</a>
              </li>
              <li id="futureLink">
                <a link="future.php" style="cursor: pointer;">Future Events</a>
              </li>
              <li id="createMemberLink">
                <a link="createMember.html" style="cursor: pointer;">New Member</a>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li id="approversLink">
                <a link="approvers.html" style="cursor: pointer;">Approvers</a>
              </li>
              <li id="pocLink" class="dropdown">
                <a class="dropdown-toggle" link="pocs.html" style="cursor: pointer;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  POCs <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a link="createEvent.php" style="cursor: pointer;">Create Event</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a link="pocList.html" style="cursor: pointer;">My Events</a></li>
                </ul>
              </li>
              <li id="adminLink" class="dropdown">
                <a link="admin.html" style="cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Administrators <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a link="adminMembers.html" style="cursor: pointer;">Manage Members</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a hlink="adminRoles.html" style="cursor: pointer;">Manage Roles</a></li>
                  <li><a link="adminEvent.html" style="cursor: pointer;">Manage Events</a></li>
                  <li><a link="adminAttendance.html" style="cursor: pointer;">Manage Attendance</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a link="adminReports.html" style="cursor: pointer;">Reports</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <!-- ******************* Actual Content Section ******************* -->
    <?php
    include '../functions/actions.php';
    ?>

    <div class="container" id="Content" name="Content">
      <h1>Hello World!</h1>
    </div>

<?php
    $events = get_CurrentEvents();

    if( sizeof($events) >= 1 && empty($_POST) )
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
      <div class="nav navbar-inverse">
        <p class="text-center text-muted">2017 My Company</p>
      </div>
    </div>

  </body>

</html>

<?php

// Include Form Submission Handler
include '../functions/SubmissionHandler.php';

  /*

  How to query

  $res = query_DB('SELECT * FROM `DIM Committee`');

  $dat = mysqli_fetch_all( $res['Data'] );

  foreach ($dat as $entry => $value)
  {
    echo $value[0] . ' ' . $value[1] . '<br>';
  }

  */

?>
