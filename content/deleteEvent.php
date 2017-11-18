<?php

include '../functions/DB.php';

$result = deleteEvent( $_GET['id'] );

if($result && $_GET['return'] != "myEvents")
{
  echo'
    <script>
      window.location = "index.php?action=Events&delete=1";
    </script>
  ';
}
else if($result)
{
  echo'
    <script>
      window.location = "index.php?action=myEvents&delete=1";
    </script>
  ';
}
else if(!$result && $_GET['return'] != "myEvents")
{
  echo'
    <script>
      window.location = "index.php?action=Events&delete=0";
    </script>
  ';
}
else if(!$result)
{
  echo'
    <script>
      window.location = "index.php?action=myEvents&delete=0";
    </script>
  ';
}
?>
