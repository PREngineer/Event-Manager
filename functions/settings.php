
    <?php
      $DBUSER = "root";
      $DBPASS = "root";
      $DB     = "Event_Manager";
      $DBHOST = "localhost";
      $DBPORT = "3306";
      $DBTYPE = "mysql";

      // Use the format: 'sub.domain.tld;sub.domain.tld'
      define("SMTPHOSTS", 'localhost');
      // True or False to use a user/pass to authenticate to the SMTP Server
      define("SMTPAUTHENTICATION", false);
      // Username for the SMTP Server
      define("SMTPUSER", "me@mycompany.com");
      define("SMTPPASS", "passwordgoeshere");
      define("SMTPPORT", 25);
      // Set if using encryption or not [0 = none, 1 = tls, 2 = ssl]
      define("SMTPENC", 0);
      // Recipient information
      define("SMTPRECIPIENTADDRESS", 'me@mycompany.com');
      define("SMTPRECIPIENTNAME", 'Me');
      define("SMTPREPLYTO", "me@mycompany.com");
      define("SMTPCC", "");
      define("SMTPBCC", "");
      // E-mail Subject
      define("SMTPSUBJECT", 'Event Manager - Request for RSVP cancellation');

    ?>
