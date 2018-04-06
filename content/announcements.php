<?php

session_start();

include '../functions/DB.php';

//$events = get_Announcements();

//print_r($events);

echo '
<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("announcementsLink").classList.add("active");
  document.getElementById("currentLink").classList.remove("active");
  document.getElementById("futureLink").classList.remove("active");
  document.getElementById("createMemberLink").classList.remove("active");
  document.getElementById("loginLink").classList.remove("active");
  document.getElementById("myRSVP").classList.remove("active");
';

  if( $_SESSION['userRole'] == 1 )
  {
    echo 'document.getElementById("approversLink").classList.remove("active");';
  }
  if( $_SESSION['userRole'] == 2 )
  {
    echo 'document.getElementById("pocLink").classList.remove("active");';
  }
  if( $_SESSION['userRole'] == 3 )
  {
    echo 'document.getElementById("adminLink").classList.remove("active");';
  }

echo '</script>';

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Announcements</h1>

<div class="container">

<!-- Announcements go here -->

</div>
