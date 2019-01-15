<!-- Table -->
<title>Event Manager - RSVP Reports - All RSVP By Event</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $rsvps = get_AllRSVPByEvent();

  $total = sizeof($rsvps);

  $ids = $names = $dates = $booked = $cancelled = array();
  $totalCancelled = 0;

  // Get all unique event IDs
  for($i = 0; $i < $total; $i++)
  {
    // If not in the array, add
    if( !( in_array($rsvps[$i][3], $ids) ) )
    {
      array_push($ids, $rsvps[$i][3]);
      array_push($names, $rsvps[$i][0]);
      array_push($dates, $rsvps[$i][1]);
    }
  }

  // Get all event numbers
  for($i = 0; $i < sizeof($ids); $i++)
  {
    $book = 0;
    $cancel = 0;

    for($j=0; $j < sizeof($rsvps); $j++)
    {
      if( $ids[$i] == $rsvps[$j][3] )
      {
        $book++;
        if($rsvps[$j][5] == 1)
        {
          $cancel++;
          $totalCancelled++;
        }
      }
    }

    array_push($booked, $book);
    array_push($cancelled, $cancel);
  }

  echo  '
  <table id="reportTable" class="container table">
    <thead>
      <tr style="background: lightgray;">
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>RSVPs Placed</th>
        <th>RSVPs Cancelled</th>
        <th>% Cancelled</th>
      </tr>
    </thead>
    <tbody>
    ';

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
    // Display the data
    for($i = 0; $i < sizeof($ids); $i++)
    {
      echo  '
          <tr>
            <td>
              ' . $ids[$i] . '
            </td>
            <td>
              ' . $names[$i] . '
            </td>
            <td>
              ' . $dates[$i] . '
            </td>
            <td>
              ' . $booked[$i] . '
            </td>
            <td>
              ' . $cancelled[$i] . '
            </td>
            <td>
              ' . ($cancelled[$i] / $booked[$i]) * 100 . '%
            </td>
          </tr>
          ';
      }

      echo '
      <tr style="background: gray;">
        <td colspan="3">
          <b>Totals</b>
        </td>
        <td>
        ' . $total . '
        </td>
        <td>
        ' . $totalCancelled . '
        </td>
        <td>
        ' . round( (($totalCancelled / $total) * 100),2 ) . '%
        </td>
      </tr>';
  }

  echo  '
    </tbody>
  </table>';

?>
