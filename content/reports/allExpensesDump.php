<!-- Table -->
<title>Event Manager - Budget Reports - All Expenses Dump</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $expenses = get_AllEvents();
  $on = $over = $under = 0;

  echo '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Creator</th>
        <th>Forecasted Budget ($)</th>
        <th>Actual Budget Spent ($)</th>
      </tr>
    </thead>
    <tbody>';

  if( sizeof($expenses) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no expenses entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($expenses as $name => $value)
    {
      echo '
        <tr>
          <td>
            ' . $value[0] . '
          </td>
          <td>
            ' . $value[1] . '
          </td>
          <td>
            ' . $value[2] . '
          </td>
          <td>
            ' . $value[4] . '
          </td>
          <td>
            ' . $value[8] . '
          </td>
          <td';

      if($value[8] > $value[9])
      {
        echo ' style="background:lightgreen;"';
        $under++;
      }
      if($value[8] == $value[9])
      {
        echo ' style="background:lightblue;"';
        $on++;
      }
      if($value[8] < $value[9])
      {
        echo ' style="background:pink;"';
        $over++;
      }

      echo '>
            ' . $value[9] . '
          </td>
        </tr>
      ';
    }
  }

  echo '</tbody>
      </table>

      <table id="reportTable" class="container table">

        <thead>
          <tr style="background: lightgray;">
            <th>Under Budget</th>
            <th>% Under Budget</th>
            <th>On Budget</th>
            <th>% On Budget</th>
            <th>Over Budget</th>
            <th>% Over Budget</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td style="background:lightgreen;">
            ' . $under . '
            </td>
            <td style="background:lightgreen;">
            ' . round( ( ($under) / ($under + $on + $over) * 100 ),2 ) . '
            </td>
            <td style="background:lightblue;">
            ' . $on . '
            </td>
            <td style="background:lightblue;">
            ' . round( ( ($on) / ($under + $on + $over) * 100 ),2 ) . '
            </td>
            <td style="background:pink;">
            ' . $over . '
            </td>
            <td style="background:pink;">
            ' . round( ( ($over) / ($under + $on + $over) * 100 ),2 ) . '
            </td>
          </tr>
        </tbody>

      </table>
      ';

?>
