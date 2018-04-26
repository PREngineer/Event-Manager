<!-- Table -->
<title>Event Manager - Role Reports - Roles Dump</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $members = get_AllRoles();

  echo '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>User</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>';

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
      echo '<tr>
          <td>
            ' . $value[0] . '
          </td>
          <td>
            ';

            if( $value[2] == 0)
            {
              echo '<i class="glyphicon glyphicon-star" title="No" style="color:gray;">Member</i>';
            }
            else if( $value[2] == 1)
            {
              echo '<i class="glyphicon glyphicon-star" title="Yes" style="color:green;">Approver</i>';
            }
            else if( $value[2] == 2)
            {
              echo '<i class="glyphicon glyphicon-star" title="Yes" style="color:darkorange;">Point Of Contact</i>';
            }
            else if( $value[2] == 3)
            {
              echo '<i class="glyphicon glyphicon-star" title="Yes" style="color:red;">Administrator</i>';
            }
            echo '
          </td>
        </tr>
      ';
    }
  }

  echo '</table>';

?>
