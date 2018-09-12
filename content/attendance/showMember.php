<title>Event Manager - Attendance - Member Attendance</title>

<?php

include '../../functions/Init.php';
include '../../functions/DB.php';
include '../layout/LinkHandler.php';

protectAdmin();

$attendance = get_MemberAttendance($_GET['eid']);
$events = get_AllEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Attendance - Member Attendance</h1>

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
  <li>
    <a link="index.php?display=AttendanceByMember" style="cursor:pointer;">
      All Members
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Complete attendance history for <b><?php echo $_GET['eid']; ?></b>.</div>
    <div class="panel-body">
      <a link="index.php?display=Attendance-MemberNewEntry&eid=<?php echo $_GET['eid']; ?>" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Entry"></i> New Entry</a>
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
        Event
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
      <a link="index.php?display=Attendance-MemberEditEntry&id=' . $value[0] .
              '&return=Attendance-EditMember&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&EnterpriseID=' .
              $value[2] . '&Type=' . $value[3] . '" style="cursor:pointer;">
        <i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i>
      </a>
      <a link="attendance/deleteEntry.php?id=' . $value[0] .
              '&display=Attendance-EditMember&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&init=sub" style="cursor:pointer;">
        <i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i>
      </a>
    </td>

      <td>
      ' . $value[2] . '
      </td>
      ';

    foreach($events as $key2 => $value2)
    {
      if($value[1] == $value2[0])
      {
        echo '
            <td>
            ' . $value2[1] . '
            </td>
        ';
      }
    }

echo '
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
