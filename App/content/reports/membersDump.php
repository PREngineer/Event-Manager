<!-- Table -->
<title>Event Manager - Membership Reports - Membership Dump</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $members = get_AllMembers();

  echo '
  <table id="reportTable" class="container table">
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
  echo '<tr>
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
              echo '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[9] == 1)
            {
              echo '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            echo '
          </td>
          <td>
            ';

            if( $value[10] == 0)
            {
              echo '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[10] == 1)
            {
              echo '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            echo '
          </td>
          <td>
            ';

            if( $value[11] == 0)
            {
              echo '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[11] == 1)
            {
              echo '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            echo '
          </td>
          <td>
            ';

            if( $value[12] == 0)
            {
              echo '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[12] == 1)
            {
              echo '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            echo '
          </td>
          <td
            ';

            if( $value[13] == 0)
            {
              echo ' style="color:green;">Member';
            }
            else if( $value[13] == 1)
            {
              echo ' style="color:yellow;">Approver';
            }
            else if( $value[13] == 2)
            {
              echo ' style="color:orange;">Point of Contact';
            }
            else if( $value[13] == 3)
            {
              echo ' style="color:red;">Administrator';
            }

            echo '
          </td>
        </tr>
      ';
    }
  }

  echo '</table>';

  // Print the report to the webpage
  echo $report;

?>
