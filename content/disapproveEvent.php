<?php

include '../functions/DB.php';

$result = disapproveEvent( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?action=Events&disapproval=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?action=Events&disapproval=0";
    </script>
  ';
}
?>
