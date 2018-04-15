<!-- Table -->

<?php

  // Include DB functions
  include '../functions/DB.php';

  session_start();

  $members = get_MembersByCareerLevelReport()[0];

  $report = '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Career Level</th>
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
          Leadership
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
            6
          </td>
          <td>
            ' . $members[3] . '
          </td>
          <td>
            ' . round($members[4],2) . ' %
          </td>
      </tr>
      <tr>
          <td>
            7
          </td>
          <td>
            ' . $members[5] . '
          </td>
          <td>
            ' . round($members[6],2) . ' %
          </td>
      </tr>
      <tr>
          <td>
            8
          </td>
          <td>
            ' . $members[7] . '
          </td>
          <td>
            ' . round($members[8],2) . ' %
          </td>
      </tr>
      <tr>
          <td>
            9
          </td>
          <td>
            ' . $members[9] . '
          </td>
          <td>
            ' . round($members[10],2) . ' %
          </td>
      </tr>
      <tr>
          <td>
            10
          </td>
          <td>
            ' . $members[11] . '
          </td>
          <td>
            ' . round($members[12],2) . ' %
          </td>
      </tr>
      <tr>
          <td>
            11
          </td>
          <td>
            ' . $members[13] . '
          </td>
          <td>
            ' . round($members[14],2) . ' %
        </td>
      </tr>
      <tr>
          <td>
            12
          </td>
          <td>
            ' . $members[15] . '
          </td>
          <td>
            ' . round($members[16],2) . ' %
        </td>
      </tr>
      <tr>
          <td>
            13
          </td>
          <td>
            ' . $members[17] . '
          </td>
          <td>
            ' . round($members[18],2) . ' %
        </td>
      </tr>
      <tr>
          <td>
            14
          </td>
          <td>
            ' . $members[19] . '
          </td>
          <td>
            ' . round($members[20],2) . ' %
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
