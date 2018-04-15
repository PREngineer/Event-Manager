<!-- Table -->

<?php

  // Include DB functions
  include '../functions/DB.php';

  session_start();

  $members = get_MembersByCompanySegmentReport()[0];

  $report = '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Company Segment</th>
        <th>Number of Members</th>
        <th>Percentage of Members</th>
      <tr>
    </thead>';

  if( sizeof($members) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no ERG members in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    $report .= '<tr>
        <td>
          Federal
        </td>
        <td>
          ' . $members[1] . '
        </td>
        <td>
          ' . round($members[2],2) . ' %
        </td>
      </tr>
      <tr>
          <td>
            LLP
          </td>
          <td>
            ' . $members[3] . '
          </td>
          <td>
            ' . round($members[4],2) . ' %
          </td>
      </tr>
      <tr style="background: lightgray;">
          <td>
            <b>Total Membership</b>
          </td>
          <td>
            <b>' . $members[0] . '</b>
          </td>
          <td>
            <b>100 %</b>
        </td>
      </tr>
    ';
  }

  $report .= '</table>';

  // Print the report to the webpage
  echo $report;

?>
