<!-- Table -->
<title>Event Manager - Attendance Reports - Attendance By Event</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $totals   = get_AllAttendanceTotalsByEvent();
  $person   = 0;
  $remote   = 0;
  $total    = 0;

  echo '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Event Name</th>
        <th style="color: blue;">
          <i class="glyphicon glyphicon-user" title="Yes">Person</i>
        </th>
        <th style="color: gray;">
          <i class="glyphicon glyphicon-headphones" title="Yes">Remote</i>
        </th>
        <th>Total</th>
        <th style="background: lightgray;"></th>
        <th style="color: blue;">
          <i class="glyphicon glyphicon-user" title="Yes">Person%</i>
        </th>
        <th style="width: 1;color: gray;">
          <i class="glyphicon glyphicon-headphones" title="Yes">Remote%</i>
        </th>
        <th>Total%</th>
      </tr>
    </thead>
    <tbody>';

  if( sizeof($totals) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no attendance entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($totals as $name => $value)
    {
      $eventTotal = $value[3] + $value[4];
      $person += $value[3];
      $remote += $value[4];
      $total += $eventTotal;

      echo '
      <tr>
          <td>
            ' . $value[1] . '
          </td>
          <td>
            ' . $value[0] . '
          </td>
          <td>
          ' . $value[3] . '
          </td>
          <td>
            ' . $value[4] . '
          </td>
          <td>
            ' . $value[2] . '
          </td>
          <td style="width: 1;background: lightgray;"></td>
          <td>
            ' . round( ($value[3]/$eventTotal) * 100, 2) . '
          </td>
          <td>
            ' . round( ($value[4]/$eventTotal) * 100, 2) . '
          </td>
          <td>
            ' . (round( ($value[3]/$eventTotal) * 100, 2) + round( ($value[4]/$eventTotal) * 100, 2)) . '
          </td>
      </tr>
      ';
    }
  }

  echo '</tbody>
    </table>';

?>
