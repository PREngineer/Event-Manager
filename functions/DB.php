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
    `EnterpriseID` BIGINT NOT NULL COMMENT 'Enterprise ID' ,
    `Timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time attendance was taken' )
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all event attendance history'");
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
*****************************
Region Start - Regular Use MySQL DB Get Functions
*****************************
*/

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
    This function executes a query to get all the future events.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_FutureEvents($date)
{
  $result = query_DB("SELECT `ID`, `Name`,`Date`,`Start`,`End`,`Location` FROM `Events` WHERE `Date` > '$date'");

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

  $result = query_DB( "INSERT INTO `Events`
            (`Name`, `Date`, `Start`, `End`, `Estimated_Budget`, `Location`, `Committee_ID`,
              `Type`, `Objective`, `Creator`, `Person_Code`, `Remote_Code`)
            VALUES (
              '" . $data['eventName']        . "', '" . $data['eventDate']        . "',
              '" . $data['start']            . "', '" . $data['end']              . "',
              '" . $data['estimatedBudget']  . "', '" . $data['location']         . "',
              '" . $data['sponsorCommittee'] . "', '" . $data['eventType']        . "',
              '" . $data['eventObjective']   . "', '" . $data['creator']          . "',
              '" . $code1                    . "', '" . $code2 . "' )" );

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
