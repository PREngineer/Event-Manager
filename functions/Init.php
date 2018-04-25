<?php

// Initialize the session
session_start();

// Extend cookie life time
// A year in seconds = 365 days * 24 hours * 60 mins * 60 secs
$cookieLifetime = 365 * 24 * 60 * 60;
setcookie(session_name(),session_id(),time() + $cookieLifetime);

/*
  Function that checks if the user SESSION is active
  - Used all over the place
  @Return - Boolean (T or F) if logged in
*/
function logged_in()
{
  return ( isset($_SESSION['userID']) ) ? true : false;
}

// If the session's user_id variable doesn't exist, create it NULL
if(array_key_exists('userID', $_SESSION) === false)
{
	$_SESSION['userID'];
}

// If the session's user_id variable doesn't exist, create it NULL
if(array_key_exists('userRole', $_SESSION) === false)
{
	$_SESSION['userRole'];
}

// Redirect if settings was not found
if( !file_exists('../functions/settings.php') )
{
  echo '<script type="text/javascript">
      window.location.href = "../setup.php"
    </script>
  ';
}



?>
