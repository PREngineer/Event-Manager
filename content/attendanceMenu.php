<title>Event Manager - Attendance Management Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$announcements = get_Announcements();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Attendance</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
    </a>
  </li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><p>Welcome <?php echo $_SESSION['userID']; ?>!</p></div>
  <div class="panel-body">
    <p>
      Here, you can manage attendance entries.
    </p>
    <p>
      For example, if somebody forgot to register but they attended, you can add their attendance outside of the open time-frame.
    </p>
    <p>
      Also, if somebody registered but didn't really attend.  You can delete that entry.
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
    <td><a link="index.php?display=AttendanceByMember" style="cursor:pointer;">Look up member</a></td>
    <td>
      To view and manage all the attendance entries of a member.
    </td>
  </tr>

  <tr>
    <td><a link="index.php?display=AttendanceByEvent" style="cursor:pointer;">Look up event</a></td>
    <td>
      To view and manage all the attendance entries in a specific event.
    </td>
  </tr>

</table>
