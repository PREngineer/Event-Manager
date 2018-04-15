<!-- Table -->

<?php

  // Include DB functions
  include '../functions/DB.php';

  session_start();

  $members = get_AllAttendance();

  $report = '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Enterprise ID</th>
        <th>Type</th>
        <th>Registered</th>
      <tr>
    </thead>';

  if( sizeof($members) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no attendance entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($members as $name => $value)
    {
      $report .= '<tr>
          <td>
            ' . $value[1] . '
          </td>
          <td>
            ' . $value[2] . '
          </td>
          <td>
            ';

            if( $value[3] == 0)
            {
              $report .= '<i class="glyphicon glyphicon-user" title="No" style="color:blue;">In Person</i>';
            }
            else if( $value[3] == 1)
            {
              $report .= '<i class="glyphicon glyphicon-headphones" title="Yes" style="color:gray;">Remote</i>';
            }
            $report .= '
          </td>
          <td>
            ' . $value[4] . '
          </td>
        </tr>
      ';
    }
  }

  $report .= '</table>';

  // Print the report to the webpage
  echo $report;

?>
