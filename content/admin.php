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
    echo 'document.getElementById("pocLink").classList.remove("active");';
  }
  if( $_SESSION['userRole'] == 3 )
  {
    echo 'document.getElementById("adminLink").classList.add("active");';
  }

echo '</script>';

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Administrator</h1>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Welcome to your administration menu!</div>
  <div class="panel-body">
    <p>
      Being an administrator gives you plenty of control and power over the information
      that is received and managed by this web application.  Please read about the different
      options available to you if this is your first time.
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
      <td><a href="?action=AnnouncementsMenu">Announcements</a></td>
      <td>
        Use this option to manage the announcements:<br>
        * Create<br>
        * Remove<br>
        * Edit<br>
        * Expire
      </td>
    </tr>

    <tr>
      <td><a href="?action=Attendance">Attendance</a></td>
      <td>
        Use this option to manage attendance related information:<br>
        * Add (outside of the event date)<br>
        * Remove<br>
        * Modify
      </td>
    </tr>

    <tr>
      <td><a href="?action=Events">Events</a></td>
      <td>
        Use this option to manage the information currently stored in the
        database:<br>
        * Create<br>
        * Delete / Recover<br>
        * Modify<br>
        * Approve / Disapprove
      </td>
    </tr>

    <tr>
      <td><a href="?action=Members">Members</a></td>
      <td>
        Use this option to manage the members of the Employee Resource Group:<br>
        * Add<br>
        * Remove<br>
        * Edit
      </td>
    </tr>

    <tr>
      <td><a href="?action=Reports">Reports</a></td>
      <td>
        Use this option to view live or historical reports about the
        Employee Resource Group's:<br>
        * Membership<br>
        * Attendance<br>
        * Events<br>
        * Others
      </td>
    </tr>

    <tr>
      <td><a href="?action=UserRoles">User Roles</a></td>
      <td>
        Use this option to determine which members of the Employee Resource
        Group can have the following roles:<br>
        * Portal Administrator<br>
        * Point Of Contact<br>
        * Event Approver
      </td>
    </tr>
  </table>
