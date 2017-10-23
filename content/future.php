<?php

include '../functions/DB.php';

$events = get_FutureEvents();

//print_r($events);
?>

<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("currentLink").classList.remove('active');
  document.getElementById("futureLink").classList.add('active');
  document.getElementById("createMemberLink").classList.remove('active');
  document.getElementById("approversLink").classList.remove('active');
  document.getElementById("pocLink").classList.remove('active');
  document.getElementById("adminLink").classList.remove('active');
</script>

<h1>Future Events</h1>

<div class="container">

<?php

foreach ($events as $name => $value)
{
  $url = 'http://' . $_SERVER['HTTP_HOST'] . '/content/index.php?action=rsvp?id=' . $value[0];

  echo '
  <div class="col-sm-3">
    <div class="thumbnail">
      <img src="../images/event.png" alt="Event image" width="150" height="150">
      <div class="caption">
          <table class="table">
            <tr>
              <td class="text-center" colspan="2"><h4>' . $value[1] . '</h4></td>
            </tr>
            <tr>
              <td>Date:</td>
              <td>' . $value[2] . '</td>
            </tr>
            <tr>
              <td>Starts:</td>
              <td>' . $value[3] . '</td>
            </tr>
            <tr>
              <td>Ends:</td>
              <td>' . $value[4] . '</td>
            </tr>
            <tr>
              <td>Location:</td>
              <td>' . $value[5] . '</td>
            </tr>
            <tr>
              <td class="text-center">
                <a href="?action=RSVP&id=' . $value[0] . '" class="btn btn-primary" role="button">RSVP</a>
              </td>
              <td>
                <a href="mailto:?subject=Thought%20you%20would%20like%20to%20know&body=Check%20out%20this%20event.%20%20' . $url . '" class="btn btn-success" role="button">Share</a>
              </td class="text-center">
            </tr>
          </table>
      </div>
    </div>
  </div>
  ';
}

?>

</div>
