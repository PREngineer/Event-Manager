<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectPoc();

$result = recoverEvent( $_GET['id'] );

if( $result && ($_GET['display'] == 'Poc') )
{
  echo'
    <script>
      window.location = "index.php?display=MyEvents&EventRecovery=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == 'Poc') )
{
  echo'
    <script>
      window.location = "index.php?display=MyEvents&EventRecovery=0");
    </script>
  ';
}

if( $result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventRecovery=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventRecovery=0";
    </script>
  ';
}

?>
