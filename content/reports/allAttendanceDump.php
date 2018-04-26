<!-- Table -->
<title>Event Manager - Attendance Reports - Attendance Dump</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $attendance = get_AllAttendance();

  echo '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Enterprise ID</th>
        <th>Type</th>
        <th>Registered</th>
      </tr>
    </thead>
    <tbody>';

  if( sizeof($attendance) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no attendance entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($attendance as $name => $value)
    {
      echo '
        <tr>
          <td>
            ' . $value[1] . '
          </td>
          <td>
            ' . $value[2] . '
          </td>
            ';

            if( $value[3] == 0)
            {
              echo '<td style="color: blue;"><i class="glyphicon glyphicon-user" title="In Person"></i> In Person';
            }
            else if( $value[3] == 1)
            {
              echo '<td style="color: gray;"><i class="glyphicon glyphicon-headphones" title="Remote"></i> Remote';
            }
    echo '</td>
          <td>
            ' . $value[4] . '
          </td>
        </tr>
      ';
    }
  }

  echo '</tbody>
      </table>';
?>
