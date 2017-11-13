<!-- Close the alerts after 5 seconds -->
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);
</script>

<?php

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

if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{

}

?>
