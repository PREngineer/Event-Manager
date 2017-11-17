<?php

include '../functions/DB.php';

$result = recoverEvent( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?action=Events&recover=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?action=Events&recover=0";
    </script>
  ';
}
?>
