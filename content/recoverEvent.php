<?php

include '../functions/DB.php';

$result = recoverEvent( $_GET['id'] );

if($result && $_GET['return'] != "myEvents")
{
  echo'
    <script>
      window.location = "index.php?action=Events&recover=1";
    </script>
  ';
}
else if($result)
{
  echo'
    <script>
      window.location = "index.php?action=myEvents&recover=1";
    </script>
  ';
}
else if(!$result && $_GET['return'] != "myEvents")
{
  echo'
    <script>
      window.location = "index.php?action=Events&recover=0";
    </script>
  ';
}
else if(!$result)
{
  echo'
    <script>
      window.location = "index.php?action=myEvents&recover=0";
    </script>
  ';
}
?>
