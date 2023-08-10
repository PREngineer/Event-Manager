<!-- Table -->
<title>Event Manager - Attendance Reports - All Attendance by Type</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

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
        <th>Type</th>
        <th>Amount</th>
        <th>%</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td style="color: blue;"><i class="glyphicon glyphicon-user" title="In person"></i>In Person</td>
        <td>' . $attendance[1] . '</td>
        <td>' . round( ($attendance[1]/$attendance[0])*100, 2 ) . '</td>
      </tr>
      <tr>
        <td style="color: gray;"><i class="glyphicon glyphicon-headphones" title="Remote"></i>Remote</td>
        <td>' . $attendance[2] . '</td>
        <td>' . round( ($attendance[2]/$attendance[0])*100, 2 ) . '</td>
      </tr>
      <tr style="background: lightgray;">
        <th>Totals</th>
        <th>' . ( $attendance[1] + $attendance[2] ) . '</th>
        <th>' . ( round( ($attendance[1]/$attendance[0])*100, 2 ) + round( ($attendance[2]/$attendance[0])*100, 2) ) . ' %</th>
        </tr>
    </tbody>
  </table>';

?>
