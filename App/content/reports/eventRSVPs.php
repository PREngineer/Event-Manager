<!-- Table -->
<title>Event Manager - RSVP Reports - Event RSVPs</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $rsvps = get_EventRSVPs($_GET['eventID']);

  echo  '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: gray;">
      <th colspan="6" class="text-center">' . str_replace("|"," ",$_GET['eventName']) . '</th>
      </tr>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Enterprise ID</th>
        <th>Reserve Timestamp</th>
        <th>Cancelled</th>
        <th>Cancel Reason</th>
        <th>Cancel Timestamp</th>
      </tr>
    </thead>
    <tbody>';

  if( sizeof($rsvps) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no RSVP entries for the event in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($rsvps as $name => $value)
    {
      echo  '<tr id="' . $value[0] . '">
          <td>
            ' . $value[1] . '
          </td>
          <td>
            ' . $value[2] . '
          </td>
          <td>
            ' . $value[6] . '
          </td>
          <td>
            ';

            if( $value[3] == 0)
            {
              echo  '<i class="glyphicon glyphicon-remove" title="No" style="color:red;">No</i>';
            }
            else if( $value[3] == 1)
            {
              echo  '<i class="glyphicon glyphicon-ok" title="Yes" style="color:green;">Yes</i>';
            }
            echo  '
          </td>
          <td>
            ' . $value[4] . '
          </td>
          <td>
            ' . $value[5] . '
          </td>
        </tr>
      ';
    }
  }

  echo  '
    </tbody>
  </table>';

?>
