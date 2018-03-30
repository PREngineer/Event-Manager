<!-- Handle NavBar Highlights -->
<script>
  document.getElementById("currentLink").classList.remove('active');
  document.getElementById("futureLink").classList.remove('active');
  document.getElementById("createMemberLink").classList.remove('active');
  document.getElementById("loginLink").classList.add('active');
  document.getElementById("myRSVP").classList.remove("active");
</script>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Management Login</h1>

<!-- Form STARTS here -->
<form class="container" action="?action=login" method="POST" id="loginPage">
 <input name="action" type="hidden" value="login">

  <hr>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="enterpriseID"> <label class="text-danger">*</label> Enterprise ID</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="username" type="text" class="form-control" id="username" placeholder="john.p.doe" aria-describedby="usernameHelp" required>
    </div>
    <small id="usernameHelp" class="sr-only form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="Password"> <label class="text-danger">*</label> Password</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="password" type="password" class="form-control" id="password" placeholder="password" required>
    </div>
  </div>

  <!--Login Button-->
</div >
  <div>
    <input class="btn btn-primary" type="submit" value="Submit">
  </div>

</form>

<!-- ******************* END FORM ******************* -->

<script type="text/javascript">

   $(document).ready(function() {
    $('#loginPage').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter your Enterprise ID.'
                    }
                }
            },

            password: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter your password.'
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
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
      });
});

</script>
