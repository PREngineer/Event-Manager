<title>Event Manager - Future Events</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

$events = get_FutureEvents();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Future Events</h1>

<hr>

<div id="PageContents" class="container">

<?php
if( sizeof($events) == 0 )
{
  echo '
  <div class="container">
    <h2>There are no scheduled events in the future.</h2>
  </div>
  ';
}
else
{
  foreach ($events as $name => $value)
  {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . preg_split("/content/", $_SERVER['PHP_SELF'])[0] . 'content/index.php?display=RSVP%26id=' . $value[0];

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
                <td class="text-center">
                  <a link="index.php?display=RSVP&id=' . $value[0] . '" class="btn btn-primary" role="button">RSVP</a>
                </td>
                <td>
                  <a link="mailto:?subject=Thought%20you%20would%20like%20to%20know&body=Check%20out%20this%20event.%0A%0AIt is named: ' . $value[1] .
                  '%0A%0ALocation: ' . $value[5] . '%0A%0ADate: ' . $value[2] . '%0A%0AFrom: ' . $value[3] . '%20-%20' . $value[4] .
                  '%0A%0ARSVP here: ' . $url . '" class="btn btn-success" role="button">Share</a>
                </td class="text-center">
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
