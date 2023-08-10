<!-- Table -->
<title>Event Manager - Role Reports - Roles Distribution</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $roles = get_AllRolesDistribution();

  $admin    = 0;
  $poc      = 0;
  $approver = 0;

  echo '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Role</th>
        <th>Amount</th>
        <th>%</th>
      </tr>
    </thead>
    <tbody>';

  if( sizeof($roles) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no role entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($roles as $name => $value)
    {
      if($value[0] == 1)
      {
        $approver = $value[1];
      }
      if($value[0] == 2)
      {
        $poc = $value[1];
      }
      if($value[0] == 3)
      {
        $admin = $value[1];
      }
    }
  }

$approverPercent = ( ($approver/($approver+$poc+$admin))*100);
$pocPercent = ( ($poc/($approver+$poc+$admin))*100);
$adminPercent = ( ($admin/($approver+$poc+$admin))*100);

  echo '
      <tr>
        <td>
          Approvers
        </td>
        <td>
          ' . $approver . '
        </td>
        <td>' . round($approverPercent, 2) . '</td>
      </tr>
      <tr>
        <td>
          Points of Contact
        </td>
        <td>
          ' . $poc . '
        </td>
        <td>' . round($pocPercent, 2) . '</td>
      </tr>
      <tr>
        <td>
          Administrators
        </td>
        <td>
          ' . $admin . '
        </td>
        <td>' . round($adminPercent, 2) . '</td>
      </tr>
      <tr style="background: lightgray;">
        <td>
          Totals
        </td>
        <td>
          ' . ($admin+$poc+$approver) . '
        </td>
        <td>' . round($adminPercent+$pocPercent+$approverPercent, 2) . '</td>
      </tr>
    </tbody>
  </table>';

?>
