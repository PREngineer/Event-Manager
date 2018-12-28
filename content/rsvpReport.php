<?php

  include '../functions/Init.php';
  include '../functions/DB.php';
  include 'layout/LinkHandler.php';

  protectAdmin();

?>

<script>
  // Do the actual loading.
  function changeReport(value)
  {
    if(value == "All Data")
    {
      window.location = "index.php?display=RSVPReport&report=0";
    }
    if(value == "All RSVP by Career Level")
    {
      window.location = "index.php?display=RSVPReport&report=1";
    }
    if(value == "All RSVP by Company Segment")
    {
      window.location = "index.php?display=RSVPReport&report=2";
    }
    if(value == "All RSVP by Event")
    {
      window.location = "index.php?display=RSVPReport&report=3";
    }
    if(value == "Event RSVP by Career Level")
    {
      window.location = "index.php?display=RSVPEvents&report=4";
    }
    if(value == "Event RSVPs")
    {
      window.location = "index.php?display=RSVPEvents&report=5";
    }
  }

  $(document).ready(function()
  {
      $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">RSVP Reports</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
  <li>
    <a link="index.php?display=Reports" style="cursor:pointer;">
      All Reports
    </a>
  </li>
  <?php
    if( isset($_GET['eventID']) )
    {
      echo '
      <li>
        <a link="index.php?display=RSVPEvents&report=' . $_GET['report'] . '" style="cursor:pointer;">
          All Events
        </a>
      </li>
      ';
    }
  ?>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <p>Which report would you like to see?</p>
  </div>

  <div class="panel-body">
    <table role="presentation">
      <tr>
        <td style="padding: 5px;">
          <div class="input-group">
            <select onchange="changeReport(this.value)" class="form-control" id="reportOptions">
        	    <option <?php if($_GET['report'] == 0){echo 'selected';} ?> value="All Data">-All Data-</option>
              <option <?php if($_GET['report'] == 1){echo 'selected';} ?> value="All RSVP by Career Level">All RSVP by Career Level</option>
              <option <?php if($_GET['report'] == 2){echo 'selected';} ?> value="All RSVP by Company Segment">All RSVP by Company Segment</option>
              <option <?php if($_GET['report'] == 3){echo 'selected';} ?> value="All RSVP by Event">All RSVP by Event</option>
              <option <?php if($_GET['report'] == 4){echo 'selected';} ?> value="Event RSVP by Career Level">Event RSVP by Career Level</option>
              <option <?php if($_GET['report'] == 5){echo 'selected';} ?> value="Event RSVPs">Event RSVPs</option>
            </select>
          </div>
        </td>

  <!-- START NOTES -->
        <td class="col-sm-8 text-right" style="padding: 5px;">
          <label style="color: red;font-size: 15px;">Notes about exports:</label>

          <!-- Trigger the modal with a button -->
          <span data-toggle="tooltip" data-placement="bottom" title="About iOS progressive web app">
            <i class="glyphicon glyphicon-modal-window" style="color:red;cursor:pointer;font-size:15px;" data-toggle="modal"
             data-target="#Modal1"></i>
          </span>
          <span data-toggle="tooltip" data-placement="bottom" title="About browser compatibility">
            <i class="glyphicon glyphicon-modal-window" style="color:red;cursor:pointer;font-size:15px;" data-toggle="modal"
             data-target="#Modal2"></i>
          </span>
          <span data-toggle="tooltip" data-placement="bottom" title="About file extensions">
            <i class="glyphicon glyphicon-modal-window" style="color:red;cursor:pointer;font-size:15px;" data-toggle="modal"
             data-target="#Modal3"></i>
          </span>
        </td>
      </tr>
    </table>

    <!-- Modal 1 -->
    <div id="Modal1" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">iOS Progressive Web App</h4>
          </div>
          <div class="modal-body">
            <p>Do not attempt to download reports inside the PWA version of the app in iOS.
              <br>The downloaded file will be opened automatically and it will take over the whole application's interface.
              <br>Rendering you unable to navigate out of it.
              <br>Download the reports using Safari in your iDevice.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- END NOTES -->

    <!-- START MODALS -->
    <!-- Modal 2 -->
    <div id="Modal2" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">About browser compatibility</h4>
          </div>
          <div class="modal-body">
            <p>Not all browsers are compatible with all the reports types.
              <br>Chrome has been known to not deliver the JSON, XML, and XLS results.
              <br>Tests have shown Safari to be the most compatible.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal 3 -->
    <div id="Modal3" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">About file extensions</h4>
          </div>
          <div class="modal-body">
            <p>Report files download without extensions on several browsers.
              <br>Please, add the appropriate extension to the file after downloading.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- END MODALS -->
  </div>
  <!-- END Panel Body -->
</div>
<!-- END Panel -->

<?php

  include "../widgets/exportReport.html";

  if( ($_GET['report'] == 0) || !isset($_GET['report']) )
  {
    include 'reports/rsvpDump.php';
  }
  if($_GET['report'] == 1)
  {
    include 'reports/allRSVPByCareerLevel.php';
  }
  if($_GET['report'] == 2)
  {
    include 'reports/allRSVPByCompanySegment.php';
  }
  if($_GET['report'] == 3)
  {
    include 'reports/allRSVPByEvent.php';
  }
  if($_GET['report'] == 4)
  {
    include 'reports/eventRSVPsByCareerLevel.php';
  }
  if($_GET['report'] == 5)
  {
    include 'reports/eventRSVPs.php';
  }

?>
