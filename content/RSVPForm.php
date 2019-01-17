<title>Event Manager - Event RSVP</title>
<!-- ******************* START FORM ******************* -->
<form class="container" method="POST" id="rsvpForm">
  <input name="display" type="hidden" value="Future">
  <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">

  <!-- Heading -->
  <header role="banner">
    <h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Event Registration</h1>
  </header>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <!-- ****************** EnterpriseID Input *************** -->
  <div class="form-group">
      <label for="enterpriseID"> </label><label class="text-danger">*</label>EnterpriseID: </label>
      <div class="input-group">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-user"></i>
        </span>
        <input name="EID" type="text" class="form-control" id="EID" placeholder="john.p.doe" aria-describedby="EIDHelp" required>
      </div>
      <small id="EIDHelp" class="sr-only form-text text-muted">john.p.doe"</small>
  </div>


<!-- ****************** Submit Button *************** -->

  <div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

<br>

    <!-- ******************* END FORM ******************* -->

<script type="text/javascript">
   $(document).ready(function()
   {
    $('#rsvpForm').bootstrapValidator(
      {
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons:
        {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:
        {
            EID:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your Enterprise ID.'
                    }
                }
            },
        }
      })

        .on('success.form.bv', function(e)
        {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
                $('#rsvpPage').data('bootstrapValidator').resetForm();

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
