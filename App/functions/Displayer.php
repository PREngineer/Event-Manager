<?php

/*
This contains the form submission handlers as well as the get submission handlers.

This is used to determine which element will be loaded into the center of the page.
*/

/*
* Role Menus Handling
*/
{
  // Show POC page
  if( $_GET['display'] == 'Poc' )
  {
    echo'
      <script>
        $("#Content").load("pocs.php");
      </script>
    ';
  }

  // Show Admins page
  if( $_GET['display'] == 'Admin' )
  {
    echo'
      <script>
        $("#Content").load("admin.php");
      </script>
    ';
  }

  // Approver's Menu
  if( $_GET['display'] == 'Approver' )
  {
    echo'
      <script>
        $("#Content").load("approvers.php");
      </script>
    ';
  }
}

/*
* Announcement Handling
*/
{
  // Show Announcements
  if( $_POST['display'] == 'Announcements' || $_GET['display'] == 'Announcements' )
  {
    echo'
      <script>
        $("#Content").load("announcements.php");
      </script>
    ';
  }

  // Show Announcements Menu (admin)
  if( $_POST['display'] == 'AnnouncementsMenu' || $_GET['display'] == 'AnnouncementsMenu' )
  {
    echo'
      <script>
        $("#Content").load("announcementsMenu.php");
      </script>
    ';
  }

  // Create Announcement (admin)
  if( $_GET['display'] == 'CreateAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("createAnnouncement.php");
      </script>
    ';
  }

  // Post to Edit Announcement (admin)
  if( $_POST['display'] == 'EditAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("announcementsMenu.php");
      </script>
    ';
  }

  // Edit Announcement (admin)
  if( $_GET['display'] == 'EditAnnouncement' )
  {
    echo'
      <script>
        $("#Content").load("editAnnouncement.php?id=' . $_GET['id'] . '");
      </script>
    ';
  }
}

