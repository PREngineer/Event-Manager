<?php

include '../functions/DB.php';

$result = deleteEvent( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?action=Events&delete=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?action=Events&delete=0";
    </script>
  ';
}
?>
