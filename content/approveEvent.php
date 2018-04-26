<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectApprover();

$result = approveEvent( $_GET['id'] );

if( $result && ($_GET['display'] == 'Approver') )
{
  echo'
    <script>
      window.location = "index.php?display=Approver&EventApproval=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == 'Approver') )
{
  echo'
    <script>
      window.location = "index.php?display=Approver&EventApproval=0");
    </script>
  ';
}

if( $result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventApproval=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventApproval=0";
    </script>
  ';
}

?>
