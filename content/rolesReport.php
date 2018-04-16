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

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Roles Reports</h1>

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
        <!-->Roles by Event</option>
        <option-->
        <?php
          // Choose the right option to be selected
          if( $_GET['report'] == 2 )
          {
            echo 'selected';
          }
        ?>
        <!-->Roles by Career Level</option>-->
      </select>
    </div>
  </div>

</div>

<?php

  include "../widgets/exportReport.html";

  if($_GET['report'] == 0)
  {
    include "reports/rolesDump.php";
  }
  if($_GET['report'] == 1)
  {
    include "reports/rolesByEvent.php";
  }
  if($_GET['report'] == 2)
  {
    include "reports/rolesByCareerLevel.php";
  }

?>

<script>
  // Do the actual loading.
  function changeReport(value)
  {
    if(value == "-All Data-")
    {
      window.location = "index.php?action=RolesReport&report=0";
    }
    if(value == "Roles by Event")
    {
      window.location = "index.php?action=RolesReport&report=1";
    }
    if(value == "Roles by Career Level")
    {
      window.location = "index.php?action=RolesReport&report=2";
    }
  }
</script>
