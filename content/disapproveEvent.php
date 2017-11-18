<?php

include '../functions/DB.php';

$result = disapproveEvent( $_GET['id'] );

if($result && $_GET['return'] != "approver")
{
  echo'
    <script>
      window.location = "index.php?action=Events&disapproval=1";
    </script>
  ';
}
else if($result)
{
  echo'
    <script>
      window.location = "index.php?action=approve&disapproval=1";
    </script>
  ';
}
else if(!$result && $_GET['return'] != "approver")
{
  echo'
    <script>
      window.location = "index.php?action=Events&disapproval=0";
    </script>
  ';
}
else if(!$result)
{
  echo'
    <script>
      window.location = "index.php?action=approve&disapproval=0";
    </script>
  ';
}
?>
