<?php

// Handle Form Submissions
if( $_POST['action'] == 'createMember')
{
  echo'
<script>
$("#Content").load("createMember.html");
</script>
  ';
}

if( $_POST['action'] == 'createEvent')
{
  echo'
<script>
$("#Content").load("createEvent.php");
</script>
  ';
}

//print_r($_POST);

?>
