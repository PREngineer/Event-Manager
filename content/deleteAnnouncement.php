<?php

include '../functions/DB.php';

$result = deleteAnnouncement( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?action=AnnouncementsMenu&deleted=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?action=AnnouncementsMenu&deleted=0";
    </script>
  ';
}

?>
