<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectPoc();

$result = deleteEvent( $_GET['id'] );

if( $result && ($_GET['display'] == 'Poc') )
{
  echo'
    <script>
      window.location = "index.php?display=MyEvents&EventDeletion=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == 'Poc') )
{
  echo'
    <script>
      window.location = "index.php?display=MyEvents&EventDeletion=0");
    </script>
  ';
}

if( $result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventDeletion=1";
    </script>
  ';
}
if( !$result && ($_GET['display'] == "Admin") )
{
  echo'
    <script>
      window.location = "index.php?display=Events&EventDeletion=0";
    </script>
  ';
}

?>
