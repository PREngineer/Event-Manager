<title>Event Manager - Attendance - All Members</title>

<?php

include '../../functions/Init.php';
include '../../functions/DB.php';
include '../layout/LinkHandler.php';

protectAdmin();

$events = get_AllMembers();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Attendance - All Members</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
  <li>
    <a link="index.php?display=Attendance" style="cursor:pointer;">
      Attendance
    </a>
  </li>
</ol>

  <!-- Table -->
  <table class="table">

    <thead>

      <th>
        Enterprise ID
      </th>

      <th>
        Last Name
      </th>

      <th>
        First Name
      </th>

      <th>
        Initials
      </th>

      <th>
        E-mail
      </th>

      <th>
        Level
      </th>

      <th>
        Title
      </th>

      <th>
        Active
      </th>

    </thead>

<?php

  foreach ($events as $key => $value)
  {
    echo'
    <tr id="Entry' . $value[0] . '">

      <td>
        <a link="index.php?display=Attendance-ShowMember&eid=' . $value[1] . '" style="cursor:pointer";>
      ' . $value[1] . '
        </a>
      </td>

      <td>
      ' . $value[4] . '
      </td>

      <td>
      ' . $value[2] . '
      </td>

      <td>
      ' . $value[3] . '
      </td>

      <td>
      ' . $value[8] . '
      </td>

      <td>
      ' . $value[5] . '
      </td>

      <td>
      ' . $value[6] . '
      </td>

      <td>
    ';

      if( $value[11] == 1 )
      {
        echo '
            <i class="glyphicon glyphicon-ok-sign" title="Yes" style="color:green"></i>
        ';
      }
      else
      {
        echo '
            <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
        ';
      }
    echo '
      </td>

    </tr>';
  }
?>
  </table>
