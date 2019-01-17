<title>Event Manager - Edit Event</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectPoc();

$committees = get_Committees();

$types = get_EventTypes();

$objectives = get_EventObjectives();

$eventData = get_EventData($_GET['id'])[0];

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

// Create an Array with all the Event Objectives in JavaScript
echo '
  var eventObjectives = [];
  var objective;
';

$i = 1;

foreach ($objectives as $entry => $value)
{
  if( $value[1] == $eventData[10] )
  {
    echo 'var selectedObjective = "' . $eventData[10] . '";';
  }
  echo 'objective = {ID:"' . $value[0] . '", Name:"' . $value[1] . '"};';
  echo 'eventObjectives[' . $i . '] = objective;';
  $i++;
}

echo '</script>';

?>

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Edit Existing Event</h1>

<hr>

<?php

if( $_SESSION['userRole'] == 2 )
{
  echo '<ol class="breadcrumb">
          <li>
            <a link="index.php?display=Poc" style="cursor:pointer;">
              <i class="glyphicon glyphicon-arrow-left"></i> POC Menu
            </a>
          </li>
          <li>
            <a link="index.php?display=MyEvents" style="cursor:pointer;">
              My Events
            </a>
          </li>
        </ol>';
}
else
{
  echo '<ol class="breadcrumb">
          <li>
            <a link="index.php?display=Admin" style="cursor:pointer;">
              <i class="glyphicon glyphicon-arrow-left"></i> Admin
            </a>
          </li>
          <li>
            <a link="index.php?display=Events" style="cursor:pointer;">
              All Events
            </a>
          </li>
        </ol>';
}

?>
<!-- Form STARTS here -->

<form class="container" method="POST" id="createEventForm">
<?php
if( $_SESSION['userRole'] == '2' )
{
  echo '
    <input name="display" type="hidden" value="MyEvents">
    <input name="edited" type="hidden" value="1">
  ';
}
else
{
  echo '
    <input name="display" type="hidden" value="Events">
    <input name="edited" type="hidden" value="1">
  ';
}
?>
  <input name="id" type="hidden" value="<?php echo $_GET['id'];?>">

  <p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

  <div class="form-group">
    <label for="creator"> <label class="text-danger">*</label> Enterprise ID:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="creator" type="text" class="form-control" id="creator"
      placeholder="john.p.doe" aria-describedby="enterpriseIDHelp" aria-required="true"
      value="<?php echo $eventData[12]; ?>">
    </div>
	<small id="enterpriseIDHelp" class="form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="eventName"> <label class="text-danger">*</label> Event Name:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="eventName" type="text" class="form-control" id="eventName"
      placeholder="e.g. Professional Development" aria-required="true" value="<?php echo $eventData[1]; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="eventDate"> <label class="text-danger">*</label> Event Date:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input name="eventDate" class="form-control" type="text" id="eventDate"
      placeholder="YYYY-MM-DD" aria-required="true" value="<?php echo $eventData[2]; ?>">
    </div>
  </div>

  <script type="text/javascript">
    $('#eventDate').datepicker({
      format: "yyyy-mm-dd",
      startDate: '+6d',
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

  <div class="form-group">
    <label for="start"> <label class="text-danger">*</label> Event Start Time:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input name="start" class="form-control" type="text" id="start" placeholder="12:00 pm" aria-required="true"
       value="<?php echo $eventData[3]; ?>">
    </div>
  </div>

  <script type="text/javascript">
  $(function(){
    $('#start').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>

  <div class="form-group">
    <label for="end"> <label class="text-danger">*</label> Event End Time:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input name="end" class="form-control" type="text" id="end" placeholder="12:00 pm" aria-required="true"
       value="<?php echo $eventData[4]; ?>">
    </div>
  </div>

  <script type="text/javascript">
  $(function(){
    $('#end').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>

  <div class="form-group">
    <label for="location"> <label class="text-danger">*</label> Event Location:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-search"></i>
      </span>
      <input name="location" type="text" class="form-control" id="location" placeholder="Glebe Office" aria-required="true"
       value="<?php echo $eventData[7]; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="estimatedBudget"> <label class="text-danger">*</label> Estimated Budget:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input name="estimatedBudget" type="text" class="form-control" id="estimatedBudget"
      placeholder="1234.56" aria-describedby="estimatedBudgetHelp" aria-required="true"
       value="<?php echo $eventData[5]; ?>">
    </div>
    <small id="estimatedBudgetHelp" class="form-text text-muted">Do not include commas.</small>
  </div>

<?php

if($_SESSION['userRole'] == 3)
{
  echo '
  <div class="form-group">
    <label for="actualBudget"> <label class="text-danger">*</label> Actual Budget:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input name="actualBudget" type="text" class="form-control" id="actualBudget"
      placeholder="1234.56" aria-describedby="actualBudgetHelp" aria-required="true"
       value="' . $eventData[6] . '">
    </div>
    <small id="actualBudgetHelp" class="form-text text-muted">Do not include commas.</small>
  </div>
  ';
}
else
{
  echo '<input name="actualBudget" type="hidden" value="0">';
}

?>

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
           if($value[1] == $eventData[8])
           {
             echo '<option selected>';
           }
           else
           {
             echo '<option>';
           }
           echo $value[1] . '</option>';
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
             if($value[1] == $eventData[9])
             {
               echo '<option selected>';
             }
             else
             {
               echo '<option>';
             }
             echo $value[1] . '</option>';
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
              if(o.value == selectedObjective)
              {
                o.selected = true;
              }
                obj.appendChild(o);
            }
          }
        }
      }
    }
  </script>

<hr>

<input class="btn btn-primary" type="submit" value="Submit">

</form>
<!-- Form ENDS here -->
<br>

<!-- Begin Scripts for Inline Error Messages -->
<script type="text/javascript">

   $(document).ready(function() {
    $('#createEventForm').bootstrapValidator({
        container: '#messages',
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			      creator: {
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
                        message: 'ERROR: The date format is not a valid. It should be YYY-mm-dd.'
                    }
                }
            },
			      start: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Event Start Time.'
                    }
                }
            },
            end: {
                validators: {
                    notEmpty: {
                        message: 'ERROR: Please enter the Event End Time.'
                    }
                }
            },
			      location: {
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
            }
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

window.onload = changeObjectives( ( document.getElementById("eventType") ).value);
</script>
<!-- End Scripts for Inline Error Messages -->
