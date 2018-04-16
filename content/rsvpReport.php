<!-- Handle NavBar Highlights -->
  <script>
    document.getElementById("announcementsLink").classList.remove("active");
    document.getElementById("currentLink").classList.remove("active");
    document.getElementById("futureLink").classList.remove("active");
    document.getElementById("createMemberLink").classList.remove("active");
    document.getElementById("loginLink").classList.remove("active");
    document.getElementById("myRSVP").classList.remove("active");
    document.getElementById("adminLink").classList.add("active");
  </script>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">RSVP Reports</h1>

<ol class="breadcrumb">
  <li>
    <a href="?action=Admin">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
  <li>
    <a href="?action=Reports">
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
    <div class="input-group">
      <select onchange="changeReport(this.value)" class="form-control" id="reportOptions">
  	    <option
        <?php
          // Choose the right option to be selected
          if( $_GET['report'] == 0 )
          {
            echo 'selected';
          }
        ?>
        >-All Data-</option>
        <!--<option-->
        <?php
          // Choose the right option to be selected
          if( $_GET['report'] == 1 )
          {
            echo 'selected';
          }
        ?>
        <!-->RSVP by Event</option>
        <option-->
        <?php
          // Choose the right option to be selected
          if( $_GET['report'] == 2 )
          {
            echo 'selected';
          }
        ?>
        <!-->RSVP by Career Level</option>-->
      </select>
    </div>
  </div>

</div>

<?php

  include "../widgets/exportReport.html";

  if($_GET['report'] == 0)
  {
    include "reports/rsvpDump.php";
  }
  if($_GET['report'] == 1)
  {
    include "reports/rsvpByEvent.php";
  }
  if($_GET['report'] == 2)
  {
    include "reports/rsvpByCareerLevel.php";
  }

?>

<script>
  // Do the actual loading.
  function changeReport(value)
  {
    if(value == "-All Data-")
    {
      window.location = "index.php?action=RSVPReport&report=0";
    }
    if(value == "rsvp by Event")
    {
      window.location = "index.php?action=RSVPReport&report=1";
    }
    if(value == "rsvp by Career Level")
    {
      window.location = "index.php?action=RSVPReport&report=2";
    }
  }
</script>
