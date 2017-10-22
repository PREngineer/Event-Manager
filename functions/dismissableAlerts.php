<?php

if( !empty($_POST) && ($_POST['action'] == 'createEvent') )
{
  echo '<div class="container alert alert-success alert-dismissible" role="alert">
  <button type = "button" class="close" data-dismiss = "alert">x</button>
          Your event has been successfully created!
        </div>';
}

if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{
  echo '<div class="container alert alert-success alert-dismissible" role="alert">
  <button type = "button" class="close" data-dismiss = "alert">x</button>
          The member has been successfully added!
        </div>';
}

/*if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{
  echo '<div class="container alert alert-success alert-dismissible" role="alert">
  <button type = "button" class="close" data-dismiss = "alert">x</button>
          The member has been successfully added!
        </div>';
}

if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{
  echo '<div class="container alert alert-success alert-dismissible" role="alert">
  <button type = "button" class="close" data-dismiss = "alert">x</button>
          The member has been successfully added!
        </div>';
}

if( !empty($_POST) && ($_POST['action'] == 'createMember') )
{
  echo '<div class="container alert alert-success alert-dismissible" role="alert">
  <button type = "button" class="close" data-dismiss = "alert">x</button>
          The member has been successfully added!
        </div>';
}*/

?>
