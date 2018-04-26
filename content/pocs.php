<title>Event Manager - Points of Contact</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectPoc();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Point Of Contact</h1>

<hr>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><p>Welcome <?php echo $_SESSION['userID']; ?>!</p></div>
  <div class="panel-body">
    <p>
      As a Point Of Contact, you have the options to create and manage events
      that have been created by you.  Please read about the options that you
      have available.
    </p>
  </div>
</div>

  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
      <th>Option</th>
      <th>Description</th>
      <tr>
    </thead>
    <tr>
      <td><a link="index.php?display=CreateEvent" style="cursor:pointer;">Create Event</a></td>
      <td>
        Use this option to create a New Event.
      </td>
    </tr>
    <tr>
      <td><a link="index.php?display=MyEvents" style="cursor:pointer;">My Events</a></td>
      <td>
        Use this option to view and manage your events.  You can perform the
        following actions on your existing events:<br>
        * Edit its details before the event occurs<br>
        * Delete an event before it occurs<br>
        * View all the events that you have created
      </td>
    </tr>
    <tr>
      <td><a link="index.php?display=POCAction" style="cursor:pointer;">Action Pending</a></td>
      <td>
        Use this option to add the actual budget and close past events.
      </td>
    </tr>
  </table>
