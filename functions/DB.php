<?php
/*
This contains all of the Database related functions.
*/

/*
*****************************
Region Start - Testing MySQL Setup
*****************************
*/

/*
  Description:
    This function validates if we can open a connection to MySQL.
  @PARAM:
    1. [String] User - The MySQL username
    2. [String] Pass - The MySQL password
    3. [String] Host - The MySQL Host
    4. [String] Port - The MySQL Port
  @RETURN:
    [Boolean] - True  - for success
    [String]  - Error - for failure
*/
Function test_MySQL($user, $pass, $host, $port)
{
  // Open Connection
  $link = mysqli_init();

  $connection = mysqli_real_connect(
   $link,
   $host.':'.$port,
   $user,
   $pass
  );

  // If not successful
  if (!$connection)
  {
    mysqli_close();
    return mysqli_connect_error();
  }
  // If connection was successful
  else
  {
    mysqli_close();

    // Save settings to file
    $file = 'functions/settings.php';

    $content = '
    <?php
      $DBUSER = "' . $user . '";
      $DBPASS = "' . $pass . '";
      $DB     = "Event_Manager";
      $DBHOST = "' . $host . '";
      $DBPORT = "' . $port . '";
      $DBTYPE = "mysql";
    ?>';

    file_put_contents($file, $content);

    return True;
  }
}


/*
*****************************
Region Start - MySQL DB Setup Functions
*****************************
*/

