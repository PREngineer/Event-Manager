<title>Event Manager - Current Events</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

$events = get_CurrentEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Current Events</h1>

<hr>

<div id="PageContents" class="container">

<?php

if( sizeof($events) == 0 )
{
  echo '
  <div class="container">
    <h2>There are no events scheduled for today.</h2>
  </div>
  ';
}
else
{
  foreach ($events as $name => $value)
  {
    echo '
    <div class="col-sm-3">
      <div class="thumbnail" style="height: 500px;">
        <img src="../images/event.png" alt="Event image" width="150" height="150">
        <div class="caption">
            <table role="presentation" class="table">
              <tr>
                <td class="text-center" colspan="2"><strong>' . $value[1] . '</strong></td>
              </tr>
              <tr>
                <td>Date:</td>
                <td>' . $value[2] . '</td>
              </tr>
              <tr>
                <td>Starts:</td>
                <td>' . $value[3] . '</td>
              </tr>
              <tr>
                <td>Ends:</td>
                <td>' . $value[4] . '</td>
              </tr>
              <tr>
                <td>Location:</td>
                <td>' . $value[5] . '</td>
              </tr>
              <tr>
                <td class="text-center" colspan="2">
                  <a link="index.php?display=Checkin&id=' . $value[0] . '" class="btn btn-primary" role="button">Check In</a>
                </td>
              </tr>
            </table>
        </div>
      </div>
    </div>
    ';
  }
}
?>

</div>
