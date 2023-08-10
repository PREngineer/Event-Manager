<title>Event Manager - Reports Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Reports</h1>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
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
      <td><a link="index.php?display=AttendanceReport" style="cursor:pointer;">Attendance</a></td>
      <td>
        Provides details about the attendance to events.
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=BudgetReport" style="cursor:pointer;">Budget</a></td>
      <td>
        Provides details about the budget and expenses.
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=MembershipReport&report=0" style="cursor:pointer;">Membership</a></td>
      <td>
        Provides details about the ERG members.
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=RolesReport" style="cursor:pointer;">Roles</a></td>
      <td>
        Provides details about members that have special roles in the portal.
      </td>
    </tr>

    <tr>
      <td><a link="index.php?display=RSVPReport" style="cursor:pointer;">RSVPs</a></td>
      <td>
        Provides details about RSVPs to events.
      </td>
    </tr>

  </table>
