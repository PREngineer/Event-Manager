<title>Event Manager - User Roles Management Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">User Roles</h1>

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
  <div class="panel-heading">Here are all the platform users and their roles.</div>
  <div class="panel-body">
    <a href="?action=createEvent"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Role</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-ok" title="Approve" style="color:green; padding-left:2em"></i> = Approve
    <i class="glyphicon glyphicon-remove" title="Disapprove" style="color:red; padding-left:2em"></i> = Disapprove
    <i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i> = Delete
    <i class="glyphicon glyphicon-magnet" title="Recover" style="color:green; padding-left:2em"></i> = Recover
  </div>
</div>

<!-- Table -->
<table class="table">

  <thead>
    <th>
      Options
    </th>

    <th>
      Name
    </th>

    <th>
      Date
    </th>

    <th>
      Created
    </th>

    <th>
      Creator
    </th>

    <th>
      <i class="glyphicon glyphicon-user" title="In Person Code" style="color:black"></i> Code
    </th>

    <th>
      <i class="glyphicon glyphicon-headphones" title="Remote Code" style="color:black"></i> Code
    </th>

    <th>
      Approved
    </th>

    <th>
      <i class="glyphicon glyphicon-flag" title="Estimated Budget" style="color:blue"><i class="glyphicon glyphicon-usd" title="Estimated Budget" style="color:black"></i></i>
    </th>

    <th>
      <i class="glyphicon glyphicon-ok" title="Actual Budget" style="color:green"><i class="glyphicon glyphicon-usd" title="Actual Budget" style="color:black"></i></i>
    </th>

    <th>
      Deleted
    </th>

  </thead>

</table>
