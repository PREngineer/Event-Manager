<title>Event Manager - Administrators</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Administrator</h1>

<hr>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><p>Welcome <?php echo $_SESSION['userID']; ?>!</p></div>
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
      <td><a link="index.php?display=AnnouncementsMenu" style="cursor:pointer;">Announcements</a></td>
      <td>
        Use this option to manage the announcements:<br>
        * Create<br>
        * Remove<br>
        * Edit<br>
        * Expire
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=Attendance" style="cursor:pointer;">Attendance</a></td>
      <td>
        Use this option to manage attendance related information:<br>
        * Add (outside of the event date)<br>
        * Remove<br>
        * Modify
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=Events" style="cursor:pointer;">Events</a></td>
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
      <td><a link="index.php?display=Members" style="cursor:pointer;">Members</a></td>
      <td>
        Use this option to manage the members of the Employee Resource Group:<br>
        * Add<br>
        * Remove<br>
        * Edit
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=Reports" style="cursor:pointer;">Reports</a></td>
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
      <td><a link="index.php?display=UserRoles" style="cursor:pointer;">User Roles</a></td>
      <td>
        Use this option to determine which members of the Employee Resource
        Group can have the following roles:<br>
        * Portal Administrator<br>
        * Point Of Contact<br>
        * Event Approver
      </td>
    </tr>
  </table>
