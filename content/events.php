<title>Event Manager - Events Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$events = get_AllEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">All Events</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the events that have been created.</div>
  <div class="panel-body">
    <a link="index.php?display=CreateEvent" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Event</a>
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

<?php

  foreach ($events as $key => $value)
  {
    echo'
    <tr id="Entry' . $value[0] . '">

      <td>
        <a link="index.php?display=EditEvent&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i></a>
    ';
  if( $value[7] == 0 )
  {
    echo '
        <a link="approveEvent.php?display=Admin&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-ok" title="Approve" style="color: green"></i></a>
    ';
  }
  else
  {
    echo '
        <a link="disapproveEvent.php?display=Admin&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-remove" title="Disapprove" style="color: red"></i></a>
    ';
  }
  if( $value[10] == 0 )
  {
    echo '
        <a link="deleteEvent.php?display=Admin&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i></a>
    ';
  }
  else
  {
    echo '
        <a link="recoverEvent.php?display=Admin&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-magnet" title="Recover" style="color: green"></i></a>
    ';
  }
  echo '
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

      <td>
    ';
    if( $value[7] == 1 )
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
      ' . $value[8] . '
      </td>

      <td>
    ';
    if( $value[9] == "" )
    {
    echo '
              <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
    ';
    }
    else
    {
          echo $value[9];
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

    </tr>';
  }
?>
  </table>
