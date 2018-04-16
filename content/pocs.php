<?php
  // Include DB functions
  include '../functions/DB.php';
  session_start();

echo '
<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("announcementsLink").classList.remove("active");
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
    echo 'document.getElementById("pocLink").classList.add("active");';
  }
  if( $_SESSION['userRole'] == 3 )
  {
    echo 'document.getElementById("adminLink").classList.remove("active");';
  }

echo '</script>';

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Point Of Contact</h1>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Welcome to your menu!</div>
  <div class="panel-body">
    <p>
      As a Point Of Contact, you have the options to create and manage events
      that have been created by you.  Please read about the options that you
      have available.
    </p>
  </div>
</div>

  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
      <th>Option</th>
      <th>Description</th>
      <tr>
    </thead>
    <tr>
      <td><a href="?action=createEvent">Create Event</a></td>
      <td>
        Use this option to create a New Event.
      </td>
    </tr>
    <tr>
      <td><a href="?action=myEvents">My Events</a></td>
      <td>
        Use this option to view and manage your events.  You can perform the
        following actions on your existing events:<br>
        * Edit its details before the event occurs<br>
        * Delete an event before it occurs<br>
        * View all the events that you have created
      </td>
    </tr>
  </table>
