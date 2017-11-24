<?php
  // Include DB functions
  include '../functions/DB.php';
  session_start();

echo '
<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("currentLink").classList.remove("active");
  document.getElementById("futureLink").classList.remove("active");
  document.getElementById("createMemberLink").classList.remove("active");
  document.getElementById("loginLink").classList.remove("active");
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

  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
      <th>Option</th>
      <th>Description</th>
      <tr>
    </thead>
    <tr>
      <td><a href="?action=Members">Manage Members</a></td>
      <td>
        Use this option to manage the members of the Employee Resource Group.
        Use it to:<br>
        * Add Member<br>
        * Remove Member<br>
        * Edit Member Information
      </td>
    </tr>
    <tr>
      <td><a href="?action=Roles">Manage Roles</a></td>
      <td>
        Use this option to determine which members of the Employee Resource
        Group can have the following roles:<br>
        * Portal Administrator<br>
        * Point Of Contact<br>
        * Event Approver
      </td>
    </tr>
    <tr>
      <td><a href="?action=Events">Manage Events</a></td>
      <td>
        Use this option to manage the information currently stored in the
        database.  This gives you the option to perform the following event
        related actions:<br>
        * Create new event<br>
        * Delete / Recover existing event<br>
        * Modify existing event<br>
        * Approve / Disapprove existing event
      </td>
    </tr>
    <tr>
      <td><a href="?action=Attendance">Manage Attendance</a></td>
      <td>
        Use this option to manage attendance related information.
        This gives you the option to:<br>
        * Add entries outside of the event date
        * Remove entries
        * Modify entries
      </td>
    </tr>
    <tr>
      <td><a href="?action=Reports">Reports</a></td>
      <td>
        Use this option to view live or historical reports about the
        Employee Resource Group's:<br>
        * Membership<br>
        * Attendance<br>
        * Events
      </td>
    </tr>
  </table>
</div>
