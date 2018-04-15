<!-- Table -->

<?php

  // Include DB functions
  include '../functions/DB.php';

  session_start();

  $members = get_AllRoles();

  $report = '<table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>User</th>
        <th>Role</th>
      <tr>
    </thead>';

  if( sizeof($members) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no role entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($members as $name => $value)
    {
      $report .= '<tr>
          <td>
            ' . $value[0] . '
          </td>
          <td>
            ';

            if( $value[2] == 0)
            {
              $report .= '<i class="glyphicon glyphicon-star" title="No" style="color:gray;">Member</i>';
            }
            else if( $value[2] == 1)
            {
              $report .= '<i class="glyphicon glyphicon-star" title="Yes" style="color:green;">Approver</i>';
            }
            else if( $value[2] == 2)
            {
              $report .= '<i class="glyphicon glyphicon-star" title="Yes" style="color:darkorange;">Point Of Contact</i>';
            }
            else if( $value[2] == 3)
            {
              $report .= '<i class="glyphicon glyphicon-star" title="Yes" style="color:red;">Administrator</i>';
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
