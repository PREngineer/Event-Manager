<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectApprover();

$result = disapproveEvent( $_GET['id'] );

if( $result && ($_GET['display'] == 'Approver') )
{
  echo'
    <script>
      window.location = "index.php?display=Approver&EventDisapproval=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == 'Approver') )
{
  echo'
    <script>
      window.location = "index.php?display=Approver&EventDisapproval=0");
    </script>
  ';
}

if( $result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventDisapproval=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventDisapproval=0";
    </script>
  ';
}

?>
