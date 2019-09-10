<title>Event Manager - Admin - Roles - Edit Role</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$role = ( get_Role($_GET['u']) )[0];

?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Edit Role</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a href="index.php?display=Admin" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin Menu
    </a>
  </li>
  <li>
    <a href="index.php?display=UserRoles" style="cursor:pointer;">
      User Roles
    </a>
  </li>
</ol>

<!-- Form STARTS here -->

<form class="container" method="POST" id="editRoleForm">
  <input name="display" type="hidden" value="EditRole">

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="enterpriseID"> <label class="text-danger">*</label> Enterprise ID</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input value="<?php echo $role[0];?>" name="enterpriseID" type="text" class="form-control" id="enterpriseID" placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" required>
    </div>
    <small id="enterpriseIDHelp" class="form-text text-muted">Use the enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="role" style="margin-top:10px"><label class="text-danger">*</label> Application Role</label>
    <div class="input-group form-control">
      <input name="role" type="radio" id="role" value="0" required <?php if($role[1] == 0){echo 'checked';}?>> User
    <br>
      <input name="role" type="radio" id="role" value="1" required <?php if($role[1] == 1){echo 'checked';}?>> Approver
	<br>
      <input name="role" type="radio" id="role" value="2" required <?php if($role[1] == 2){echo 'checked';}?>> Point Of Contact
    <br>
      <input name="role" type="radio" id="role" value="3" required <?php if($role[1] == 3){echo 'checked';}?>> Administrator
    </div>
  </div>
  
  <!-- ******************* Submit, Clear & Cancel Button ******************* -->
  <div>
    <input class="btn btn-primary" type="submit" value="Submit">
  </div>
</form>
<!-- Form ENDS here -->

<script type="text/javascript">

   $(document).ready(function()
   {
    $('#editRoleForm').bootstrapValidator(
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
                $('#editRoleForm').data('bootstrapValidator').resetForm();

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