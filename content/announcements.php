<title>Event Manager - Announcements</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';

$announcements = get_Announcements();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Announcements</h1>

<hr>

<div id="PageContents" class="container">

<?php
  if( empty($_GET['display']) && sizeof($announcements) == 0 )
  {
    echo'
    <script>
      $("#Content").load("future.php");
    </script>
    ';
  }
  else if( $_GET['display'] == 'Announcements' && sizeof($announcements) == 0 )
  {
    echo '
    <div class="container">
      <h2>There are no Announcements to show.</h2>
    </div>
    ';
  }
  else
  {
    foreach ($announcements as $name => $value)
    {
      echo '
        <div class="col-lg-11 container thumbnail">
              <table role="presentation" class="table">
                <tr>
                  <td class="table text-center">
                    <p class="text-muted text-right">Posted: ' . $value[3] . '</p>
                    <h3><b>' . $value[1] . '</b></h3>
                  </td>
                </tr>
                <tr>
                  <td>' . $value[2] . '</td>
                </tr>
              </table>
        </div>
      ';
    }
  }
?>

</div>
