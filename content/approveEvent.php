<?php

include '../functions/DB.php';

$result = approveEvent( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?action=Events&approval=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?action=Events&approval=0";
    </script>
  ';
}
?>
