<?php //including the database connection and show errors files links
    include ("../conn/dbconnection.php");
    include ("../conn/showerrors.php");

    session_start(); //session start 

    if(!isset($_SESSION['lecturer_id'])){ //if the lecturer_id is not set in the session
        header("Location: lecturerlogin.php"); //take the user back to lecturerlogin page
    }
?>

<?php
  
  $LecturerID = $_SESSION['lecturer_id']; //getting the lecturerid from the session of the user

  //reading only the lecturer availabilities from the database onto this page which are 
  //not booked by the student so that the record/s can be edited by the lecturer. 
  //The read query created below with the select clause
  $Booked = "False";
  $readquery = "SELECT lecturer.lecturer_id, lecturer.lecturer_first_name, lecturer.lecturer_last_name, 
  lecturer_schedule.schedule_id, lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration, lecturer_schedule.booked_notbooked
  FROM lecturer_schedule
  INNER JOIN lecturer
  ON lecturer_schedule.lecturer_id = lecturer.lecturer_id
  WHERE lecturer_schedule.lecturer_id = $LecturerID AND lecturer_schedule.booked_notbooked = '$Booked'";

  $query = mysqli_query($mydb, $readquery) or 
  die("ERROR HAPPENED".$mydb->error);

  $result = $mydb -> query($readquery);
  if(!$result) //explaining what should happen if the variable name is not correct
  {
    die("ERROR HAPPENED".$mydb->error); // error happened message will be seen by the users
  }
?>

<!doctype html>
<html lang = "en"> <!--html tag opens-->
  <head> <!--head tag opens-->
    <!-- required meta tags -->
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <!--Bootstrap CSS framework-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel = "https://coolors.co/palettes/latest">
    <!--link of the website used to select different colours for the web application-->

    <title>Edit Lecturer Availability</title> 
    <!--name of the tab which will be seen when the page is rendered in the browser-->

      <style> /* different html elements are styled */
        img{
          padding: 10px;
        }
        
        nav{
            border-style: groove inset;
            border-radius: 25px;
          }

        nav li{
          font-weight: bold;
        }
      </style>
  </head> <!--head tag closes-->

  <body> <!--body tag opens-->
    <div class="container"> <!--container tag opens-->
      <!--first row holding the website logo and using the 12 based grid system-->
      <div class="row">
        <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
        <div class = "col-md-7"></div>
        <div class = "col-md-2"></div>
      </div> <!--first row closes-->
    
      <div class = "row"> <!--second row opens-->
        <div class = "col-md-1"></div>
          <!--navigation menu created in this column-->
          <div class = "col-md-10">
            <nav class="navbar navbar-expand-sm navbar-light">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-mb-0">
                  <li class = "nav-item">
                    <a style="text-decoration:none; color:#5BCEF4;" class="nav-link active" aria-current="page" href=""><?php echo "Welcome " .$_SESSION['lecturer_first_name']?></a>
                  </li>

                  <li class="nav-item">
                    <a class ="nav-link" href="lecturerhome.php">Back to Lecturer Home</a>  
                  </li>
                </ul>
              </div>
            </nav> <!--navigation menu closes-->
          </div>
          <div class = "col-md-1"></div>
      </div> <!--second row closes-->
      
    
      <div class = "row"> <!--third row opens-->
        <div class = "col-md-1"></div>
          <!--page title using the h5 heading style-->
          <div class = "col-md-6"><br><h5 style="text-decoration:underline;">Edit Lecturer Availability</h5><br></div> 
            <div class = "col-md-5"> <br><br>
              <div class="row">
                <!--using the GET method and user going to the edit lecturer availability process page-->
                <form action="editlectureravailabilityprocess.php" method = "GET">
                  <div class="input-group mb-3"></div>
                </form> <!--form tag closes-->
            </div>
          </div>
      </div> <!--third row closes-->
      
        <div class = "row"> <!--fourth row opens-->
          <div class = "col-md-1"></div>
            <div class = "col-md-10"> <!--col-md-10 opens-->
              <table style="background-color:#5BCEF4;" class="table">
                <thead> <!--table head tag opens-->
                    <tr> <!--table row tag opens-->
                      <div class = "row"> <!--row including the column names of the table-->
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Time</th>
                        <th scope="col">Appointment Duration</th>
                        <th scope="col">Edit Now</th>
                      </div>
                    </tr> <!--table row closes-->
                  </thead> <!--table head closes-->

                  <?php //fetching the table content from the table and echoing it out on the page-->
                      while ($row = $result->fetch_assoc()){
                        $LecturerID = $row["lecturer_id"];
                        $ScheduleID = $row["schedule_id"];
                        $LecturerFirstName = $row["lecturer_first_name"];
                        $LecturerLastName = $row["lecturer_last_name"];
                        $AppointmentDate = $row["appointment_date"];
                        $AppointmentTime = $row["appointment_time"];
                        $Duration = $row["duration"];

                        echo "
                        <tbody>
                          <tr>
                          <div class = 'row'>
                            <td>$AppointmentDate</td>
                            <td>$AppointmentTime</td>
                            <td>$Duration</td>
                            <td><a href=editlectureravailabilityprocess.php?lecturer_id=$LecturerID&schedule_id=$ScheduleID><button type='button' class='btn btn-warning'>Edit</button></a></td>
                          </div>
                          </tr>
                        </tbody>
                        ";
                      }
                    ?>
              </table> <!--table tag closes-->
              <div class = "col-md-1"></div>
          </div> <!--col-md-10 closes-->
        </div> <!--fourth row closes-->
                
        <div class="row"> <!--footer row underneath the table-->
          <div class="col-md-9">&copy;2022</div>
          <div class="col-md-3">Designed by Disha Kareer</div>
        </div> <!--footer row closes-->
    
        <div class = "col-md-1"></div>
    </div> <!--container closes here-->
  </body> <!--body tag closes-->
</html> <!--html tag closes-->