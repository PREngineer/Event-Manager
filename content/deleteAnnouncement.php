<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectAdmin();

$result = deleteAnnouncement( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?display=AnnouncementsMenu&deleted=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?display=AnnouncementsMenu&deleted=0";
    </script>
  ';
}

?>
