<!-- Table -->
<title>Event Manager - RSVP Reports - All RSVP By Company Segment</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $rsvps = get_AllRSVPByCompanySegment()[0];

  $total = $rsvps[0] + $rsvps[1];

  echo  '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Company Segment</th>
        <th>Amount</th>
        <th>%</th>
      </tr>
    </thead>
    <tbody>';

  if( sizeof($rsvps) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no RSVP entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {
    echo  '
        <tr>
          <td>
            LLP
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
            Federal
          </td>
          <td>
            ' . $rsvps[1] . '
          </td>
          <td>
            ' . ($rsvps[1] / $total) * 100 . '
          </td>
        </tr>
        ';
  }

  echo  '
    </tbody>
  </table>';

?>
