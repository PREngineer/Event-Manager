<title>Event Manager - Actions Pending</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectPoc();

$events = get_MyEventsPendingAction($_SESSION['userID']);

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Actions Pending</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Poc" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> POC Menu
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $_SESSION['userID'];?>, here are all the open past events that do not have their Actual Budget.</div>
  <div class="panel-body">
    <i class="glyphicon glyphicon-question-sign" title="Recover" style="color:orange; padding-left:2em"></i> = Provide Actual Budget and Close
  </div>
</div>

<!-- Table -->
<table class="table">

  <thead>
    <th>
      Options
    </th>

    <th>
      Name
    </th>

    <th>
      Date
    </th>

    <th>
      Created
    </th>

    <th>
      Creator
    </th>

    <th>
      <i class="glyphicon glyphicon-user" title="In Person Code" style="color:black"></i> Code
    </th>

    <th>
      <i class="glyphicon glyphicon-headphones" title="Remote Code" style="color:black"></i> Code
    </th>

    <th>
      Approved
    </th>

    <th>
      <i class="glyphicon glyphicon-flag" title="Estimated Budget" style="color:blue"><i class="glyphicon glyphicon-usd" title="Estimated Budget" style="color:black"></i></i>
    </th>

    <th>
      <i class="glyphicon glyphicon-ok" title="Actual Budget" style="color:green"><i class="glyphicon glyphicon-usd" title="Actual Budget" style="color:black"></i></i>
    </th>

    <th>
      Deleted
    </th>

  </thead>

<?php

  foreach ($events as $key => $value)
  {
    echo'
    <tr>

      <td>
        <a link="index.php?display=POCAddActual&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-question-sign" title="Edit" style="color: orange"></i></a>
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

      <td>
      ' . $value[6] . '
      </td>

      <td>
    ';
    if( $value[7] == 1 )
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

      <td>
      ' . $value[8] . '
      </td>

      <td>
    ';
    if( $value[9] == "" )
    {
    echo '
              <i class="glyphicon glyphicon-remove-sign" title="No" style="color:red"></i>
    ';
    }
    else
    {
          echo $value[9];
    }
    echo '
      </td>

      <td>
    ';
      if( $value[10] == 1 )
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
