<?php

include '../functions/DB.php';

$result = expireAnnouncement( $_GET['id'] );

print_r($_GET);

echo $result;

if($result)
{
  echo'
    <script>
      window.location = "index.php?action=AnnouncementsMenu&expired=1";
    </script>
  ';
}
else
{
  echo'
    <script>
      window.location = "index.php?action=AnnouncementsMenu&expired=0";
    </script>
  ';
}

?>