/*
* Attendance Handling
*/
{
  // Show Attendance
  if( $_POST['display'] == 'Attendance' || $_GET['display'] == 'Attendance' )
  {
    echo'
      <script>
        $("#Content").load("attendanceMenu.php");
      </script>
    ';
  }

  // Show Events to manage
  if( $_POST['display'] == 'AttendanceByEvent' || $_GET['display'] == 'AttendanceByEvent' )
  {
    echo'
      <script>
        $("#Content").load("attendance/events.php?init=sub");
      </script>
    ';
  }

  // Show People to manage
  if( $_POST['display'] == 'AttendanceByMember' || $_GET['display'] == 'AttendanceByMember' )
  {
    echo'
      <script>
        $("#Content").load("attendance/members.php?init=sub");
      </script>
    ';
  }

  // Show Event Attendance
  if( $_POST['display'] == 'Attendance-EditEvent' || $_GET['display'] == 'Attendance-EditEvent' )
  {
    echo'
      <script>
        $("#Content").load("attendance/editEvent.php?init=sub&event=' . $_GET['event'] . '&name=' . $_GET["name"] . '");
      </script>
    ';
  }

  // Show Event Attendance - Edit Entry form
  if( $_POST['display'] == 'Attendance-EventEditEntry' || $_GET['display'] == 'Attendance-EventEditEntry' )
  {
    echo'
      <script>
        $("#Content").load("attendance/editEntry.php?init=sub&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '&EnterpriseID=' .
        $_GET['EnterpriseID'] . '&Type=' . $_GET['Type'] . '&id=' . $_GET['id'] . '");
      </script>
    ';
  }

  // Show Event Attendance - New Entry form (event)
  if( $_POST['display'] == 'Attendance-EventNewEntry' || $_GET['display'] == 'Attendance-EventNewEntry' )
  {
    echo'
      <script>
        $("#Content").load("attendance/newEntry.php?init=sub&event=' . $_GET['event'] . '&name=' . $_GET['name'] . '");
      </script>
    ';
  }

  // Show Member to manage
  if( $_GET['display'] == 'Attendance-MemberEditEntry' )
  {
    if( empty($_POST) )
    {
      echo'
        <script>
          $("#Content").load("attendance/memberEditEntry.php?init=sub&Type=' . $_GET['Type'] . '&id=' . $_GET['id'] . '&EID=' . $_GET['EID'] .
          '&Event=' . $_GET['Event'] . '");
        </script>
      ';
    }
    else
    {
      echo'
        <script>
          $("#Content").load("attendance/memberEditEntry.php?init=sub&Type=' . $_POST['Type'] . '&id=' . $_GET['id'] . '&EID=' . $_GET['EID'] .
          '&Event=' . $_GET['Event'] . '");
        </script>
      ';
    }
  }

  // Show Event Attendance - New Entry form (member)
  if( $_POST['display'] == 'Attendance-MemberNewEntry' || $_GET['display'] == 'Attendance-MemberNewEntry' )
  {
    if( empty($_POST) )
    {
      echo'
        <script>
          $("#Content").load("attendance/memberNewEntry.php?init=sub&eid=' . $_GET['eid'] . '");
        </script>
      ';
    }
    else
    {
      echo'
        <script>
          $("#Content").load("attendance/showMember.php?init=sub&eid=' . $_GET['eid'] . '");
        </script>
      ';
    }
  }

  // Show Member to manage
  if( $_POST['display'] == 'Attendance-ShowMember' || $_GET['display'] == 'Attendance-ShowMember' )
  {
    echo'
      <script>
        $("#Content").load("attendance/showMember.php?init=sub&id=' . $_GET['id'] . '&eid=' . $_GET['eid'] . '");
      </script>
    ';
  }
}

/*
* Membership Handling
*/
{
  // Show Members Menu
  if( $_POST['display'] == 'Members' || $_GET['display'] == 'Members' )
  {
    echo'
      <script>
        $("#Content").load("membershipMenu.php");
      </script>
    ';
  }

  // Edit Member (Admins)
  if( $_GET['display'] == 'EditMember' )
  {
    echo'
    <script>
      $("#Content").load("editMember.php?display=' . $_GET['display'] . '&id=' . $_GET['id'] . '");
    </script>
    ';
  }
}

/*
* Event Handling
*/
{
  // Add Actual Budget and Close Events (POCs)
  if( $_GET['display'] == 'POCAddActual' )
  {
    echo'
    <script>
      $("#Content").load("addActualBudget.php?display=' . $_GET['display'] . '&id=' . $_GET['id'] . '");
    </script>
    ';
  }

  // Add Actual Budget and Close Events Menu (POCs)
  if( $_POST['display'] == 'POCAction' || $_GET['display'] == 'POCAction' )
  {
    echo'
    <script>
      $("#Content").load("pocActionPending.php");
    </script>
    ';
  }

  // Checkin
  if( $_POST['display'] == 'Checkin' || $_GET['display'] == 'Checkin' )
  {
    echo'
      <script>
        $("#Content").load("checkinForm.php");
      </script>
    ';
  }

  // Create Event
  if( $_GET['display'] == 'CreateEvent' )
  {
    echo'
      <script>
        $("#Content").load("createEvent.php");
      </script>
    ';
  }

  // Show Current Events
  if( $_POST['display'] == 'Current' || $_GET['display'] == 'Current' )
  {
    echo'
      <script>
        $("#Content").load("current.php");
      </script>
    ';
  }

  // Edit Events (Admins)
  if( $_GET['display'] == 'EditEvent' )
  {
    echo'
    <script>
      $("#Content").load("editEvent.php?display=' . $_GET['display'] . '&id=' . $_GET['id'] . '");
    </script>
    ';
  }

  // Show All Events (Admins)
  if( $_POST['display'] == 'Events' || $_GET['display'] == 'Events' )
  {
    echo'
      <script>
        $("#Content").load("events.php");
      </script>
    ';
  }

  // Show Future Events
  if( $_POST['display'] == 'Future' || $_GET['display'] == 'Future' )
  {
    echo'
      <script>
        $("#Content").load("future.php");
      </script>
    ';
  }

  // My Events
  if( $_POST['display'] == 'MyEvents' || $_GET['display'] == 'MyEvents' )
  {
    echo'
      <script>
        $("#Content").load("myEvents.php");
      </script>
    ';
  }
}

/*
* Member Handling
*/
{
  // Show Create Member Form
  if( $_POST['display'] == 'CreateMember' || $_GET['display'] == 'CreateMember' )
  {
    echo'
      <script>
        $("#Content").load("createMember.php");
      </script>
    ';
  }
}

/*
* RSVP Handling
*/
{
  // Request cancellation reason
  if( empty($_POST) && $_GET['display'] == 'doCancelRSVP' )
  {
    echo'
      <script>
        $("#Content").load("doCancelRSVP.php?id=' . $_GET['id'] . '&code=' . $_GET['code'] . '&rsvpid=' . $_GET['rsvpid'] . '&eid=' . $_GET['eid'] . '");
      </script>
    ';
  }

  // Show cancellation confirmation
  if( $_POST['display'] == 'doCancelRSVP' )
  {
    echo'
      <script>
        $("#Content").load("doCancelRSVP.php?id=' . $_GET['id'] . '&code=' . $_GET['code'] . '&rsvpid=' . $_GET['rsvpid'] . '&eid=' . $_GET['eid'] .
                                            '&post=' . $_POST['Answer'] . '");
      </script>
    ';
  }

  // Show cancellation request
  if( $_POST['display'] == 'CancelRSVP' || $_GET['display'] == 'CancelRSVP' )
  {
    echo'
      <script>
        $("#Content").load("cancelRSVP.php?id=' . $_GET['id'] . '&eid=' . $_GET['eid'] . '&rsvpid=' . $_GET['rsvpid'] . '");
      </script>
    ';
  }

  // Show My RSVPs
  if( $_POST['display'] == 'MyRSVP' || $_GET['display'] == 'MyRSVP' )
  {
    echo'
      <script>
        $("#Content").load("myRSVP.php?display=MyRSVP&enterpriseID=' . $_POST['enterpriseID'] . '");
      </script>
    ';
  }

  // RSVP Form
  if( $_POST['display'] == 'RSVP' || $_GET['display'] == 'RSVP' )
  {
    echo'
      <script>
        $("#Content").load("RSVPForm.php?id=' . $_GET['id'] . '");
      </script>
    ';
  }
}

/*
* Session Handling
*/
{
  // Login View
  if( $_GET['display'] == 'Login' )
  {
    echo'
      <script>
        $("#Content").load("login.php");
      </script>
    ';
  }

  // Login Posted
  if( $_POST['display'] == 'Login' )
  {
    echo'
      <script>
        $("#Content").load("login.php?username=' . $_POST['username'] . '&password=' . $_POST['password'] . '");
      </script>
    ';
  }

  // Logout
  if( $_GET['display'] == 'Logout' )
  {
    unset($_SESSION);
    unset($_COOKIE['Event-Manager']);
    session_destroy();

    echo '
      <script>
        window.location = "index.php";
      </script>
    ';
  }
}

/*
* Report Menu Handling
*/
{
  // Show Reports Menu (admin)
  if( $_POST['display'] == 'Reports' || $_GET['display'] == 'Reports' )
  {
    echo'
      <script>
        $("#Content").load("reports.php");
      </script>
    ';
  }
}

/*
* Membership Report Handling
*/
{
  // Show Membership Report 0 (admin)
  if( $_GET['display'] == 'MembershipReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=0");
      </script>
    ';
  }

  // Show Membership Report 1+ (admin)
  if( ($_GET['display'] == 'MembershipReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("memberReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* Attendance Report Handling
*/
{
  // Show Attendance Report 0 (admin)
  if( $_GET['display'] == 'AttendanceReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("attendanceReport.php?report=0");
      </script>
    ';
  }

  // Show Attendance Report 1+ (admin)
  if( ($_GET['display'] == 'AttendanceReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("attendanceReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* Budget Report Handling
*/
{
  // Show Budget Report 0 (admin)
  if( $_GET['display'] == 'BudgetReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("budgetReport.php?report=0");
      </script>
    ';
  }

  // Show Budget Report 1+ (admin)
  if( ($_GET['display'] == 'BudgetReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("budgetReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* Roles Report Handling
*/
{
  // Show Roles Report 0 (admin)
  if( $_GET['display'] == 'RolesReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=0");
      </script>
    ';
  }

  // Show Roles Report 1+ (admin)
  if( ($_GET['display'] == 'RolesReport') && isset($_GET['report']) )
  {
    echo'
      <script>
        $("#Content").load("rolesReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }
}

/*
* RSVP Report Handling
*/
{
  // Show RSVP - Events List (admin)
  if( $_GET['display'] == 'RSVPEvents' )
  {
    echo'
      <script>
        $("#Content").load("reports/rsvpEvents.php?init=sub&report=' . $_GET['report'] . '");
      </script>
    ';
  }

  // Show RSVP Report 0 (admin)
  if( $_GET['display'] == 'RSVPReport' && ( !isset($_GET['report']) ) )
  {
    echo'
      <script>
        $("#Content").load("rsvpReport.php?report=0");
      </script>
    ';
  }

  // Show RSVP Report 1+ (admin)
  if( ($_GET['display'] == 'RSVPReport') && isset($_GET['report']) && !isset($_GET['eventID']) )
  {
    echo'
      <script>
        $("#Content").load("rsvpReport.php?report=' . $_GET['report'] . '");
      </script>
    ';
  }

  // Show RSVP Report 4 (admin)
  if( ($_GET['display'] == 'RSVPReport') && isset($_GET['report']) && isset($_GET['eventID']) )
  {
    echo'
      <script>
        $("#Content").load("rsvpReport.php?report=' . $_GET['report'] . '&eventID=' . $_GET['eventID'] . '&eventName=' . $_GET['eventName'] . '");
      </script>
    ';
  }
}

/*
* User Roles Handling
*/
{
  // Show User Roles
  if( $_POST['display'] == 'UserRoles' || $_GET['display'] == 'UserRoles' )
  {
    echo'
      <script>
        $("#Content").load("userRoles.php");
      </script>
    ';
  }
}

?>
