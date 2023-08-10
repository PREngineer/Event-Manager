<!-- Table -->
<title>Event Manager - RSVP Reports - Event RSVPs by Career Level</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $rsvps = get_EventRSVPsByCareerLevel($_GET['eventID'])[0];

  if($rsvps[0] != NULL)
  {
    $total = $rsvps[0] + $rsvps[1] + $rsvps[2] + $rsvps[3] + $rsvps[4] + $rsvps[5] + $rsvps[6] + $rsvps[7] + $rsvps[8] + $rsvps[9];
  }
  else
  {
    $total = 1;
    $rsvps[0] = 0;
    $rsvps[1] = 0;
    $rsvps[2] = 0;
    $rsvps[3] = 0;
    $rsvps[4] = 0;
    $rsvps[5] = 0;
    $rsvps[6] = 0;
    $rsvps[7] = 0;
    $rsvps[8] = 0;
    $rsvps[9] = 0;
    echo '
    <div class="container">
      <h3>There are no RSVP entries for this event in the platform at the moment.</h3>
    </div>
    ';
  }

  echo  '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: gray;">
      <th colspan="3" class="text-center">' . str_replace("|"," ",$_GET['eventName']) . '</th>
      </tr>
      <tr style="background: lightgray;">
        <th>Career Level</th>
        <th>Amount</th>
        <th>%</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>
            Leadership
          </td>
          <td>
            ' . $rsvps[0] . '
          </td>
          <td>
            ' . ($rsvps[0] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            6
          </td>
          <td>
            ' . $rsvps[1] . '
          </td>
          <td>
            ' . ($rsvps[1] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            7
          </td>
          <td>
            ' . $rsvps[2] . '
          </td>
          <td>
            ' . ($rsvps[2] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            8
          </td>
          <td>
            ' . $rsvps[3] . '
          </td>
          <td>
            ' . ($rsvps[3] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            9
          </td>
          <td>
            ' . $rsvps[4] . '
          </td>
          <td>
            ' . ($rsvps[4] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            10
          </td>
          <td>
            ' . $rsvps[5] . '
          </td>
          <td>
            ' . ($rsvps[5] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            11
          </td>
          <td>
            ' . $rsvps[6] . '
          </td>
          <td>
            ' . ($rsvps[6] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            12
          </td>
          <td>
            ' . $rsvps[7] . '
          </td>
          <td>
            ' . ($rsvps[7] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            13
          </td>
          <td>
            ' . $rsvps[8] . '
          </td>
          <td>
            ' . ($rsvps[8] / $total) * 100 . '
          </td>
        </tr>

        <tr>
          <td>
            14
          </td>
          <td>
            ' . $rsvps[9] . '
          </td>
          <td>
            ' . ($rsvps[9] / $total) * 100 . '
          </td>
        </tr>
    </tbody>
  </table>';

?>
