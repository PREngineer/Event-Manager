<title>Event Manager - Approvers</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectApprover();

$events = get_ApproverEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Approver</h1>

<hr>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">
    <p>Welcome <?php echo $_SESSION['userID']; ?>!</p>
    <p>Here are all the future events that need to be evaluated.</p>
  </div>
  <div class="panel-body">
    <i class="glyphicon glyphicon-ok" title="Approve" style="color:green; padding-left:2em"></i> = Approve
    <i class="glyphicon glyphicon-remove" title="Disapprove" style="color:red; padding-left:2em"></i> = Disapprove
  </div>
</div>

  <!-- Table -->
  <table class="table">

    <thead>
      <th>
        Options
      </th>

      <th>
        Name
      </th>

      <th>
        Date
      </th>

      <th>
        Created
      </th>

      <th>
        Creator
      </th>

      <th>
        In Person Code
      </th>

      <th>
        Remote Code
      </th>

      <th>
        Approved
      </th>

      <th>
        Estimated <i class="glyphicon glyphicon-usd" title="Estimated Budget" style="color:black"></i>
      </th>

      <th>
        Actual <i class="glyphicon glyphicon-usd" title="Actual Budget" style="color:black"></i>
      </th>

    </thead>

<?php

  foreach ($events as $key => $value)
  {
    echo'
    <tr id="Entry' . $value[0] . '">

      <td>
    ';
  if( $value[7] == 0 )
  {
    echo '
        <a link="approveEvent.php?display=Approver&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-ok" title="Approve" style="color: green"></i></a>
    ';
  }
  else
  {
    echo '
        <a link="disapproveEvent.php?display=Approver&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-remove" title="Disapprove" style="color: red"></i></a>
    ';
  }
    echo '
      </td>

      <td>
      ' . $value[1] . '
      </td>

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
    ';
    if( $value[7] == 1 )
    {
      echo '
          <i class="glyphicon glyphicon-ok-sign" title="Yes" style="color:green"></i>
      ';
    }
    else
    {
      echo '
          <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
      ';
    }
    echo '
      </td>

      <td>
      ' . $value[8] . '
      </td>

      <td>
    ';
    if( $value[9] == "" )
    {
    echo '
              <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
    ';
    }
    else
    {
          echo $value[9];
    }
    echo '
      </td>

    </tr>';
  }
?>
  </table>
