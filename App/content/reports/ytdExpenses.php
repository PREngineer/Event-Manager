<!-- Table -->
<title>Event Manager - Budget Reports - Year To Date Expenses</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $expenses = get_AllEvents();
  $total = 0;

  echo '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Creator</th>
        <th>Actual Budget Spent ($)</th>
        <th>Year To Date Expenses($)</th>
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
      if( $value[2] > Date('Y-01-01') && $value[2] < Date('Y-12-31') )
      {
        $total += $value[9];

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
            <td>
              ' . $total . '
            </td>
          </tr>
        ';
      }
    }
  }

  echo '</tbody>
      </table>';
?>
