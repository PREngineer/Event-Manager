<?php

include '../functions/DB.php';

$result = expireAnnouncement( $_GET['id'] );

if($result)
{
  echo'
    <script>
      window.location = "index.php?display=AnnouncementsMenu&expired=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?display=AnnouncementsMenu&expired=0";
    </script>
  ';
}

?>
