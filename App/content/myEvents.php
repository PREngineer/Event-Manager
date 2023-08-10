<title>Event Manager - My Events</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectPoc();

$events = get_MyEvents($_SESSION['userID']);

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">My Events</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Poc" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> POC Menu
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the events that you have created.</div>
  <div class="panel-body">
    <a link="index.php?display=CreateEvent" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Event</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
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

  <tbody>

<?php

if( sizeof($events) == 0 )
{
  echo '
  <div class="container">
    <h2>There are no future events created by you.</h2>
  </div>
  ';
}
else
{
  foreach ($events as $key => $value)
  {
    echo'
    <tr>

      <td>
        <a link="index.php?display=EditEvent&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i></a>
    ';
  if( $value[10] == 0 )
  {
    echo '
        <a link="deleteEvent.php?id=' . $value[0] . '&display=Poc" style="cursor:pointer;"><i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i></a>
    ';
  }
  else
  {
    echo '
        <a link="recoverEvent.php?id=' . $value[0] . '&display=Poc" style="cursor:pointer;"><i class="glyphicon glyphicon-magnet" title="Recover" style="color: green"></i></a>
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
}

?>

  </tbody>

</table>
