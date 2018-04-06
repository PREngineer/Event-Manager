<?php

  // Include DB functions
  include '../functions/DB.php';
  session_start();

echo '
<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("announcementsLink").classList.remove("active");
  document.getElementById("currentLink").classList.remove("active");
  document.getElementById("futureLink").classList.remove("active");
  document.getElementById("createMemberLink").classList.remove("active");
  document.getElementById("loginLink").classList.remove("active");
  document.getElementById("myRSVP").classList.remove("active");
';

  if( $_SESSION['userRole'] == 1 )
  {
    echo 'document.getElementById("approversLink").classList.add("active");';
  }
  if( $_SESSION['userRole'] == 2 )
  {
    echo 'document.getElementById("pocLink").classList.remove("active");';
  }
  if( $_SESSION['userRole'] == 3 )
  {
    echo 'document.getElementById("adminLink").classList.remove("active");';
  }

echo '</script>';

$events = get_approverEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">All Future Events</h1>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the events that need approval/disapproval.</div>
  <div class="panel-body">
    <i class="glyphicon glyphicon-ok" title="Approve" style="color:green; padding-left:2em"></i> = Approve
    <i class="glyphicon glyphicon-remove" title="Disapprove" style="color:red; padding-left:2em"></i> = Disapprove
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
        <a href="approveEvent.php?id=' . $value[0] . '&return=approver"><i class="glyphicon glyphicon-ok" title="Approve" style="color: green"></i></a>
    ';
  }
  else
  {
    echo '
        <a href="disapproveEvent.php?id=' . $value[0] . '&return=approver"><i class="glyphicon glyphicon-remove" title="Disapprove" style="color: red"></i></a>
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

</div>
