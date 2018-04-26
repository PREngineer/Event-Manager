<title>Event Manager - Announcements Management Menu</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$announcements = get_Announcements();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">All Announcements</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the announcements that have been created.</div>
  <div class="panel-body">
    <a link="index.php?display=CreateAnnouncement" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Announcement</a>
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
                  <a link="index.php?display=EditAnnouncement&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i></a>
                  <a link="expireAnnouncement.php?id='   . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-time" title="Expire" style="color:red; padding-left:2em"></i></a>
                  <a link="deleteAnnouncement.php?id='   . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i></a>
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
