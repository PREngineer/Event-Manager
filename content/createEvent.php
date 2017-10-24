<!--
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.html" style="cursor: pointer;">Home</a></li>
  <li class="breadcrumb-item"><a link="pocs.html" style="cursor: pointer;">Point of Contact</a></li>
  <li class="breadcrumb-item active">Event Form</li>
</ol>
-->
<?php

include '../functions/DB.php';

$committees = get_Committees();

$types = get_EventTypes();

// Create an Array with all the Event Types in JavaScript
echo '
<script type="text/javascript">
  var eventTypes = [];
';

$i = 1;

foreach ($types as $entry => $value)
{
  echo 'eventTypes[' . $i . '] = "' . $value[1] . '";';
  $i++;
}

$objectives = get_EventObjectives();

// Create an Array with all the Event Objectives in JavaScript
echo '
  var eventObjectives = [];
  var objective;
';

$i = 1;

foreach ($objectives as $entry => $value)
{
  echo 'objective = {ID:"' . $value[0] . '", Name:"' . $value[1] . '"};';
  echo 'eventObjectives[' . $i . '] = objective;';
  $i++;
}

echo '</script>';

?>

<!-- Header -->
<a class="skip-navigation sr-only sr-only-focusable" href="#page-title">Skip Navigation</a>

<!-- Main -->
<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Create New Event</h1>

