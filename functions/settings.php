    <?php
      //------------------------------------------------------------------------
      // IMPORTANT:
      //------------------------------------------------------------------------
      // This information is retrieved from the Setup execution.
      // If you need to re-run the Setup, make sure to delete this file first.
      // Then, attempt to load the website again and it will prompt you to setup
      // the DB again.
      //------------------------------------------------------------------------

      //------------------------------------------------------------------------
      // Database connection information
      //------------------------------------------------------------------------

      $DBUSER = "root";
      $DBPASS = "root";
      $DB     = "event_manager";
      $DBHOST = "localhost";
      $DBPORT = "3306";
      $DBTYPE = "mysql";

      //------------------------------------------------------------------------
      // Mail (SMTP) connection settings and credentials
      //------------------------------------------------------------------------

      //------------------------------------------------------------------------
      // SMTP Hosts:     Specify the SMTP servers to use to send the e-mails
      //------------------------------------------------------------------------
      //   Single:       sub.domain.tld
      //   Multiple:     sub.domain.tld;sub.domain.tld
      //------------------------------------------------------------------------
      // Authentication: Use a user/pass to authenticate to the SMTP Server?
      //------------------------------------------------------------------------
      //                 [True / False]
      //------------------------------------------------------------------------
      // Encryption:     If using encryption or not
      //------------------------------------------------------------------------
      //                 [0 = none, 1 = tls, 2 = ssl]
      //------------------------------------------------------------------------
      // From E-mail:    Specify the reply to e-mail.
      //------------------------------------------------------------------------
      //                 event.manager@mycompany.com
      //------------------------------------------------------------------------
      // From Name:      Specify the reply to name.
      //------------------------------------------------------------------------
      //                 Event Manager
      //------------------------------------------------------------------------
      // My Domain:      Specify the company domain.
      //------------------------------------------------------------------------
      //                 mycompany.com
      //------------------------------------------------------------------------

      $SMTPHOSTS          = "smtp.domain.tld";
      $SMTPAUTHENTICATION = true;
      $SMTPUSER           = "<Username>";
      $SMTPPASS           = "<Password>";
      $SMTPPORT           = 25;
      $SMTPENC            = 1;
      $SMTPFROMEMAIL      = "Event.Manager@mycompany.com";
      $SMTPFROMNAME       = "Event Manager";
      $MYDOMAIN           = "mycompany.com";

    ?>