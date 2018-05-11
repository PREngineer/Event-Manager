<?php

  // Include Session Init
  include '../functions/Init.php';
  // Include DB functions
  include '../functions/DB.php';

?>

<!DOCTYPE html>
<html lang="en">

<!-- ******************* Head Section ******************* -->
  <head>
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

    <!-- PWA Manifest -->
  	<link rel="manifest" href="manifest.json">
  	<script src="manup.js"></script>

  	<!-- Service Worker Files -->
  	<script src="sw.js"></script>
  	<script src="sw-reg.js"></script>

  	<!-- Generic App Information -->
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="A Progressive Web Application">
  	<meta name="author" content="Jorge Pabon">

  	<!-- Basic Mobile Information -->
  	<link rel="icon" sizes="192x192" href="../images/TLogo.png">
  	<meta name="mobile-web-app-capable" content="yes">
  	<meta name="theme-color" content="#2196F3">

  	<!-- For Apple Devices -->
  	<meta name="apple-mobile-web-app-capable" content="yes">
  	<meta name="application-name" content="EM">
  	<meta name="apple-mobile-web-app-status-bar-style" content="black">
  	<meta name="apple-mobile-web-app-title" content="EM">
  	<link rel="apple-touch-icon" href="../images/Logo.png">

  	<!-- For Microsoft Devices -->
  	<meta name="msapplication-TileImage" content="../images/TLogo.png">
  	<meta name="msapplication-TileColor" content="#2196F3">

  	<!-- ... -->
  	<meta property="og:title" content="EM">
  	<meta property="og:type" content="website">
  	<meta property="og:image" content="../images/TLogo.png">
  	<meta property="og:url" content="https://pwa.eastus.cloudapp.azure.com/MELT/">
  	<meta property="og:description" content="A Progressive Web App">

  	<!-- Twitter References -->
  	<meta name="twitter:card" content="summary">
  	<meta name="twitter:url" content="https://pwa.eastus.cloudapp.azure.com/MELT/">
  	<meta name="twitter:title" content="EM">
  	<meta name="twitter:description" content="Event Manager. No install, just use it right away in your browser!">
  	<meta name="twitter:image" content="../images/TLogo.png">
  	<meta name="twitter:creator" content=@PianistaPR>

  </head>

  <body>

    <a class="skip-navigation sr-only sr-only-focusable" href="#page-title">Skip Navigation</a>

<!-- ******************* NavBar Section ******************* -->
<?php include 'layout/NavBar.php'; ?>

<!-- ******************* Content Section ******************* -->
<?php

  // Include Alerts and Actions
  include '../functions/Alerts.php';

  // For testing purposes
  /*echo '<br><br><br><br>POST: ';
  print_r($_POST);
  echo '<br>GET: ';
  print_r($_GET);*/
?>

    <div class="container" id="Content" name="Content" style="padding-top:40px;padding-bottom:30px;"></div>

<?php

    $events = get_CurrentEvents();

    //*** Decide what to load on fresh start ***//
    // If there is no get passed and there are no events:
    // Redirect to the Announcements
    if( sizeof($events) == 0 && empty($_GET) )
    {
      echo'
      <script>
      $(document).ready(function()
      {
          window.location.href = "index.php?display=Announcements";
      });
      </script>
      ';
    }
    // If there are Events and there is no get:
    // Redirect to the Current Events
    else if( sizeof($events) >= 1 && empty($_GET) )
    {
      echo'
      <script>
      $(document).ready(function()
      {
          window.location.href = "index.php?display=Current";
      });
      </script>
      ';
    }

    // The Footer section
    include 'layout/Footer.php';
?>

  </body>

</html>

<?php

  // Include Form Submission Handler
  include '../functions/Displayer.php';

?>
