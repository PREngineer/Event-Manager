<?php

include '../../functions/Init.php';
include '../../functions/DB.php';

protectAdmin();

$result = deleteAttendanceEntry( $_GET['id'] );

if( $result )
{
  echo'
    <script>
      window.location = "../index.php?display=' . $_GET['display'] . '&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&success=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "../index.php?display=' . $_GET['display'] . '&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&success=0";
    </script>
  ';
}

?>
