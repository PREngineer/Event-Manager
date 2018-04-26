<!-- Table -->
<title>Event Manager - Attendance Reports - All Attendance by Career Level</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $attendance = get_AllAttendanceTotalsByCareerLevel()[0];
  $total = ($attendance[0] + $attendance[1] + $attendance[2] + $attendance[3] + $attendance[4] + $attendance[5] + $attendance[6] + $attendance[7] + $attendance[8] + $attendance[9]);

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
        <th>Career Level</th>
        <th>Amount</th>
        <th>%</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>Leadership</td>
        <td>' . $attendance[0] . '</td>
        <td>' . round((($attendance[0]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 6</td>
        <td>' . $attendance[1] . '</td>
        <td>' . round((($attendance[1]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 7</td>
        <td>' . $attendance[2] . '</td>
        <td>' . round((($attendance[2]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 8</td>
        <td>' . $attendance[3] . '</td>
        <td>' . round((($attendance[3]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 9</td>
        <td>' . $attendance[4] . '</td>
        <td>' . round((($attendance[4]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 10</td>
        <td>' . $attendance[5] . '</td>
        <td>' . round((($attendance[5]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 11</td>
        <td>' . $attendance[6] . '</td>
        <td>' . round((($attendance[6]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 12</td>
        <td>' . $attendance[7] . '</td>
        <td>' . round((($attendance[7]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 13</td>
        <td>' . $attendance[8] . '</td>
        <td>' . round((($attendance[8]/$total)*100),2) . '</td>
      </tr>
      <tr>
        <td>CL 14</td>
        <td>' . $attendance[9] . '</td>
        <td>' . round((($attendance[9]/$total)*100),2) . '</td>
      </tr>
      <tr style="background: lightgray;">
        <th>Total Attendance Registered</th>
        <th>' . $total . '</th>
        <th>' . round((($total/$total)*100),2) . '%</th>
      </tr>
    </tbody>
  </table>';

?>
