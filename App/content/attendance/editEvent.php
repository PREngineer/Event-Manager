<title>Event Manager - Attendance - List Event Entries</title>

<?php

include '../../functions/Init.php';
include '../../functions/DB.php';
include '../layout/LinkHandler.php';

protectAdmin();

$attendance = get_EventAttendance($_GET['event']);

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Attendance - List Event Entries</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
  <li>
    <a link="index.php?display=Attendance" style="cursor:pointer;">
      Attendance
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">People that checked in to the event <b><?php echo str_replace("|", " ", $_GET['name']); ?></b>.</div>
    <div class="panel-body">
      <a link="index.php?display=Attendance-EventNewEntry&event=<?php echo $_GET['event']; ?>&name=<?php echo $_GET['name']; ?>" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Entry"></i> New Entry</a>
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
        Enterprise ID
      </th>

      <th>
        Type
      </th>

      <th>
        Checked In
      </th>

    </thead>

<?php

  foreach ($attendance as $key => $value)
  {
    echo'
    <tr id="Entry' . $value[0] . '">

    <td>
      <a link="index.php?display=Attendance-EventEditEntry&id=' . $value[0] .
              '&return=Attendance-EditEvent&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&EnterpriseID=' .
              $value[2] . '&Type=' . $value[3] . '" style="cursor:pointer;">
        <i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i>
      </a>
      <a link="attendance/deleteEntry.php?id=' . $value[0] .
              '&display=Attendance-EditEvent&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&init=sub" style="cursor:pointer;">
        <i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i>
      </a>
    </td>

      <td>
      ' . $value[2] . '
      </td>

      <td>
    ';
    if( $value[3] == 0 )
    {
      echo '
          <i class="glyphicon glyphicon-user" title="Yes" style="color:gray"></i>
      ';
    }
    else
    {
      echo '
          <i class="glyphicon glyphicon-headphones" title="No" style="color:blue"></i>
      ';
    }
    echo '
      </td>

      <td>
      ' . $value[4] . '
      </td>

    </tr>';
  }
?>
  </table>
