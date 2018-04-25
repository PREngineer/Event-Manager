<!-- Table -->
<title>Event Manager - Attendance Reports - All Attendance by Type</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  $attendance = get_AllAttendanceByTypeOverview()[0];

  if( sizeof($attendance) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no attendance entries in the platform at the moment.</h3>
    </div>
    ';
  }

  echo '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Events</th>
        <th style="color: blue;"><i class="glyphicon glyphicon-user" title="In person"></i>In Person</th>
        <th style="color: blue;"><i class="glyphicon glyphicon-user" title="In person percentage"></i>In Person%</th>
        <th style="color: gray;"><i class="glyphicon glyphicon-headphones" title="Remote"></i>Remote</th>
        <th style="color: gray;"><i class="glyphicon glyphicon-headphones" title="Remote percentage"></i>Remote%</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>' . $attendance[0] . '</td>
        <td>' . $attendance[1] . '</td>
        <td>' . round( ($attendance[1]/$attendance[0])*100, 2) . '</td>
        <td>' . $attendance[2] . '</td>
        <td>' . round( ($attendance[2]/$attendance[0])*100, 2) . '</td>
        <td>' . ( round( ($attendance[1]/$attendance[0])*100, 2) + round( ($attendance[2]/$attendance[0])*100, 2) ) . ' %</td>
      </tr>
    </tbody>
  </table>';

?>
