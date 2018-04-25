<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

?>

<!-- Heading -->
<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Event Registration Cancellation</h1>

<hr>

<?php

if( !empty($_GET) )
{
  $data = get_EventData( $_GET['id'] )[0];
}

?>

<h2>
Your cancellation has been received.
</h2>

<br>

<table style="width:50%">

<tr>
  <td style="width:50%">
    <strong>Event Name:</strong>
  </td>
  <td>
    <?php echo $data[1] ?>
  </td>
</tr>

<tr>
  <td>
    <strong>Event Date:</strong>
  </td>
  <td>
    <?php echo $data[2] ?>
  </td>
</tr>

<tr>
  <td>
    <strong>Event Location:</strong>
  </td>
  <td>
    <?php echo $data[7] ?>
  </td>
</tr>

<tr>
  <td>
    <strong>Event Reservation:</strong>
  </td>
  <td>
    <?php echo $_GET['eid'] ?>
  </td>
</tr>

</table>

<br><br>
