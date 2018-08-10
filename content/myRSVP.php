<title>Event Manager - My RSVPs</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">My RSVPs</h1>

<!-- Form STARTS here -->

<form class="container" method="POST" id="myRSVPForm">
  <input name="display" type="hidden" value="MyRSVP">
  <hr>

  <p><strong>Please provide your enterprise ID to look for your event reservations.</strong></p>

  <div class="form-group">
    <label for="enterpriseID"> <label class="text-danger">*</label> Enterprise ID</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="enterpriseID" type="text" class="form-control" id="enterpriseID" placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" required>
    </div>
    <small id="enterpriseIDHelp" class="form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>

<!-- ******************* Submit, Clear & Cancel Button ******************* -->
  </div >
    <div>
      <input class="btn btn-primary" type="submit" value="Submit">
      <button class="btn btn-primary" type="reset">Clear</button>
    </div>
</form>
<!-- Form ENDS here -->
<br>
<hr>
<br>

<!-- ******************* Display results ******************* -->
<?php
if( !empty($_GET) && ($_GET['display'] == 'MyRSVP') )
{
  $rsvps = get_MyRSVPs( $_GET['enterpriseID'] );

  if( sizeof($rsvps) == 0 && !empty($_POST) )
  {
    echo '
    <div class="container">
      <h3>There are no RSVPs for this Enterprise ID.</h3>
    </div>
    ';
  }
  else
  {
    foreach ($rsvps as $name => $value)
    {
      echo '
      <div class="col-sm-4">
        <div class="thumbnail" style="height: 500px;">
          <img src="../images/event.png" alt="Event image" width="150" height="150">
          <div class="caption">
              <table class="table">
                <tr>
                  <td class="text-center" colspan="2"><strong>' . $value[1] . '</strong></td>
                </tr>
                <tr>
                  <td>Date:</td>
                  <td>' . $value[2] . '</td>
                </tr>
                <tr>
                  <td>Location:</td>
                  <td>' . $value[3] . '</td>
                </tr>
                <tr>
                  <td>RSVP:</td>
                  <td>' . $value[4] . '</td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center">
                    <a link="index.php?display=CancelRSVP&id=' . $value[0] . '&eid=' . $value[4] . '&rsvpid=' . $value[5] . '" class="btn btn-danger" role="button">Cancel my RSVP</a>
                  </td>
                </tr>
              </table>
          </div>
        </div>
      </div>
      ';
    }
  }
}

?>

<script type="text/javascript">

   $(document).ready(function()
   {
    $('#myRSVPForm').bootstrapValidator(
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
            enterpriseID:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your enterprise ID.'
                    }
                }
            }
        }
      })

        .on('success.form.bv', function(e)
        {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
                $('#myRSVPForm').data('bootstrapValidator').resetForm();

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
