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

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Reports</h1>

<ol class="breadcrumb">
  <li>
    <a href="?action=Admin">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Welcome to your reports dashboard!</div>
  <div class="panel-body">
    <p>
      Here's the core of the portal.  You will find highlights as well as detailed information.
    </p>
  </div>

  <!-- Table -->
  <table class="table">

    <thead>
      <tr>
      <th>Report</th>
      <th>Description</th>
      <tr>
    </thead>

    <tr>
      <td><a href="?action=AttendanceReport">Attendance</a></td>
      <td>
        Provides details about the attendance to events.
      </td>
    </tr>

    <tr>
      <td><a href="?action=MembersReport">Members</a></td>
      <td>
        Provides details about the ERG members.
      </td>
    </tr>

    <tr>
      <td><a href="?action=RolesReport">Roles</a></td>
      <td>
        Provides details about members that special roles in the portal.
      </td>
    </tr>

    <tr>
      <td><a href="?action=RSVPReport">RSVPs</a></td>
      <td>
        Provides details about RSVPs to events.
      </td>
    </tr>

  </table>
</div>
