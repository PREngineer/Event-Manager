<?php

  // Include DB functions
  include '../functions/DB.php';

  session_start();

echo '
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
';

//$attendance = get_AllAttendanceReport();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Attendance Report</h1>

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
    <p>Welcome to your attendance reports!</p>
  </div>

  <div class="panel-body">
    <p>
      Filters
    </p>
    <p>

    </p>
  </div>

</div>

<?php include "../widgets/exportReport.html"; ?>

<!-- Table -->

<?php

$report = '<table id="reportTable" class="container table">
  <thead>
    <tr>
    <th>Event Name</th>
    <th>Event Date</th>
    <th>RSVPs</th>
    <th>In Person Attendance</th>
    <th>Remote Attendance</th>
    <th>Total Attendance</th>
    <tr>
  </thead>';

if( sizeof($attendance) == 0 )
{
  echo '
  <div class="container">
    <h3>There are no attendance entries in the platform at the moment.</h3>
  </div>
  ';
}
else
{
  foreach ($attendance as $name => $value)
  {
    $report .= '<tr>
        <td>
          ' . $value[0] . '
        </td>
        <td>
          ' . $value[1] . '
        </td>
        <td>
          ' . $value[2] . '
        </td>
        <td>
          ' . $value[3] . '
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

$report .= '</table>';

// Print the report to the webpage
echo $report;

?>
