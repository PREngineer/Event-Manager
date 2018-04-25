<!-- Table -->
<title>Event Manager - Attendance Reports - Attendance by Career Level</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  $attendance = get_attendanceByCareerLevel()[0];

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
        <th>Leadership</th>
        <th>CL 6</th>
        <th>CL 7</th>
        <th>CL 8</th>
        <th>CL 9</th>
        <th>CL 10</th>
        <th>CL 11</th>
        <th>CL 12</th>
        <th>CL 13</th>
        <th>CL 14</th>
        <th>Total Attendance Registered</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>' . $attendance[0] . '</td>
        <td>' . $attendance[1] . '</td>
        <td>' . $attendance[2] . '</td>
        <td>' . $attendance[3] . '</td>
        <td>' . $attendance[4] . '</td>
        <td>' . $attendance[5] . '</td>
        <td>' . $attendance[6] . '</td>
        <td>' . $attendance[7] . '</td>
        <td>' . $attendance[8] . '</td>
        <td>' . $attendance[9] . '</td>
        <td>' . ($attendance[0] + $attendance[1] + $attendance[2] + $attendance[3] + $attendance[4] + $attendance[5] + $attendance[6] + $attendance[7] + $attendance[8] + $attendance[9]) . '</td>
      </tr>
    </tbody>
  </table>';

?>
