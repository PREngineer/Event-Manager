<title>Event Manager - Membership Management Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$members = get_AllMembers();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Membership</h1>

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
  <div class="panel-heading">Here are all the membership options.</div>
  <div class="panel-body">
    <a link="index.php?display=CreateMember" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Member</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i> = Delete
  </div>
</div>

  <!-- Table -->
  <table class="table">

    <thead>
      <th>
        Options
      </th>

      <th>
        EntepriseID
      </th>

      <th>
        First Name
      </th>

      <th>
        Initials
      </th>

      <th>
        Last Name
      </th>

      <th>
        Level
      </th>

      <th>
        Title
      </th>

      <th>
        Segment
      </th>

      <th>
        E-mail
      </th>

      <th>
        Newsletter
      </th>

      <th>
        Volunteer
      </th>

      <th>
        Active
      </th>

      <th>
        Lead
      </th>

      <th>
        Role
      </th>

    </thead>

    <tbody>
      <?php
      foreach ($members as $key => $value)
      {
        echo'
        <tr id="Entry' . $value[0] . '">

          <td>
            <a link="index.php?display=EditMember&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i></a>
            <a link="deleteMember.php?display=Members&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i></a>
          </td>

          <td>
          ' . $value[1] . '
          </td>

          <td>
          ' . $value[2] . '
          </td>

          <td>
          ' . $value[3] . '
          </td>

          <td>
          ' . $value[4] . '
          </td>

          <td>
          ' . $value[5] . '
          </td>

          <td>
          ' . $value[6] . '
          </td>

          <td
        ';
        if( $value[7] == 'Federal' )
        {
          echo ' style="color: red;">Federal';
        }
        else
        {
          echo ' style="color: green;">LLP';
        }
        echo '
          </td>

          <td>
          ' . $value[8] . '
          </td>

          <td>
        ';
        if( $value[9] == 0 )
        {
        echo '
              <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
        ';
        }
        else
        {
          echo '
              <i class="glyphicon glyphicon-ok-sign" title="Yes" style="color:green"></i>
          ';
        }
        echo '
          </td>

          <td>
        ';
          if( $value[10] == 1 )
          {
            echo '
                <i class="glyphicon glyphicon-ok-sign" title="Yes" style="color:green"></i>
            ';
          }
          else
          {
            echo '
                <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
            ';
          }
        echo '
          </td>

          <td>
        ';
          if( $value[11] == 1 )
          {
            echo '
                <i class="glyphicon glyphicon-ok-sign" title="Yes" style="color:green"></i>
            ';
          }
          else
          {
            echo '
                <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
            ';
          }
        echo '
          </td>

          <td>
        ';
          if( $value[12] == 1 )
          {
            echo '
                <i class="glyphicon glyphicon-ok-sign" title="Yes" style="color:green"></i>
            ';
          }
          else
          {
            echo '
                <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
            ';
          }
        echo '
          </td>

          <td>
        ';
          if( $value[13] == 0 )
          {
            echo '
                <i class="glyphicon glyphicon-user" title="User" style="color:green"></i>
            ';
          }
          elseif( $value[13] == 1 )
          {
            echo '
                <i class="glyphicon glyphicon-user" title="Approver" style="color:orange"></i>
            ';
          }
          else
          {
            echo '
                <i class="glyphicon glyphicon-user" title="Admin" style="color:red"></i>
            ';
          }
        echo '
          </td>

        </tr>';
      }
      ?>
    </tbody>

  </table>
