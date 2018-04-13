<?php

session_start();

include '../functions/DB.php';

$announcements = get_Announcements();

echo '
<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("announcementsLink").classList.add("active");
  document.getElementById("currentLink").classList.remove("active");
  document.getElementById("futureLink").classList.remove("active");
  document.getElementById("createMemberLink").classList.remove("active");
  document.getElementById("loginLink").classList.remove("active");
  document.getElementById("myRSVP").classList.remove("active");
';

  if( $_SESSION['userRole'] == 1 )
  {
    echo 'document.getElementById("approversLink").classList.remove("active");';
  }
  if( $_SESSION['userRole'] == 2 )
  {
    echo 'document.getElementById("pocLink").classList.remove("active");';
  }
  if( $_SESSION['userRole'] == 3 )
  {
    echo 'document.getElementById("adminLink").classList.remove("active");';
  }

echo '</script>';

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Announcements</h1>

<div class="container">

  <?php

  if( sizeof($announcements) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no Announcements to show.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($announcements as $name => $value)
    {
      echo '
        <div class="col-lg-11 container thumbnail">
              <table class="table">
                <tr>
                  <td class="table text-center"><h4>' . $value[1] . '</h4></td>
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