<!-- Top of the Error Message	
Note: disabled for now until I get the [#] fixed and how to display the "top of the page error messages" after submission.

<div class="alert alert-danger" role="alert">
	<h4 class="alert-heading">
	<span class="glyphicons glyphicons-exclamation-sign" aria-hidden="true"></span>
	This form contains [#] errors</h4>
	<hr>
	<ul>
		<li><a class="alert-link" href="#enterpriseID">Enterprise ID: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventName">Event Name: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventDate">Event Date: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventStartTime">Event Start Time: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventEndTime">Event End Time: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventLocation">Event Location: This is a required field.</a></li>
		<li><a class="alert-link" href="#estimatedBudget">Estimated Budget: This is a required field.</a></li>
		<li><a class="alert-link" href="#sponsorCommittee">Sponsor Committee: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventType">Event Type: This is a required field.</a></li>
		<li><a class="alert-link" href="#eventObjective">Event Objective: This is a required field.</a></li>
	</ul>
</div>
-->

<!-- Form STARTS here -->

<form class="container" method="POST" id="createEventForm">
  <input name="action" type="hidden" value="createEvent">
  <hr>

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

  <div class="form-group">
    <label for="enterpriseID"> <label class="text-danger">*</label> Enterprise ID:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="enterpriseID" type="text" class="form-control" id="enterpriseID" placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" aria-required="true">
    </div>
	<small id="enterpriseIDHelp" class="form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="eventName"> <label class="text-danger">*</label> Event Name:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="eventName" type="text" class="form-control" id="eventName" placeholder="e.g. Professional Development" aria-required="true">
    </div>
  </div>

  <div class="form-group">
    <label for="eventDate"> <label class="text-danger">*</label> Event Date:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input name="eventDate" class="form-control" type="text" id="eventDate" placeholder="YYYY-MM-DD" aria-required="true">
    </div>
  </div>

  <script type="text/javascript">
    $('#eventDate').datepicker({
      format: "yyyy-mm-dd",
      startDate: '+6d',
      weekStart: 1,
      maxViewMode: 3,
      todayBtn: "linked",
      autoclose: true,
      todayHighlight: true
      }).on('changeDate', function (e) {
        $(this).focus();
    });
  </script>

  <div class="form-group">
    <label for="eventStartTime"> <label class="text-danger">*</label> Event Start Time:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input name="eventStartTime" class="form-control" type="text" id="eventStartTime" placeholder="12:00 pm" aria-required="true">
    </div>
  </div>

  <script type="text/javascript">
  $(function(){
    $('#start').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>

  <div class="form-group">
    <label for="eventEndTime"> <label class="text-danger">*</label> Event End Time:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input name="eventEndTime" class="form-control" type="text" id="eventEndTime" placeholder="12:00 pm" aria-required="true">
    </div>
  </div>

  <script type="text/javascript">
  $(function(){
    $('#end').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>

  <div class="form-group">
    <label for="eventLocation"> <label class="text-danger">*</label> Event Location:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-search"></i>
      </span>
      <input name="eventLocation" type="text" class="form-control" id="eventLocation" placeholder="Glebe Office" aria-required="true">
    </div>
  </div>

  <div class="form-group">
    <label for="estimatedBudget"> <label class="text-danger">*</label> Estimated Budget:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input name="estimatedBudget" type="text" class="form-control" id="estimatedBudget" placeholder="1234.56" aria-describedby="estimatedBudgetHelp" aria-required="true">
    </div>
    <small id="estimatedBudgetHelp" class="form-text text-muted">Do not include commas.</small>
  </div>

<!--
  <div class="form-group">
    <label for="actualBudget">Actual Budget:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input name="actualBudget" type="text" class="form-control" id="actualBudget" placeholder="1234.56" aria-describedby="actualBudgetHelp">
    </div>
    <small id="actualBudgetHelp" class="form-text text-muted">Do not include commas.</small>
  </div>
-->

  <div class="form-group">
    <label for="sponsorCommittee"> <label class="text-danger">*</label> Sponsor Committee:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select name="sponsorCommittee" class="form-control" id="sponsorCommittee" aria-required="true">
  	     <option></option>
      <?php

         foreach ($committees as $entry => $value)
         {
           echo '<option>' . $value[1] . '</option>';
         }

      ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="eventType"> <label class="text-danger">*</label> Event Type:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select onchange="changeObjectives(this.value)" name="eventType" class="form-control" id="eventType" aria-required="true">
  	    <option></option>
        <?php

           foreach ($types as $entry => $value)
           {
             echo '<option>' . $value[1] . '</option>';
           }

        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="eventObjective"> <label class="text-danger">*</label> Event Objective:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select name="eventObjective" class="form-control" id="eventObjective" aria-required="true">
  	    <option></option>
      </select>
    </div>
  </div>
  

  <script type="text/javascript">

  // Mark the Dropdown to update
  var obj = document.getElementById("eventObjective");

  function changeObjectives(value){

    // Remove all previous options
    while(obj.firstChild)
    {
      obj.removeChild(obj.firstChild);
    }
    if(obj.selectedIndex == 0)
    {
      return;
    }

    // First put the empty option on top
    var o = document.createElement("option");
    o.value = '';
    o.text = '';
    obj.appendChild(o);

    // Find the ID of the selected event type
    for(var i = 1; i < eventTypes.length; i++)
    {
      // Grab the id of the event type
      if(eventTypes[i] == value)
      {
        // Look for all Objectives that belong to that Event Type
        for(var j = 1; j < eventObjectives.length; j++)
        {
          // If it belongs to that one, create an option
          if(eventObjectives[j].ID == i)
          {
            o = document.createElement("option");
            o.value = eventObjectives[j].Name;
            o.text = eventObjectives[j].Name;
            obj.appendChild(o);
          }
        }
      }
    }
  }
  </script>

<hr>

<input class="btn btn-primary" type="submit" value="Submit">
<input class="btn btn-primary" type="reset"  value="Clear">

</form>
<!-- Form ENDS here -->
<br>

<!-- Begin Footer -->
	<!-- Include some footer links? -->	
<!-- End Footer -->
 
 
<!-- Begin Scripts for Inline Error Messages -->
<script type="text/javascript">

   $(document).ready(function() {
    $('#createEventForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		
        fields: {
			
            enterpriseID: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter your Enterprise ID.'
                    }
                }
            },
			
             eventName: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Event Name.'
                    }
                }
            },

            eventDate: {
              // The hidden input will not be ignored
                excluded: false,
                validators: {
                    notEmpty: {
                      message: 'ERROR: Please enter the Event Date.'
                    },
                    date: {
                        format: 'yyyy-mm-dd',
                        message: 'ERROR: The date is not a valid'
                    }
                }
            },
			
			eventStartTime: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Event Start Time.'
                    }
                }
            },
			
            eventEndTime: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Event End Time.'
                    }
                }
            },
			
			eventLocation: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please select the Event Location.'
                    }
                }
            },
			
            estimatedBudget: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Estimated Budget.'
                    }
                }
            },
			
            sponsorCommittee: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please select the Sponsor Committee.'
                    }
                }
            },

            eventType: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please select the Event Type.'
                    }
                }
            },
			
            eventObjective: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please select the Event Objective.'
                    }
                }
            },
			
          }
        })

        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#createEventForm').data('bootstrapValidator').resetForm();

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
<!-- End Scripts for Inline Error Messages -->