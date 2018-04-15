<!-- Table -->

<?php

  // Include DB functions
  include '../functions/DB.php';

  session_start();

  $members = get_AllMembers();

  $report = '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Given Name</th>
        <th>Initials</th>
        <th>Surname</th>
        <th>Career Level</th>
        <th>Title</th>
        <th>Company Segment</th>
        <th>Employee ID</th>
        <th>E-mail</th>
        <th>Newsletter</th>
        <th>Volunteer</th>
        <th>Active</th>
        <th>Lead</th>
        <th>Role</th>
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
    foreach ($members as $name => $value)
    {
      $report .= '<tr>
          <td>
            ' . $value[2] . '
          </td>
          <td>
            ' . $value[3] . '
          </td>
          <td>
            ' . $value[4] . '
          </td>
          <td>
            ' . $value[5] . '
          </td>
          <td>
            ' . $value[6] . '
          </td>
          <td>
            ' . $value[7] . '
          </td>
          <td>
            ' . $value[1] . '
          </td>
          <td>
            ' . $value[8] . '
          </td>
          <td>
            ';

            if( $value[9] == 0)
            {
              $report .= '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[9] == 1)
            {
              $report .= '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            $report .= '
          </td>
          <td>
            ';

            if( $value[10] == 0)
            {
              $report .= '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[10] == 1)
            {
              $report .= '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            $report .= '
          </td>
          <td>
            ';

            if( $value[11] == 0)
            {
              $report .= '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[11] == 1)
            {
              $report .= '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            $report .= '
          </td>
          <td>
            ';

            if( $value[12] == 0)
            {
              $report .= '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[12] == 1)
            {
              $report .= '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            $report .= '
          </td>
          <td
            ';

            if( $value[13] == 0)
            {
              $report .= ' style="color:green;">Member';
            }
            else if( $value[13] == 1)
            {
              $report .= ' style="color:yellow;">Approver';
            }
            else if( $value[13] == 2)
            {
              $report .= ' style="color:orange;">Point of Contact';
            }
            else if( $value[13] == 3)
            {
              $report .= ' style="color:red;">Administrator';
            }

            $report .= '
          </td>
        </tr>
      ';
    }
  }

  $report .= '</table>';

  // Print the report to the webpage
  echo $report;

?>
