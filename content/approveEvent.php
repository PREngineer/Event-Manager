<?php

include '../functions/DB.php';

$result = approveEvent( $_GET['id'] );

if($result && $_GET['return'] != "approver")
{
  echo'
    <script>
      window.location = "index.php?action=Events&approval=1";
    </script>
  ';
}
else if($result)
{
  echo'
    <script>
      window.location = "index.php?action=approve&approval=1";
    </script>
  ';
}
else if(!$result && $_GET['return'] != "approver")
{
  echo'
    <script>
      window.location = "index.php?action=Events&approval=0";
    </script>
  ';
}
else if(!$result)
{
  echo'
    <script>
      window.location = "index.php?action=approve&approval=0";
    </script>
  ';
}
?>
