<title>Event Manager - Add Event's Actual Budget</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectPoc();

$eventData = get_EventData($_GET['id'])[0];

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Add Actual Budget</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Poc" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> POC Menu
    </a>
  </li>
  <li>
    <a link="index.php?display=POCAction" style="cursor:pointer;">
      Actions Pending
    </a>
  </li>
</ol>

<!-- Form STARTS here -->

<form class="container" method="POST" id="createEventForm">
  <input name="display" type="hidden" value="POCAction">
  <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">

  <div class="panel panel-default">
    <div class="panel-heading">
      <p>
        <strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong>
      </p>
    </div>
  </div>

  <div class="form-group">
    <label for="actualBudget"><label class="text-danger">*</label> Actual Budget:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input name="actualBudget" type="text" class="form-control" id="actualBudget"
      placeholder="1234.56" aria-describedby="actualBudgetHelp" aria-required="true">
    </div>
    <small id="actualBudgetHelp" class="form-text text-muted">Do not include commas.</small>
  </div>

  <input class="btn btn-primary" type="submit" value="Submit">
  <input class="btn btn-primary" type="reset"  value="Clear">

  <hr>

  <div class="panel panel-default">
    <div class="panel-heading">Please make sure that the budget belongs to the following event data.</div></div>
  </div>

  <div class="form-group">
    <label for="creator">Enterprise ID:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="creator" type="text" class="form-control" id="creator"
      placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" aria-required="true"
      value="<?php echo $eventData[12]; ?>" disabled>
    </div>
	<small id="enterpriseIDHelp" class="form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="eventName">Event Name:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="eventName" type="text" class="form-control" id="eventName"
      placeholder="e.g. Professional Development" aria-required="true" value="<?php echo $eventData[1]; ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="eventDate">Event Date:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input name="eventDate" class="form-control" type="text" id="eventDate"
      placeholder="YYYY-MM-DD" aria-required="true" value="<?php echo $eventData[2]; ?>" disabled>
    </div>
  </div>

  <script type="text/javascript">
    $('#eventDate').datepicker(
    {
      format: "yyyy-mm-dd",
      startDate: '+6d',
      toggleActive: true,
      weekStart: 1,
      maxViewMode: 3,
      autoclose: true,
      daysOfWeekHighlighted: "1,2,3,4,5",
      todayHighlight: true
    }).on('changeDate', function (e)
    {
      $(this).focus();
    });
  </script>

  <div class="form-group">
    <label for="start">Event Start Time:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input name="start" class="form-control" type="text" id="start" placeholder="12:00 pm" aria-required="true"
       value="<?php echo $eventData[3]; ?>" disabled>
    </div>
  </div>

  <script type="text/javascript">
  $(function()
  {
    $('#start').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>

  <div class="form-group">
    <label for="end">Event End Time:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input name="end" class="form-control" type="text" id="end" placeholder="12:00 pm" aria-required="true"
       value="<?php echo $eventData[4]; ?>" disabled>
    </div>
  </div>

  <script type="text/javascript">
  $(function()
  {
    $('#end').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>

  <div class="form-group">
    <label for="location">Event Location:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-search"></i>
      </span>
      <input name="location" type="text" class="form-control" id="location" placeholder="Glebe Office" aria-required="true"
       value="<?php echo $eventData[7]; ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="estimatedBudget">Estimated Budget:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input name="estimatedBudget" type="text" class="form-control" id="estimatedBudget"
      placeholder="1234.56" aria-describedby="estimatedBudgetHelp" aria-required="true"
       value="<?php echo $eventData[5]; ?>" disabled>
    </div>
    <small id="estimatedBudgetHelp" class="form-text text-muted">Do not include commas.</small>
  </div>

  <div class="form-group">
    <label for="sponsorCommittee">Sponsor Committee:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select name="sponsorCommittee" class="form-control" id="sponsorCommittee" aria-required="true" disabled>
  	     <option><?php echo $eventData[8]; ?></option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="eventType">Event Type:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select onchange="changeObjectives(this.value)" name="eventType" class="form-control" id="eventType" aria-required="true" disabled>
  	    <option><?php echo $eventData[9]; ?></option>
        </select>
    </div>
  </div>

  <div class="form-group">
    <label for="eventObjective">Event Objective:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select name="eventObjective" class="form-control" id="eventObjective" aria-required="true" disabled>
  	    <option><?php echo $eventData[10]; ?></option>
      </select>
    </div>
  </div>

<hr>

</form>
<!-- Form ENDS here -->
<br>

<!-- Begin Scripts for Inline Error Messages -->
<script type="text/javascript">

   $(document).ready(function()
   {
    $('#createEventForm').bootstrapValidator(
    {
        container: '#messages',
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons:
        {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:
        {
			      actualBudget:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the Actual Budget.'
                    }
                }
            }
        }
    })

    // POST if everything is OK
    .on('success.form.bv', function(e)
    {
          // Prevent form submission
          e.preventDefault();

          // Get the form instance
          var $form = $(e.target);

          // Get the BootstrapValidator instance
          var bv = $form.data('bootstrapValidator');

          // Use Ajax to submit form data
          $.post($form.attr('display'), $form.serialize(), function(result)
          {
              console.log(result);
          }, 'json');
    });
});
</script>
<!-- End Scripts for Inline Error Messages -->
