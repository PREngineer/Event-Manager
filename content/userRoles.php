<title>Event Manager - User Roles Management Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$users = get_AllRoles();
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
    <a href="?action=createRole"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Role</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i> = Delete
  </div>
</div>

<!-- Table -->
<table class="table">

  <thead>

    <tr>

      <th>
        Options
      </th>

      <th>
        Username
      </th>

      <th>
        Role
      </th>

    </tr>

  </thead>

  <tbody>
    <?php
    foreach ($users as $name => $value)
    {
      echo '
    <tr>
      <td>
        <a href="?action=editRole"><i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i></a>
        <a href="?action=deleteRole"><i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i></a>
      </td>

      <td>
        ' . $value[0] . '
      </td>

      <td>
      ';

      if( $value[2] == 0)
      {
        echo '<i class="glyphicon glyphicon-star" title="No" style="color:gray;"> Member</i>';
      }
      else if( $value[2] == 1)
      {
        echo '<i class="glyphicon glyphicon-star" title="Yes" style="color:green;"> Approver</i>';
      }
      else if( $value[2] == 2)
      {
        echo '<i class="glyphicon glyphicon-star" title="Yes" style="color:darkorange;"> Point Of Contact</i>';
      }
      else if( $value[2] == 3)
      {
        echo '<i class="glyphicon glyphicon-star" title="Yes" style="color:red;"> Administrator</i>';
      }
      echo '
      </td>
    </tr>';
    }
    ?>
  </tbody>

</table>
