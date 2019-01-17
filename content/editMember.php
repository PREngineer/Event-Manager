<title>Event Manager - Admin - Members - Edit Member</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$member = ( get_Member($_GET['id']) )[0];

?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Edit Member</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
    </a>
  </li>
  <li>
    <a link="index.php?display=Members" style="cursor:pointer;">
      Members
    </a>
  </li>
</ol>

<!-- Form STARTS here -->

<form class="container" method="POST" id="editMemberForm">
  <input name="display" type="hidden" value="EditMember">
  <input name="id" type="hidden" value="<?php echo $_GET['id'];?>">

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="enterpriseID"> <label class="text-danger">*</label> Enterprise ID</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input value="<?php echo $member[1];?>" name="enterpriseID" type="text" class="form-control" id="enterpriseID" placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" required>
    </div>
    <small id="enterpriseIDHelp" class="form-text text-muted">Use the enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="active" style="margin-top:10px"><label class="text-danger">*</label> Member is Active</label>
    <div class="input-group form-control">
      <input name="active" type="radio" id="active" value="1" required <?php if($member[11] == 1){echo 'checked';}?>> Yes
    <br>
      <input name="active" type="radio" id="active" value="0" required <?php if($member[11] == 0){echo 'checked';}?>> No
    </div>
  </div>

  <div class="form-group">
    <label for="lead" style="margin-top:10px"><label class="text-danger">*</label> Member is Lead</label>
    <div class="input-group form-control">
      <input name="lead" type="radio" id="lead" value="1" required <?php if($member[12] == 1){echo 'checked';}?>> Yes
    <br>
      <input name="lead" type="radio" id="lead" value="0" required <?php if($member[12] == 0){echo 'checked';}?>> No
    </div>
  </div>

  <div class="form-group">
    <label for="role" style="margin-top:10px"><label class="text-danger">*</label> Application Role</label>
    <div class="input-group form-control">
      <input name="role" type="radio" id="role" value="0" required <?php if($member[13] == 0){echo 'checked';}?>> User
    <br>
      <input name="role" type="radio" id="role" value="1" required <?php if($member[13] == 1){echo 'checked';}?>> Point Of Contact
    <br>
      <input name="role" type="radio" id="role" value="2" required <?php if($member[13] == 2){echo 'checked';}?>> Administrator
    </div>
  </div>

  <div class="form-group">
    <label for="firstName"> <label class="text-danger">*</label> First Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input value="<?php echo $member[2];?>" name="firstName" type="text" class="form-control" id="firstName" placeholder="John" aria-describedby="firstNameHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="initials"> Middle Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input value="<?php echo $member[3];?>" name="initials" type="text" class="form-control" id="initials" placeholder="Paul or P" aria-describedby="initialsHelp">
    </div>
  </div>

  <div class="form-group">
    <label for="lastName"> <label class="text-danger">*</label> Last Name(s)</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input value="<?php echo $member[4];?>" name="lastName" type="text" class="form-control" id="lastName" placeholder="Doe" aria-describedby="lastNameHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="title"> <label class="text-danger">*</label> Title</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-sunglasses"></i>
      </span>
      <input value="<?php echo $member[6];?>" name="title" type="text" class="form-control" id="title" placeholder="Doe" aria-describedby="titleHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="email"> <label class="text-danger">*</label> E-mail</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input value="<?php echo $member[8];?>" name="email" type="email" class="form-control" id="email" placeholder="john.p.doe@company.com"
      aria-describedby="emailHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="segment" style="margin-top:10px"><label class="text-danger">*</label> Company Segment</label>
    <div class="input-group form-control">
      <input name="segment" type="radio" id="segment" value="Federal" required <?php if($member[7] == "Federal"){echo 'checked';}?>> Federal
    <br>
      <input name="segment" type="radio" id="segment" value="LLP" required <?php if($member[7] == "LLP"){echo 'checked';}?>> LLP
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
      <option <?php if($member[5] == "14"){echo 'selected';}?>>14</option>
      <option <?php if($member[5] == "13"){echo 'selected';}?>>13</option>
      <option <?php if($member[5] == "12"){echo 'selected';}?>>12</option>
      <option <?php if($member[5] == "11"){echo 'selected';}?>>11</option>
      <option <?php if($member[5] == "10"){echo 'selected';}?>>10</option>
      <option <?php if($member[5] == "9"){echo 'selected';}?>>9</option>
      <option <?php if($member[5] == "8"){echo 'selected';}?>>8</option>
      <option <?php if($member[5] == "7"){echo 'selected';}?>>7</option>
      <option <?php if($member[5] == "6"){echo 'selected';}?>>6</option>
      <option <?php if($member[5] == "Leadership"){echo 'selected';}?>>Leadership</option>
  </select>
  </div>
</div>

<div class="form-group">
  <div class="input-group">
    <span class="input-group pull-left">
      <input name="newsletter" id="newsletter" type="hidden" value="0" <?php if($member[9] == "0"){echo 'checked';}?>>
      <input name="newsletter" id="newsletter" type="checkbox" value="1" <?php if($member[9] == "1"){echo 'checked';}?>>
      Receives the ERG's Weekly Newsletter.
    </span>
  </div>
</div>

<div class="form-group">
  <div class="input-group">
    <span class="input-group pull-left">
      <input name="volunteer" id="volunteer" type="hidden" value="0" <?php if($member[10] == "0"){echo 'checked';}?>>
      <input name="volunteer" id="volunteer" type="checkbox" value="1" <?php if($member[10] == "1"){echo 'checked';}?>>
      Is in the ERG's Volunteer Pool <sup>*</sup>.
    </span>
  </div>
</div>

<!-- ******************* Submit, Clear & Cancel Button ******************* -->
  </div >
    <div>
      <input class="btn btn-primary" type="submit" value="Submit">
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
    $('#editMemberForm').bootstrapValidator(
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

            active:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter if the member is active.'
                    }
                }
            },

            lead:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter if the member is a lead.'
                    }
                }
            },

            role:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the member\'s role.'
                    }
                }
            }
        }
      })

        .on('success.form.bv', function(e)
        {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
                $('#editMemberForm').data('bootstrapValidator').resetForm();

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
