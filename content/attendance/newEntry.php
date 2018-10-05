<title>Event Manager - Attendance - New Entry</title>

<?php

include '../../functions/Init.php';
include '../../functions/DB.php';
include '../layout/LinkHandler.php';

protectAdmin();

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Attendance - New Entry</h1>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
  <li>
    <a link="index.php?display=Attendance" style="cursor:pointer;">
      Attendance
    </a>
  </li>
  <li>
    <a link="index.php?display=Attendance-EditEvent&event=<?php echo $_GET['event']; ?>&name=<?php echo $_GET['name']; ?>" style="cursor:pointer;">
      <?php echo str_replace("|", " ", $_GET['name']);?>
    </a>
  </li>
</ol>

<!-- Form STARTS here -->

<form class="container" method="POST" id="AttendanceNewEntry">
  <input name="display"   type="hidden" value="Attendance-EditEvent">
  <input name="created"   type="hidden" value="1">
  <input name="event"     type="hidden" value="<?php echo $_GET['event']; ?>">

  <hr>

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

  <div class="form-group">
    <label for="Event"> <label class="text-danger">*</label> Event:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="Event" type="text" class="form-control" value="<?php echo str_replace("|", " ", $_GET['name']);?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="EnterpriseID"> <label class="text-danger">*</label> Enterprise ID:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="EnterpriseID" type="text" class="form-control" id="EnterpriseID" placeholder="Enterprise ID goes here." aria-required="true">
    </div>
  </div>

  <div class="form-group">
    <label for="Type"> <label class="text-danger">*</label> Type:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="Type" id="Type" value="0" checked>
      <label class="form-check-label" for="Type">
        &nbsp;&nbsp;<i class="glyphicon glyphicon-user" style="color:gray"></i> - In Person
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="Type" id="Type" value="1">
      <label class="form-check-label" for="Type">
        &nbsp;&nbsp;<i class="glyphicon glyphicon-headphones" style="color:blue"></i> - Remote
      </label>
    </div>
  </div>

<hr>

<input class="btn btn-primary" type="submit" value="Submit">
<input class="btn btn-primary" type="reset"  value="Clear">

</form>
<!-- Form ENDS here -->
<br>

<!-- Begin Scripts for Inline Error Messages -->
<script type="text/javascript">

   $(document).ready(function()
   {
    $('#AttendanceNewEntry').bootstrapValidator(
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
			      EnterpriseID:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the Enterprise ID.'
                    }
                }
            },
            Type:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please select the Type.'
                    }
                }
            },
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
