<?php

include '../functions/DB.php';

$events = get_AllEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">All Events</h1>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the events that have been created.</div>
  <div class="panel-body">
    <a href="?action=createEvent"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Event</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-ok" title="Approve" style="color:green; padding-left:2em"></i> = Approve
    <i class="glyphicon glyphicon-remove" title="Disapprove" style="color:red; padding-left:2em"></i> = Disapprove
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
    <tr>

      <td>
        <a href="?action=editEvent&id=' . $value[0] . '"><i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i></a>
    ';
  if( $value[7] == 0 )
  {
    echo '
        <a href="approveEvent.php?id=' . $value[0] . '"><i class="glyphicon glyphicon-ok" title="Approve" style="color: green"></i></a>
    ';
  }
  else
  {
    echo '
        <a href="disapproveEvent.php?id=' . $value[0] . '"><i class="glyphicon glyphicon-remove" title="Disapprove" style="color: red"></i></a>
    ';
  }
  if( $value[10] == 0 )
  {
    echo '
        <a href="deleteEvent.php?id=' . $value[0] . '"><i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i></a>
    ';
  }
  else
  {
    echo '
        <a href="recoverEvent.php?id=' . $value[0] . '"><i class="glyphicon glyphicon-magnet" title="Recover" style="color: green"></i></a>
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
