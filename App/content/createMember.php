<title>Event Manager - New Member Registration</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">New Member Registration</h1>

<hr>

<?php

if( $_SESSION['userRole'] == 3 )
{
  echo '
  <ol class="breadcrumb">
    <li>
      <a link="index.php?display=Admin" style="cursor:pointer;">
        <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
      </a>
    </li>
  </ol>
  ';
}

?>
<!-- Form STARTS here -->

<form class="container" method="POST" id="createMemberForm">
  <input name="display" type="hidden" value="CreateMember">

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

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

  <div class="form-group">
    <label for="firstName"> <label class="text-danger">*</label> First Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="firstName" type="text" class="form-control" id="firstName" placeholder="John" aria-describedby="firstNameHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="initials"> Middle Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="initials" type="text" class="form-control" id="initials" placeholder="Paul or P" aria-describedby="initialsHelp">
    </div>
  </div>

  <div class="form-group">
    <label for="lastName"> <label class="text-danger">*</label> Last Name(s)</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="lastName" type="text" class="form-control" id="lastName" placeholder="Doe" aria-describedby="lastNameHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="email"> <label class="text-danger">*</label> E-mail</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input name="email" type="email" class="form-control" id="email" placeholder="john.p.doe@company.com"
      aria-describedby="emailHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="segment" style="margin-top:10px"><label class="text-danger">*</label> Company Segment</label>
    <div class="input-group form-control">
      <input name="segment" type="radio" id="segment" value="Federal" required> Federal
    <br>
      <input name="segment" type="radio" id="segment" value="LLP" required> LLP
    </div>
  </div>

  <div class="form-group">
    <label for="level"><label class="text-danger">*</label> Career Level</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
    <select name="level" class="form-control" id="level" required>
      <option></option>
      <option>14</option>
      <option>13</option>
      <option>12</option>
      <option>11</option>
      <option>10</option>
      <option>9</option>
      <option>8</option>
      <option>7</option>
      <option>6</option>
      <option>Leadership</option>
  </select>
  </div>
</div>

<div class="form-group">
  <div class="input-group">
    <span class="input-group pull-left">
      <input name="newsletter" id="newsletter" type="hidden" value="0">
      <input name="newsletter" id="newsletter" type="checkbox" value="1">
      I want to be included in the ERG's Weekly Newsletter.
    </span>
  </div>
</div>

<div class="form-group">
  <div class="input-group">
    <span class="input-group pull-left">
      <input name="volunteer" id="volunteer" type="hidden" value="0">
      <input name="volunteer" id="volunteer" type="checkbox" value="1">
      I want to be part of the ERG's Volunteer Pool <sup>*</sup>.
    </span>
  </div>
</div>

<!-- ******************* Submit, Clear & Cancel Button ******************* -->
  </div >
    <div>
      <input class="btn btn-primary" type="submit" value="Submit">
      <button class="btn btn-primary" type="reset">Clear</button>
    </div>
</form>

<div class="form-group">
  <span><br><sup>*</sup>The volunteer pool is a list with all the members that would
    like to further help and contribute to the committees on any task related to
    the events, projects and/or voluntary service.<br></span>
  </div>

<!-- Form ENDS here -->

<script type="text/javascript">

   $(document).ready(function()
   {
    $('#createMemberForm').bootstrapValidator(
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
            },

            firstName:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your first name.'
                    }
                }
            },

            lastName:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your last name.'
                    }
                }
            },

            email:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your e-mail.'
                   }
                }
            },

            segment:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your company segment.'
                    }
                }
            },

            level:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your level.'
                    }
                }
            },
        }
      })

        .on('success.form.bv', function(e)
        {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
                $('#createMemberForm').data('bootstrapValidator').resetForm();

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
