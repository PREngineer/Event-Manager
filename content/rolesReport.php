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
    if(value == "All People Roles")
    {
      window.location = "index.php?display=RolesReport&report=0";
    }
    if(value == "Role Distribution")
    {
      window.location = "index.php?display=RolesReport&report=1";
    }
  }

  $(document).ready(function()
  {
      $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Roles Reports</h1>

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
        	    <option <?php if($_GET['report'] == 0){echo 'selected';} ?> value="All People Roles">-All People Roles-</option>
              <option <?php if($_GET['report'] == 1){echo 'selected';} ?> value="Role Distribution">Role Distribution</option>
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
    include 'reports/rolesDump.php';
  }
  if($_GET['report'] == 1)
  {
    include 'reports/roleDistribution.php';
  }

?>
