<title>Event Manager - Event Check-In</title>
<form class="container" method="POST" id="checkinForm">
  <input name="display" type="hidden" value="Checkin">

  <h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Event Check-In</h1>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label class="form_label" for="enterpriseID"><label class="text-danger">*</label>Enterprise ID:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input class="form-control" id="enterpriseID" type="text" name="enterpriseID" aria-required="true" placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" required>
    </div>
    <small id="enterpriseIDHelp" class="sr-only form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label class="form_label" for="code"> <label class="text-danger">*</label>Event Code: </label>
    <div class="input-group">
      <span class="input-group-addon">
        <span aria-hidden="true"><em class="glyphicon glyphicon-barcode"></em></span>
      </span>
      <input name="code" type="text" class="form-control" id="code" placeholder="abc123" aria-describedby="codeHelp" required>
    </div>
      <small id="codeHelp" class="sr-only form-text text-muted"></small>
  </div>

  <div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

<script type="text/javascript">
     $(document).ready(function()
     {
      $('#checkinForm').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          feedbackIcons:
          {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields:
          {
              enterpriseID:
              {
                  validators:
                  {
                      notEmpty:
                      {
                          message: 'ERROR: Please enter your Enterprise ID.'
                      }
                  }
              },
              code:
              {
                  validators:
                  {
                      notEmpty:
                      {
                          message: 'ERROR: Please enter a valid passcode.  This code is provided during the event.'
                      }
                  }
              },
          }
        })

          .on('success.form.bv', function(e)
          {
              $('#success_message').slideDown({ opacity: "show" }, "slow")
                  $('#loginPage').data('bootstrapValidator').resetForm();

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
