<?php

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
    This function creates the Members table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_MembersTable()
{
  return query_DB("CREATE TABLE `Event_Manager`.`Members` (
    `ID` BIGINT NOT NULL COMMENT 'Member enterprise ID' ,
    `FName` TEXT NOT NULL COMMENT 'Member first name' ,
    `Initials` TEXT NULL COMMENT 'Member initials' ,
    `LName` TEXT NOT NULL COMMENT 'Member last name' ,
    `Level` INT NOT NULL COMMENT 'Member level' ,
    `Title` TEXT NULL COMMENT 'Member title' ,
    `Segment` TEXT NOT NULL COMMENT 'Company Segment (Commercial, Federal)' ,
    `Email` TEXT NOT NULL COMMENT 'Member e-mail' ,
    `Newsletter` BOOLEAN NOT NULL COMMENT 'Wants to receive newsletter' ,
    `Volunteer` BOOLEAN NOT NULL COMMENT 'Wants to be a volunteer' ,
    `Active` BOOLEAN NULL COMMENT 'Is an active member' ,
    `Lead` BOOLEAN NULL COMMENT 'Is a lead' ,
    `Role` INT NULL DEFAULT '1' COMMENT 'Member role in the portal' ,
    PRIMARY KEY (`ID`))
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all the member information'");
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
  return query_DB("CREATE TABLE `Event_Manager`.`Events` (
    `ID` BIGINT NOT NULL AUTO_INCREMENT COMMENT 'Event ID' ,
    `Name` TEXT NOT NULL COMMENT 'Event name' ,
    `Date` DATE NOT NULL COMMENT 'Event date' ,
    `Start` TIME NOT NULL COMMENT 'Event start time' ,
    `End` TIME NOT NULL COMMENT 'Event end time' ,
    `Estimated_Budget` DOUBLE NOT NULL COMMENT 'Event estimated eudget' ,
    `Actual_Budget` DOUBLE NULL COMMENT 'Event actual budget' ,
    `Location` TEXT NOT NULL COMMENT 'Event location' ,
    `Committee_ID` TEXT NOT NULL COMMENT 'Committee in charge of the event' ,
    `Type` TEXT NOT NULL COMMENT 'Event Type' ,
    `Objective` TEXT NOT NULL COMMENT 'Event objective' ,
    `Created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation timestamp' ,
    `Creator` TEXT NOT NULL COMMENT 'Event Creator' ,
    `Person_Code` TEXT NOT NULL COMMENT 'Code to give people that attend in person' ,
    `Remote_Code` TEXT NOT NULL COMMENT 'Code to give people that attend remotely' ,
    `Approved` BOOLEAN NOT NULL DEFAULT '0' COMMENT 'If the Event was approved' ,
    `Deleted` BOOLEAN NOT NULL DEFAULT '0' COMMENT 'If the Event was marked for deletion' ,
    PRIMARY KEY (`ID`))
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all the event information'");
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
    This function creates the Attendance table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_AttendanceTable()
{
  return query_DB("CREATE TABLE `Event_Manager`.`Attendance` (
    `EventID` BIGINT NOT NULL COMMENT 'Event ID' ,
    `EnterpriseID` TEXT NOT NULL COMMENT 'Enterprise ID' ,
    `Type` BOOLEAN NOT NULL COMMENT 'Type of Attendee' ,
    `Timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time attendance was taken' )
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all event attendance history'");
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
    `EventID` BIGINT NOT NULL COMMENT 'Event ID' ,
    `EnterpriseID` BIGINT NOT NULL COMMENT 'Enterprise ID' ,
    `Timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the person registered' )
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all event registration history'");
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
*****************************
Region Start - Regular Use MySQL DB Insert Functions
*****************************
*/

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
  $create = query_DB("INSERT INTO `Users`
                      (`Username`, `Password`, `Role`)
                      VALUES ('" . $data['Username'] . "','" . $data['Password'] . "','" . $data['Role'] . "')");

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

  if( $exists == 0 )
  {
    $create = query_DB("INSERT INTO `Attendance`
                        (`EventID`, `EnterpriseID`, `Type`)
                        VALUES ('" . $id . "','" . $eid . "','" . $type . "')");

    if( $create['Result'] )
    {
      return True;
    }
    else
    {
      return False;
    }
  }
  else
  {
    return 2;
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
                       WHERE `ID` = " . $id
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
