<!-- Close the alerts after 5 seconds -->
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);
</script>

<?php

// Message upon Creation of Events
if( !empty($_POST) && ($_POST['action'] == 'createEvent') )
{
  $res = insert_newEvent($_POST);

  if( $res == True)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            Your event has been created!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] ' . count($res) . ' Error(s) occurred while creating the event!<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Creation of Events
if( !empty($_POST) && ($_POST['action'] == 'editEvent') )
{
  $res = update_Event($_POST, $_GET['id']);

  if( $res == True)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            Your event has been updated!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] ' . count($res) . ' Error(s) occurred while updating the event!<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Approval of Events
if( isset($_GET['approval']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'approve') ) )
{
  if( $_GET['approval'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been approved!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while approving the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Disapproval of Events
if( isset($_GET['disapproval']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'approve') ) )
{
  if( $_GET['disapproval'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been disapproved!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while disapproving the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Deletion of Events
if( isset($_GET['delete']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'myEvents') ) )
{
  if( $_GET['delete'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been deleted!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while deleting the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

// Message upon Recovery of Events
if( isset($_GET['recover']) && ( ($_GET['action'] == 'Events') || ($_GET['action'] == 'myEvents') ) )
{
  if( $_GET['recover'] == 1)
  {
    echo '<div class="container alert alert-success alert-dismissible" role="alert">
            <button type = "button" class="close" data-dismiss = "alert">x</button>
            The event has been recovered!
          </div>';
  }
  else
  {
    echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            [!] An error occurred while recovering the event!  Please, try again.<br><br>' .
            $res .
          '</div>';
  }
}

if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{

}

?>
