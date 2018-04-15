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
    echo 'document.getElementById("pocLink").classList.add("active");';
  }
  if( $_SESSION['userRole'] == 3 )
  {
    echo 'document.getElementById("adminLink").classList.remove("active");';
  }

echo '</script>';

$events = get_MyEvents($_SESSION['userID']);

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">My Events</h1>

<ol class="breadcrumb">
  <li>
    <a href="?action=Poc">
      <i class="glyphicon glyphicon-arrow-left"></i> POC Menu
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the events that you have created.</div>
  <div class="panel-body">
    <a href="?action=createEvent"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Event</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i> = Delete
    <i class="glyphicon glyphicon-magnet" title="Recover" style="color:green; padding-left:2em"></i> = Recover
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
        In Person Code
      </th>

      <th>
        Remote Code
      </th>

      <th>
        Approved
      </th>

      <th>
        Estimated <i class="glyphicon glyphicon-usd" title="Estimated Budget" style="color:black"></i>
      </th>

      <th>
        Actual <i class="glyphicon glyphicon-usd" title="Actual Budget" style="color:black"></i>
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
        <a href="?action=editEvent&id=' . $value[0] . '"><i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i></a>
    ';
  if( $value[10] == 0 )
  {
    echo '
        <a href="deleteEvent.php?id=' . $value[0] . '&return=myEvents"><i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i></a>
    ';
  }
  else
  {
    echo '
        <a href="recoverEvent.php?id=' . $value[0] . '&return=myEvents"><i class="glyphicon glyphicon-magnet" title="Recover" style="color: green"></i></a>
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

</div>