/*
  Description:
    This function adds an admin user to the Users Table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
*/
Function create_adminUser()
{
  $pass = hash( 'sha256', SHA1( MD5("password") ) );
  $create = query_DB("INSERT INTO `Users`
                      (`Username`, `Password`, `Role`)
                      VALUES ('administrator','" . $pass . "','3')");

  if( $create['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Description:
    This function creates the Announcements table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_AnnouncementsTable()
{
  return query_DB("CREATE TABLE `Announcements` (
    `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Announcement ID',
    `Title` text NOT NULL COMMENT 'Announcement Title',
    `Content` text NOT NULL COMMENT 'Announcement Content',
    `Posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When the announcement was posted',
    `Expires` date NOT NULL COMMENT 'When the Announcement should be removed',
    PRIMARY KEY (`ID`)
    )
    ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT
    CHARSET=utf8
    COMMENT='Contains all the announcements that will be displayed'");
}

/*
  Description:
    This function creates the Attendance table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_AttendanceTable()
{
  return query_DB("CREATE TABLE `Attendance` (
    `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Unique id for entry',
    `EventID` bigint(20) NOT NULL COMMENT 'Event ID',
    `EnterpriseID` text NOT NULL COMMENT 'Enterprise ID',
    `Type` tinyint(1) NOT NULL COMMENT 'Type of Attendee',
    `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time attendance was taken',
    PRIMARY KEY (`ID`) )
    ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT
    CHARSET=utf8
    COMMENT='Contains all event attendance history'");
}

/*
  Description:
    This function creates the Database.
  @PARAM:
    1. [String] User - The MySQL username
    2. [String] Pass - The MySQL password
    3. [String] Host - The MySQL Host
    4. [String] Port - The MySQL Port
  @RETURN:
    [Boolean] - True for success
    [Boolean] - False for failure
*/
Function setup_DB($user, $pass, $host, $port)
{
  // Join Host + Port
  $url = $host.':'.$port;

  $conn = new mysqli($url, $user, $pass);

  if ( !empty($conn->connect_error) )
  {
      //echo "Errors: " . $conn->connect_error;
      mysqli_close();

      return $conn->connect_error;
  }

  // Create the database
  $sql = "CREATE DATABASE Event_Manager
          DEFAULT CHARACTER SET = 'utf8'
          DEFAULT COLLATE = 'utf8_general_ci'";

  $dbCreation = $conn->query($sql);

  if ( !empty($conn->error) )
  {
      //echo "Errors: " . $conn->error;
      mysqli_close();

      return $conn->error;
  }

  return $dbCreation;
}

/*
  Description:
    This function creates the Committee table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_DIMCommitteeTable()
{
  $create = query_DB("CREATE TABLE `Event_Manager`.`DIM Committee` (
            `Committee_ID` VARCHAR(255) NOT NULL COMMENT 'Committee ID' ,
            `Committee_Name` TEXT NOT NULL COMMENT 'Committe Name' ,
            PRIMARY KEY (`Committee_ID`))
            ENGINE  = InnoDB
            CHARSET = utf8
            COLLATE utf8_general_ci
            COMMENT = 'Contains all the committee information'");

  if( $create['Result'] )
  {
    return query_DB("INSERT INTO `DIM Committee` (`Committee_ID`, `Committee_Name`)
            VALUES  ('C1',          'Recruiting'),
                    ('C2',          'Local Marketing'),
                    ('C3',          'Membership Engagement'),
                    ('C4',          'Professional Development'),
                    ('C5',          'Community Outreach'),
                    ('C6',          'Communication'),
                    ('CA',          'Advisory Board'),
                    ('CA-Sponsor',  'HAERG Lead Sponsor'),
                    ('CL',          'DC HAERG Co-Leads'),
                    ('CS',          'Support - Metrics & Compliance')");
  }
  else
  {
    return $create;
  }
}

/*
  Description:
    This function creates the Event Type table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_DIMEventTypeTable()
{
  $create = query_DB("CREATE TABLE `Event_Manager`.`DIM Event Type` (
            `ID` BIGINT NOT NULL COMMENT 'Type ID' ,
            `Name` TEXT NOT NULL COMMENT 'Type Name' ,
            PRIMARY KEY (`ID`))
            ENGINE  = InnoDB
            CHARSET = utf8
            COLLATE utf8_general_ci
            COMMENT = 'Contains all the Event Types'");

  if( $create['Result'] )
  {
    return query_DB("INSERT INTO `DIM Event Type` (`ID`, `Name`)
            VALUES  ('1',   'People -> Attract'),
                    ('2',   'People -> Development'),
                    ('3',   'People -> Retain'),
                    ('4',   'People -> Vigilance & Visibility'),
                    ('5',   'Community -> Service'),
                    ('6',   'Community -> Attract'),
                    ('7',   'Community -> Vigilance & Visibility'),
                    ('8',   'Market -> Attract'),
                    ('9',   'Market -> Develop'),
                    ('10',  'Market -> Vigilance & Visibility')");
  }
  else
  {
    return $create;
  }
}

/*
  Description:
    This function creates the Event Objective table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_DIMEventObjectiveTable()
{
  $create = query_DB("CREATE TABLE `Event_Manager`.`DIM Event Objective` (
            `ID` BIGINT NOT NULL COMMENT 'Type ID',
            `Name` TEXT NOT NULL COMMENT 'Objective Name')
            ENGINE  = InnoDB
            CHARSET = utf8
            COLLATE utf8_general_ci
            COMMENT = 'Contains all the Event Objectives'");

  if( $create['Result'] )
  {
    return query_DB("INSERT INTO `DIM Event Objective` (`ID`, `Name`)
            VALUES  ('1',   'Networking'),
                    ('2',   'Mentorship'),
                    ('2',   'Skills to Succeed'),
                    ('2',   'Leading in the New'),
                    ('2',   'Community of Practice'),
                    ('3',   'Networking'),
                    ('3',   'Networking (Happy Hour)'),
                    ('4',   'Corporate Citizenship'),
                    ('5',   'Philantropy'),
                    ('5',   'Fundraiser'),
                    ('6',   'I&D Recruiting'),
                    ('7',   'Sponsorship'),
                    ('8',   'Prospective Clients'),
                    ('8',   'Client Connection'),
                    ('9',   'Sponsorship'),
                    ('9',   'Networking'),
                    ('9',   'Networking (Happy Hour)'),
                    ('10',  'Relationship I&D'),
                    ('10',  'Cross ERG')");
  }
  else
  {
    return $create;
  }
}

/*
  Description:
    This function creates the RSVP table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_EventChangeLogTable()
{
  return query_DB("CREATE TABLE `Event_Manager`.`Event Change Log` (
    `ID` BIGINT NOT NULL AUTO_INCREMENT COMMENT 'Entry ID' ,
    `EventID` BIGINT NOT NULL COMMENT 'Event ID' ,
    `Type` TEXT NOT NULL COMMENT 'Action type' ,
    `Reason` TEXT NOT NULL COMMENT 'Reason for the change' ,
    `Timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the person made the change' ,
    PRIMARY KEY (`ID`) )
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all event change history'");
}

/*
  Description:
    This function creates the Events table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_EventsTable()
{
  return query_DB("CREATE TABLE `Events` (
                  `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Event ID',
                  `Name` text NOT NULL COMMENT 'Event name',
                  `Date` date NOT NULL COMMENT 'Event date',
                  `Start` time NOT NULL COMMENT 'Event start time',
                  `End` time NOT NULL COMMENT 'Event end time',
                  `Estimated_Budget` double NOT NULL COMMENT 'Event estimated eudget',
                  `Actual_Budget` double NOT NULL DEFAULT '0' COMMENT 'Event actual budget',
                  `Location` text NOT NULL COMMENT 'Event location',
                  `Committee_ID` text NOT NULL COMMENT 'Committee in charge of the event',
                  `Type` text NOT NULL COMMENT 'Event Type',
                  `Objective` text NOT NULL COMMENT 'Event objective',
                  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation timestamp',
                  `Creator` text NOT NULL COMMENT 'Event Creator',
                  `Person_Code` text NOT NULL COMMENT 'Code to give people that attend in person',
                  `Remote_Code` text NOT NULL COMMENT 'Code to give people that attend remotely',
                  `Approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If the Event was approved',
                  `Deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If the Event was marked for deletion',
                  PRIMARY KEY (`ID`)
                  )
                  ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT
                  CHARSET=utf8
                  COMMENT='Contains all the event information'");
}

/*
  Description:
    This function creates the Leads table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_LeadsTable()
{
  return query_DB("CREATE TABLE `Event_Manager`.`Leads` (
    `ID` BIGINT NOT NULL COMMENT 'Enterprise ID' ,
    `Committee_ID` TEXT NOT NULL COMMENT 'Committee ID' ,
    PRIMARY KEY (`ID`))
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all the committee leads'");
}

/*
  Description:
    This function creates the Members table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_MembersTable()
{
  return query_DB("CREATE TABLE `Members` (
    `ID` BIGINT NOT NULL AUTO_INCREMENT COMMENT 'Unique value for each entry',
    `EID` TEXT NOT NULL COMMENT 'Member enterprise ID',
    `FName` text NOT NULL COMMENT 'Member first name',
    `Initials` text COMMENT 'Member initials',
    `LName` text NOT NULL COMMENT 'Member last name',
    `Level` int(11) NOT NULL COMMENT 'Member level',
    `Title` text COMMENT 'Member title',
    `Segment` text NOT NULL COMMENT 'Company Segment (Commercial, Federal)',
    `Email` text NOT NULL COMMENT 'Member e-mail',
    `Newsletter` tinyint(1) NOT NULL COMMENT 'Wants to receive newsletter',
    `Volunteer` tinyint(1) NOT NULL COMMENT 'Wants to be a volunteer',
    `Active` tinyint(1) DEFAULT NULL COMMENT 'Is an active member',
    `Lead` tinyint(1) DEFAULT NULL COMMENT 'Is a lead',
    `Role` int(11) DEFAULT '1' COMMENT 'Member role in the portal',
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT
    CHARSET=utf8
    COMMENT='Contains all the member information'");
}

/*
  Description:
    This function creates the RSVP table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_RSVPTable()
{
  return query_DB("CREATE TABLE `Event_Manager`.`RSVP` (
    `ID` BIGINT NOT NULL AUTO_INCREMENT COMMENT 'Entry ID' ,
    `EventID` BIGINT NOT NULL COMMENT 'Event ID' ,
    `EnterpriseID` TEXT NOT NULL COMMENT 'Enterprise ID' ,
    `Cancel` BOOLEAN NOT NULL COMMENT 'Was it cancelled' ,
    `Timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the person registered',
    PRIMARY KEY (`ID`) )
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all event registration history'");
}

/*
  Description:
    This function creates the Users table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_UsersTable()
{
  return query_DB("CREATE TABLE `Event_Manager`.`Users` (
    `Username` VARCHAR(200) NOT NULL COMMENT 'Username' ,
    `Password` TEXT NOT NULL COMMENT 'Password' ,
    `Role` BIGINT NOT NULL COMMENT 'User Role'  ,
    PRIMARY KEY (`Username`))
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all accounts'");
}

/*
*****************************
Region Start - Regular Use MySQL DB Setup Functions
*****************************
*/

/*
  Description:
    This function opens a connection to the specific database.
  @PARAM:
    NONE
  @RETURN:
    [Connection] - Connection For success
    [Boolean]    - False for failure
*/
Function connect_DB()
{
  // Make sure to load the DB Variables
  if( file_exists('../functions/settings.php') )
  {
    include '../functions/settings.php';
  }
  else
  {
    include 'functions/settings.php';
  }

  // Join Host + Port
  $url = $DBHOST . ':' . $DBPORT;

  //echo 'DBHOST: ' . $DBHOST . ' DBPORT: ' . $DBPORT . ' DBUSER: ' . $DBUSER . ' DBPASS: ' . $DBPASS . ' DB: ' . $DB;

  // Open Connection
  $connection = @mysqli_connect( $url, $DBUSER, $DBPASS, $DB );

  // If not successful
  if (!$connection)
  {
    //echo "An error occurred while connecting to the MySQL DB: " .
    //  mysqli_connect_error();
  	return False;
  }
  else
  {
    //echo "Successfully connected to the Database!";
    return $connection;
  }
}

/*
  Description:
    This function executes a query to the specified database.
  @PARAM:

  @RETURN:
    - If successful
    [Array] - Result = True
            - Data   = Array
    - If failure
    [Array] - Result = False
            - Errors = Array
*/
Function query_DB($query)
{
  $con    = connect_DB();

  $result = mysqli_query($con, $query);

  if( empty( mysqli_error($con) ) )
  {
    // Close connection
    mysqli_close ($con);

    return array( "Result"=>True, "Data"=>$result );
  }
  else
  {
    // Grab the errors
    $errors = mysqli_error($con);

    // Close connection
    mysqli_close($con);

    return array( "Result"=>False, "Errors"=>$errors );
  }
}

/*
  Description:
    This function prevents SQL Injection.
  @PARAM:
    String - A string
  @RETURN:
    String - The sanitized string
*/
Function sanitize($string)
{
  $string = str_replace("'", "", $string);
  $string = str_replace('"', "", $string);
  $string = str_replace("\0", "", $string);
  $string = str_replace("\b", "", $string);
  $string = str_replace("\n", "", $string);
  $string = str_replace("\r", "", $string);
  $string = str_replace("\t", "", $string);
  $string = str_replace("\Z", "", $string);
  $string = str_replace("\\", "", $string);
  $string = str_replace("%", "", $string);
  $string = str_replace("\_", "", $string);
  $string = str_replace("`", "", $string);
  $string = str_replace(";", "", $string);
  $string = str_replace(",", "", $string);
  return $string;
}

/*
*****************************
Region Start - Session Related Session Functions
*****************************
*/

/*
  Description:
    This function checks if the user credentials provided are correct
  @PARAM:
    [Array] - Array containing all the user Data
    1. Username
    2. Password
    3. Role
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
*/
Function check_login($data)
{
  $check = query_DB("SELECT Count(Username)
                      FROM `Users`
                      WHERE `Username` = '" . $data['username'] . "'
                      AND `Password` = '" . $data['password'] . "'");

  if( $check['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that validates if the user information is correct to initiate SESSION
  - User in the Login Page
  @Param - Two Strings
  @Return - Boolean (T or F) if correct
*/
function login($username, $password)
{
  // Sanitize the username & password
  //$username = sanitize($username);
  //$password = sanitize($password);

  // Encrypt password with MD5->SHA1->SHA256
  $password = hash( 'sha256', SHA1( MD5($password) ) );

  // Check if the username & password combination exists
  $query = query_DB("SELECT COUNT(`Username`)
                    FROM `Users`
                    WHERE `Username` = '$username'
                    AND `Password` = '$password'");

  if( $query['Result'] )
  {
    if( mysqli_fetch_all($query['Data'])[0][0] == 1 )
    {
      $res = query_DB("SELECT `Username`, `Role`
                        FROM `Users`
                        WHERE `Username` = '$username'
                        AND `Password` = '$password'");
      return $res;
    }
    else
    {
      return False;
    }
  }
  else
  {
    return $query['Errors'];
  }
}

/*
*****************************
Region Start - Regular Use MySQL DB Get Functions
*****************************
*/

/*
  Description:
    This function executes a query to get all the events in the DB.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_AllEvents()
{
  $date = date('Y-m-d');
  $time = date('H:i:s');

  $result = query_DB("SELECT `ID`, `Name`, `Date`, `Created`, `Creator`, `Person_Code`, `Remote_Code`,
                             `Approved`, `Estimated_Budget`, `Actual_Budget`, `Deleted`
                      FROM `Events`
                      ORDER BY `Date`,`Start`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the announcements in the DB.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_Announcements()
{
  $date = date('Y-m-d');

  $result = query_DB("SELECT *
                      FROM `Announcements`
                      WHERE `Expires` >= '$date'
                      ORDER BY `Expires`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get a specific announcement details from the DB.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_Announcement($id)
{
  $result = query_DB("SELECT *
                      FROM `Announcements`
                      WHERE `ID` = '$id'");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the unapproved events in the DB.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_approverEvents()
{
  $date = date('Y-m-d');
  $time = date('H:i:s');

  $result = query_DB("SELECT `ID`, `Name`, `Date`, `Created`, `Creator`, `Person_Code`, `Remote_Code`,
                             `Approved`, `Estimated_Budget`, `Actual_Budget`, `Deleted`
                      FROM `Events`
                      WHERE `Date` > '$date'
                      AND `Deleted` = '0'
                      ORDER BY `Date`,`Start`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the DIM Committee entries.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_Committees()
{
  $result = query_DB("SELECT * FROM `DIM Committee`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the current events.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_CurrentEvents()
{
  $date = date('Y-m-d');
  $time = date('H:i:s');

  $result = query_DB("SELECT `ID`, `Name`,`Date`,`Start`,`End`,`Location`
                      FROM `Events`
                      WHERE `Date` = '$date'
                      AND `Start` <= '$time'
                      AND `End` >= '$time'
                      AND `Approved` = 1
                      AND `Deleted` = 0
                      ORDER BY `Date`,`Start`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the events in the DB.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_EventData($id)
{
  $result = query_DB("SELECT *
                      FROM `Events`
                      WHERE `ID` = '$id'");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the DIM Event Obective entries.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_EventObjectives()
{
  $result = query_DB("SELECT * FROM `DIM Event Objective`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the DIM Event Type entries.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_EventTypes()
{
  $result = query_DB("SELECT * FROM `DIM Event Type`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the future events.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_FutureEvents()
{
  $date = date('Y-m-d');

  $result = query_DB("SELECT `ID`, `Name`,`Date`,`Start`,`End`,`Location`
                      FROM `Events`
                      WHERE `Date` > '$date'
                      AND `Approved` = 1
                      AND `Deleted` = 0
                      ORDER BY `Date`,`Start`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the POC's events in the DB.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_MyEvents($id)
{
  $date = date('Y-m-d');
  $time = date('H:i:s');

  $result = query_DB("SELECT `ID`, `Name`, `Date`, `Created`, `Creator`, `Person_Code`, `Remote_Code`,
                             `Approved`, `Estimated_Budget`, `Actual_Budget`, `Deleted`
                      FROM `Events`
                      WHERE `Creator` LIKE '$id'
                      AND `Date` > '$date'
                      ORDER BY `Date`,`Start`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get all the RSVPS for an Enterprise ID.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_myRSVPs($id)
{
  $date = date('Y-m-d');

  $result = query_DB("SELECT DISTINCT
                        Events.ID         AS EventID,
                        Events.Name       AS EventName,
                        Events.Date       AS EventDate,
                        Events.Location   AS EventLocation,
                        RSVP.EnterpriseID AS UserID
                      FROM `Events`,`RSVP`
                      WHERE Date >= '$date'
                      AND Approved = '1'
                      AND Deleted = '0'
                      AND Events.ID IN
                      (SELECT EventID FROM `RSVP`
                        WHERE EnterpriseID = '$id')
                      AND RSVP.EnterpriseID = '$id'");

  if( $result['Result'] )
  {
    // If successful
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    // If failure
    return $result['Errors'];
  }
}

/*
*****************************
Region Start - Regular Use MySQL DB Insert Functions
*****************************
*/

/*
  Description:
    This function executes a query to insert a new Announcement.
  @PARAM:

  @RETURN:
    [Boolean] - True
    [Array]   - Errors
*/
Function insert_newAnnouncement($data)
{
  $text = nl2br($data['Text']);

  // Insert into the Events Table
  $result = query_DB( "INSERT INTO `Announcements`
              (`Title`,`Content`,`Expires`)
              VALUES (
                '" . sanitize($data['Title']) . "',
                '" . sanitize($text)          . "',
                '" . sanitize($data['Date'])  . "')"
            );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to insert a new Event.
  @PARAM:

  @RETURN:
    [Boolean] - True
    [Array]   - Errors
*/
Function insert_newEvent($data)
{

  $code1 = substr( MD5( date('Y-m-d H:i:s') ), 0, 6 );
  $code2 = substr( MD5( date('Y-m-d H-i-s') ), 0, 6 );

  // Insert into the Events Table
  $result = query_DB( "INSERT INTO `Events`
            (`Name`, `Date`, `Start`, `End`, `Estimated_Budget`, `Location`, `Committee_ID`,
              `Type`, `Objective`, `Creator`, `Person_Code`, `Remote_Code`)
            VALUES (
              '" . sanitize($data['eventName'])        . "', '" . sanitize($data['eventDate'])        . "',
              '" . sanitize($data['start'])            . "', '" . sanitize($data['end'])              . "',
              '" . sanitize($data['estimatedBudget'])  . "', '" . sanitize($data['location'])         . "',
              '" . sanitize($data['sponsorCommittee']) . "', '" . sanitize($data['eventType'])        . "',
              '" . sanitize($data['eventObjective'])   . "', '" . sanitize($data['creator'])          . "',
              '" . $code1                              . "', '" . $code2 . "' )" );

  // If successful
  if( $result['Result'] )
  {
    // Get the Event's ID
    $result = query_DB( "SELECT `ID`
                         FROM `Events`
                         WHERE `Name` = '" . $data['eventName'] . "'");

    // Grab the Event ID
    $evID = ( ( mysqli_fetch_all( $result['Data'] ) )[0] )[0];

    // If got it
    if( $result['Result'] )
    {
      // Create the Log Entry
      $result = query_DB( "INSERT INTO `Event Change Log`
                (`EventID`, `Type`, `Reason`)
                VALUES (
                  '" . $evID                     . "', 'Create',
                  'New Event Creation Form')" );

      // If successful
      if( $result['Result'] )
      {
        return True;
      }
    }
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function adds a Member to the Members Table
  @PARAM:
    [Array] - Array containing all the user Data
    1. enterpriseID
    2. firstName
    3. initials
    4. lastName
    5. email
    6. segment
    7. level
    8. newsletter
    9. volunteer
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
*/
Function insert_newMember($data)
{
  $exists = ( mysqli_fetch_all( query_DB("SELECT COUNT(ID)
                      FROM `Members`
                      WHERE `ID`      = '" . $data['enterpriseID'] . "'")[Data] )[0] )[0];

  // If the user does not exist
  if( $exists == 0 )
  {
    $insert = query_DB("INSERT INTO `Members`
                      (`ID`, `FName`, `Initials`,`LName`,`Email`,`Segment`,`Level`,`Newsletter`,`Volunteer`,`Role`)
                      VALUES ('" . $data['enterpriseID'] . "',
                              '" . $data['firstName'] . "',
                              '" . $data['initials'] . "',
                              '" . $data['lastName'] . "',
                              '" . $data['email'] . "',
                              '" . $data['segment'] . "',
                              '" . $data['level'] . "',
                              '" . $data['newsletter'] . "',
                              '" . $data['volunteer'] . "',
                              '0')");

    if( $insert['Result'] )
    {
      // If successful
      return 1;
    }
    else
    {
      // If failed
      return 0;
    }
  }
  else
  {
    // If user already exists
    return 2;
  }
}

/*
  Description:
    This function adds a user to the Users Table
  @PARAM:
    [Array] - Array containing all the user Data
    1. Username
    2. Password
    3. Role
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
*/
Function insert_newUser($data)
{
  $insert = query_DB("INSERT INTO `Users`
                      (`Username`, `Password`, `Role`)
                      VALUES ('" . $data['Username'] . "','" . $data['Password'] . "','" . $data['Role'] . "')");

  if( $insert['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Description:
    This function adds a user entry to the Attendance Table
  @PARAM:
    1. [String] - Employee ID
    2. [String] - Event ID
    3. [Bool]   - Attendance Type
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
    [Int]     - 2 for already in Table
*/
Function user_checkIn($eid, $id, $type)
{
  $exists = ( mysqli_fetch_all( query_DB("SELECT COUNT(EventID)
                      FROM `Attendance`
                      WHERE `EventID`      = '" . $id . "'
                      AND   `EnterpriseID` = '" . $eid . "'")[Data] )[0] )[0];

  // If the user has not alreay checked in
  if( $exists == 0 )
  {
    $checkIn = query_DB("INSERT INTO `Attendance`
                        (`EventID`, `EnterpriseID`, `Type`)
                        VALUES ('" . $id . "','" . $eid . "','" . $type . "')");

    if( $checkIn['Result'] )
    {
      // If successful
      return True;
    }
    else
    {
      // If failed
      return False;
    }
  }
  else
  {
    // If user is already checked in
    return 2;
  }
}

/*
  Description:
    This function adds a user entry to the RSVP Table
  @PARAM:
    1. [String] - Employee ID
    2. [String] - Event ID
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
    [Int]     - 2 for already in Table
*/
Function user_RSVP($eid, $id)
{
  // Check if the user has already RSVPed
  $exists = ( mysqli_fetch_all(
                query_DB("SELECT COUNT(EventID)
                        FROM `RSVP`
                        WHERE `EventID`      = '" . $id . "'
                        AND   `EnterpriseID` = '" . $eid . "'"
                )[Data]
              )[0]
            )[0];

  // If the user hasn't RSVPed before
  if( $exists == 0 )
  {
    $rsvp = query_DB("INSERT INTO `RSVP`
                        (`EventID`, `EnterpriseID`, `Cancel`)
                        VALUES ('" . $id . "', '" . $eid . "', '0')");

    if( $rsvp['Result'] )
    {
      // Success
      return 1;
    }
    else
    {
      // Error occurred
      return 0;
    }
  }
  else
  {
    // Check if the user RSVPed before but cancelled
    $cancelled = ( mysqli_fetch_all( query_DB("SELECT COUNT(EventID)
                        FROM `RSVP`
                        WHERE `EventID`      = '" . $id . "'
                        AND   `EnterpriseID` = '" . $eid . "'
                        AND   `Cancel`       = 1")[Data] )[0] )[0];

    // If the user had RSVPed before but cancelled
    if($cancelled == 1)
    {
      $timestamp = date('Y-m-d H:i:s');

      // Attempt to restore the RSVP to a valid RSVP
      $restore = query_DB("UPDATE `RSVP`
                          SET `Cancel`       = '0'
                          WHERE `EventID`    = '" . $id . "'
                          AND `EnterpriseID` = '" . $eid . "'");

      if( $restore['Result'] )
      {
        // Return that RSVP has been restored.
        return 3;
      }
      else
      {
        // Error occurred
        return 0;
      }
    }
    else
    {
      // If the user is already registered.
      return 2;
    }
  }
}

/*
*****************************
Region Start - Other Regular Use MySQL DB Functions
*****************************
*/

/*
  Function that approves the event
  @Param  - Int - The EventID.
  @Return - Boolean (T or F) if correct
*/
function approveEvent($id)
{
  // Insert into the Events Table
  $result = query_DB( "UPDATE `Events`
                       SET `Approved` = '1'
                       WHERE `id` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that deletes the announcement
  @Param  - Int - The AnnouncementID.
  @Return - Boolean (T or F) if correct
*/
function deleteAnnouncement($id)
{
  // Insert into the Events Table
  $result = query_DB( "DELETE FROM `Announcements`
                       WHERE `ID` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that deletes the event
  @Param  - Int - The EventID.
  @Return - Boolean (T or F) if correct
*/
function deleteEvent($id)
{
  // Insert into the Events Table
  $result = query_DB( "UPDATE `Events`
                       SET `Deleted` = '1'
                       WHERE `id` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that disapproves the event
  @Param  - Int - The EventID.
  @Return - Boolean (T or F) if correct
*/
function disapproveEvent($id)
{
  // Insert into the Events Table
  $result = query_DB( "UPDATE `Events`
                       SET `Approved` = '0'
                       WHERE `id` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that expires the announcement
  @Param  - Int - The AnnouncementID.
  @Return - Boolean (T or F) if correct
*/
function expireAnnouncement($id)
{
  // Insert into the Events Table
  $result = query_DB( "UPDATE `Announcements`
                       SET `Expires` = '0'
                       WHERE `ID` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that retrieves the event codes
  @Param  - NONE
  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
function get_eventCodes($id)
{
  // Insert into the Events Table
  $result = query_DB( "SELECT `Person_Code`,`Remote_Code`
                       FROM `Events`
                       WHERE `id` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return (mysqli_fetch_all( $result['Data'] ) )[0];
  }
  else
  {
    return False;
  }
}

/*
  Function that recovers the event
  @Param  - Int - The EventID.
  @Return - Boolean (T or F) if correct
*/
function recoverEvent($id)
{
  // Insert into the Events Table
  $result = query_DB( "UPDATE `Events`
                       SET `Deleted` = '0'
                       WHERE `id` = $id" );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Description:
    This function executes a query to update an Event.
  @PARAM:
    [Array]   - The event data
    [Int]     - The Event ID
  @RETURN:
    [Boolean] - True
    [Array]   - Errors
*/
Function update_Event($data, $id)
{
  // Update the Events Table
  $result = query_DB( "UPDATE `Events`
                       SET `Name`             = '" . sanitize($data['eventName'])        . "',
                           `Date`             = '" . sanitize($data['eventDate'])        . "',
                           `Start`            = '" . sanitize($data['start'])            . "',
                           `End`              = '" . sanitize($data['end'])              . "',
                           `Estimated_Budget` = '" . sanitize($data['estimatedBudget'])  . "',
                           `Actual_Budget`    = '" . sanitize($data['actualBudget'])     . "',
                           `Location`         = '" . sanitize($data['location'])         . "',
                           `Committee_ID`     = '" . sanitize($data['sponsorCommittee']) . "',
                           `Type`             = '" . sanitize($data['eventType'])        . "',
                           `Objective`        = '" . sanitize($data['eventObjective'])   . "',
                           `Creator`          = '" . sanitize($data['creator'])          . "'
                       WHERE `ID` = " . sanitize($id)
                    );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to update an Announcement.
  @PARAM:
    [Array]   - The event data
  @RETURN:
    [Boolean] - True
    [Array]   - Errors
*/
Function update_Announcement($data)
{
  $text = nl2br($data['Text']);

  // Update the Events Table
  $result = query_DB( "UPDATE `Announcements`
                       SET `Title`   = '" . sanitize($data['Title']) . "',
                           `Content` = '" . sanitize($text)          . "',
                           `Expires` = '" . sanitize($data['Date'])  . "'
                       WHERE `ID` = '" . sanitize($data['id']) . "'"
                    );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return $result['Errors'];
  }
}

?>
