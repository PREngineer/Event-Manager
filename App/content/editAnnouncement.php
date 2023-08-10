<title>Event Manager - Edit Announcement</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$details = get_Announcement($_GET['id'])[0];

// Process the <br /> from the Database so that it shows up correctly in the textarea
$text = str_replace("<br />",PHP_EOL,$details['2']);

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Edit Announcement</h1>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
    </a>
  </li>
  <li>
    <a link="index.php?display=AnnouncementsMenu" style="cursor:pointer;">
      All Announcements
    </a>
  </li>
</ol>

<!-- Form STARTS here -->

<form class="container" method="POST" id="editAnnouncementForm">
  <input name="display" type="hidden" value="AnnouncementsMenu">
  <input name="edited" type="hidden" value="1">
  <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">

  <hr>

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

  <div class="form-group">
    <label for="Title"> <label class="text-danger">*</label> Title:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="Title" type="text" class="form-control" id="Title" placeholder="Announcement title goes here."
            aria-required="true" value="<?php echo $details[1]; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="Text"> <label class="text-danger">*</label> Text:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <textarea name="Text" class="form-control" id="Text" placeholder="The message goes here."
            aria-required="true" rows="10"><?php echo $text; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="Date"> <label class="text-danger">*</label> Expiration Date:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input name="Date" class="form-control" type="text" id="Date" placeholder="YYYY-MM-DD" aria-required="true" value="<?php echo $details[4]; ?>">
    </div>
  </div>

  <script type="text/javascript">
    $('#Date').datepicker({
      format: "yyyy-mm-dd",
      startDate: '+0d',
      toggleActive: true,
      weekStart: 1,
      maxViewMode: 3,
      autoclose: true,
      daysOfWeekHighlighted: "1,2,3,4,5",
      todayHighlight: true
      }).on('changeDate', function (e) {
        $(this).focus();
    });
  </script>

<hr>

<input class="btn btn-primary" type="submit" value="Submit">
<input class="btn btn-primary" type="reset"  value="Clear">

</form>
<!-- Form ENDS here -->
<br>

<!-- Begin Scripts for Inline Error Messages -->
<script type="text/javascript">

   $(document).ready(function() {
    $('#editAnnouncementForm').bootstrapValidator({
        container: '#messages',
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			      Title: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Title.'
                    }
                }
            },
            Date: {
                // The hidden input will not be ignored
                excluded: false,
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Expiration Date.'
                    },
                    date: {
                        format: 'yyyy-mm-dd',
                        message: 'ERROR: The date format is not a valid. It should be YYY-mm-dd.'
                    }
                }
            },
            Text: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Text.'
                    }
                }
            },
        }
    })

    // POST if everything is OK
    .on('success.form.bv', function(e) {

          // Prevent form submission
          e.preventDefault();

          // Get the form instance
          var $form = $(e.target);

          // Get the BootstrapValidator instance
          var bv = $form.data('bootstrapValidator');

          // Use Ajax to submit form data
          $.post($form.attr('display'), $form.serialize(), function(result) {
              console.log(result);
          }, 'json');
    });
});

</script>
<!-- End Scripts for Inline Error Messages -->
