<!-- Table -->
<title>Event Manager - Attendance Reports - Attendance by Career Level</title>

<?php

  include '../../functions/Init.php';
  include '../../functions/DB.php';
  //include '../layout/LinkHandler.php';

  protectAdmin();

  $attendance = get_AttendanceByCareerLevel();

  $oldid = NULL;
  $count = 0;

  if( sizeof($attendance) == 0 )
  {
    echo '
    <div class="container">
      <h3>There are no attendance entries in the platform at the moment.</h3>
    </div>
    ';
  }
  else
  {

    echo '
    <table id="reportTable" class="container table">
    ';

    foreach ($attendance as $name => $value)
    {
      $count++;

      // When starting the check
      if($oldid == NULL)
      {
        $oldid   = $value[1];
        $oldname = $value[0];
        $CL5 = 0;
        $CL6 = 0;
        $CL7 = 0;
        $CL8 = 0;
        $CL9 = 0;
        $CL10 = 0;
        $CL11 = 0;
        $CL12 = 0;
        $CL13 = 0;
        $CL14 = 0;
        $total = 0;
      }

      // Grab event id to check if it is another event
      $newid = $value[1];

      // If it is a new event, reset everything
      if( ($newid != $oldid) || ( $count == sizeof($attendance) ) )
      {
        // Case of last entry
        if( $count == sizeof($attendance) )
        {
          // Reset everything
          if($value[2] == 5)
          {
            $CL5++;
            $total++;
          }
          if($value[2] == 6)
          {
            $CL6++;
            $total++;
          }
          if($value[2] == 7)
          {
            $CL7++;
            $total++;
          }
          if($value[2] == 8)
          {
            $CL8++;
            $total++;
          }
          if($value[2] == 9)
          {
            $CL9++;
            $total++;
          }
          if($value[2] == 10)
          {
            $CL10++;
            $total++;
          }
          if($value[2] == 11)
          {
            $CL11++;
            $total++;
          }
          if($value[2] == 12)
          {
            $CL12++;
            $total++;
          }
          if($value[2] == 13)
          {
            $CL13++;
            $total++;
          }
          if($value[2] == 14)
          {
            $CL14++;
            $total++;
          }
        }

        echo '
          <tr style="background: lightgray;">
            <td><b>' . $oldid . '. ' . $oldname . '</b></td>
            <td><b>Amount</b></td>
            <td><b>%</b></td>
          </tr>
          <tr>
            <td><b>Leadership</b></td>
            <td>' . $CL5 . '</td>
            <td>' . round( (($CL5/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 6</b></td>
            <td>' . $CL6 . '</td>
            <td>' . round( (($CL6/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 7</b></td>
            <td>' . $CL7 . '</td>
            <td>' . round( (($CL7/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 8</b></td>
            <td>' . $CL8 . '</td>
            <td>' . round( (($CL8/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 9</b></td>
            <td>' . $CL9 . '</td>
            <td>' . round( (($CL9/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 10</b></td>
            <td>' . $CL10 . '</td>
            <td>' . round( (($CL10/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 11</b></td>
            <td>' . $CL11 . '</td>
            <td>' . round( (($CL11/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 12</b></td>
            <td>' . $CL12 . '</td>
            <td>' . round( (($CL12/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 13</b></td>
            <td>' . $CL13 . '</td>
            <td>' . round( (($CL13/$total)*100), 2) . '</td>
          </tr>
          <tr>
            <td><b>CL 14</b></td>
            <td>' . $CL14 . '</td>
            <td>' . round( (($CL14/$total)*100), 2) . '</td>
          </tr>
          <tr style="background: lightgray;">
            <td><b>Total</b></td>
            <td><b>' . $total . '</b></td>
            <td><b>100%</b></td>
          </tr>
          <tr style="height: 20px"></tr>
        ';

        // Reset everything
        if($value[2] == 5)
        {
          $CL5 = 1;
        }
        else
        {
          $CL5 = 0;
        }
        if($value[2] == 6)
        {
          $CL6 = 1;
        }
        else
        {
          $CL6 = 0;
        }
        if($value[2] == 7)
        {
          $CL7 = 1;
        }
        else
        {
          $CL7 = 0;
        }
        if($value[2] == 8)
        {
          $CL8 = 1;
        }
        else
        {
          $CL8 = 0;
        }
        if($value[2] == 9)
        {
          $CL9 = 1;
        }
        else
        {
          $CL9 = 0;
        }
        if($value[2] == 10)
        {
          $CL10 = 1;
        }
        else
        {
          $CL10 = 0;
        }
        if($value[2] == 11)
        {
          $CL11 = 1;
        }
        else
        {
          $CL11 = 0;
        }
        if($value[2] == 12)
        {
          $CL12 = 1;
        }
        else
        {
          $CL12 = 0;
        }
        if($value[2] == 13)
        {
          $CL13 = 1;
        }
        else
        {
          $CL13 = 0;
        }
        if($value[2] == 14)
        {
          $CL14 = 1;
        }
        else
        {
          $CL14 = 0;
        }

        $total = 1;
        $oldid = $newid;
        $oldname = $value[0];
      }
      else
      {
        $total++;

        if($value[2] == 5)
        {
          $CL5++;
        }
        if($value[2] == 6)
        {
          $CL6++;
        }
        if($value[2] == 7)
        {
          $CL7++;
        }
        if($value[2] == 8)
        {
          $CL8++;
        }
        if($value[2] == 9)
        {
          $CL9++;
        }
        if($value[2] == 10)
        {
          $CL10++;
        }
        if($value[2] == 11)
        {
          $CL11++;
        }
        if($value[2] == 12)
        {
          $CL12++;
        }
        if($value[2] == 13)
        {
          $CL13++;
        }
        if($value[2] == 14)
        {
          $CL14++;
        }
      }

    }

    echo '
    </table>
    ';
}

?>
