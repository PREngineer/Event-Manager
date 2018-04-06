<?php

session_start();

include '../functions/DB.php';
include '../functions/Mail.php';

?>

<!-- Heading -->
<header role="banner">
  <h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Event Registration Cancellation</h1>
</header>

<?php

if( !empty($_GET) )
{
  $data = get_EventData( $_GET['id'] )[0];
}

?>

<h4>
Your cancellation has been received.
</h4>

<table style="width:50%">

<tr>
  <td style="width:50%">
    Event Name:
  </td>
  <td>
    <?php echo $data[1] ?>
  </td>
</tr>

<tr>
  <td>
    Event Date:
  </td>
  <td>
    <?php echo $data[2] ?>
  </td>
</tr>

<tr>
  <td>
    Event Location:
  </td>
  <td>
    <?php echo $data[7] ?>
  </td>
</tr>

<tr>
  <td>
    Event Reservation:
  </td>
  <td>
    <?php echo $_GET['eid'] ?>
  </td>
</tr>

</table>
