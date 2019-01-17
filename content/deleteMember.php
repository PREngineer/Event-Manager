<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectAdmin();

$result = deleteMember( $_GET['id'] );

if( $result && ($_GET['display'] == "Members") )
{
  echo'
    <script>
      window.location = "index.php?display=Members&MemberDeletion=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == "Members") )
{
  echo'
    <script>
      window.location = "index.php?display=Members&MemberDeletion=0";
    </script>
  ';
}

?>
