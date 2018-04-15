<?php
  // Include DB functions
  include '../functions/DB.php';
  session_start();

echo '
<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("currentLink").classList.remove("active");
  document.getElementById("futureLink").classList.remove("active");
  document.getElementById("createMemberLink").classList.remove("active");
  document.getElementById("loginLink").classList.remove("active");
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
    echo 'document.getElementById("adminLink").classList.add("active");';
  }

echo '</script>';

$announcements = get_Announcements();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">All Announcements</h1>

<ol class="breadcrumb">
  <li>
    <a href="?action=Admin">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the announcements that have been created.</div>
  <div class="panel-body">
    <a href="?action=createAnnouncement"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Announcement</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i> = Delete
    <i class="glyphicon glyphicon-time" title="Delete" style="color:red; padding-left:2em"></i> = Expire
  </div>

</div>

<?php

  foreach ($announcements as $key => $value)
  {
    echo '
      <div class="thumbnail">
            <table class="table">
              <tr>
                <td class="table text-center">
                <h6 class="text-muted text-right">Posted: ' . $value[3] . '</h6>
                <h6 class="text-muted text-right">Expires: ' . $value[4] . '</h6>

                <h4>' . $value[1] . '</h4>
                  <a href="?action=editAnnouncement&id=' . $value[0] . '"><i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i></a>
                  <a href="expireAnnouncement.php?id='   . $value[0] . '"><i class="glyphicon glyphicon-time" title="Expire" style="color:red; padding-left:2em"></i></a>
                  <a href="deleteAnnouncement.php?id='   . $value[0] . '"><i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i></a>
                </td>
              </tr>
              <tr>
                <td>' . $value[2] . '</td>
              </tr>
            </table>
      </div>
    ';
  }
?>
  </table>
