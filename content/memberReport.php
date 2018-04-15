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

$members = get_AllMembers();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Members Report</h1>

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
    <p>Welcome to your members reports!</p>
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
    <th>Given Name</th>
    <th>Initials</th>
    <th>Surname</th>
    <th>Career Level</th>
    <th>Title</th>
    <th>Company Segment</th>
    <th>Employee ID</th>
    <th>E-mail</th>
    <th>Newsletter</th>
    <th>Volunteer</th>
    <th>Active</th>
    <th>Lead</th>
    <th>Role</th>
    <tr>
  </thead>';

if( sizeof($members) == 0 )
{
  echo '
  <div class="container">
    <h3>There are no ERG members in the platform at the moment.</h3>
  </div>
  ';
}
else
{
  foreach ($members as $name => $value)
  {
    $report .= '<tr>
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
        <td>
          ' . $value[6] . '
        </td>
        <td>
          ' . $value[7] . '
        </td>
        <td>
          ' . $value[1] . '
        </td>
        <td>
          ' . $value[8] . '
        </td>
        <td>
          ' . $value[9] . '
        </td>
        <td>
          ' . $value[10] . '
        </td>
        <td>
          ' . $value[11] . '
        </td>
        <td>
          ' . $value[12] . '
        </td>
        <td>
          ' . $value[13] . '
        </td>
      </tr>
    ';
  }
}

$report .= '</table>';

// Print the report to the webpage
echo $report;

?>
