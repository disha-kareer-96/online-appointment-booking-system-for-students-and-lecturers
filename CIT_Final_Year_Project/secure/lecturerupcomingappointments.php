<?php //including the database connection and show errors files links
    include ("../conn/dbconnection.php");
    include ("../conn/showerrors.php");

    session_start(); //session start
    
   if(!isset($_SESSION['lecturer_id'])){ //if the lecturer_id is not set in the session
        header("Location: lecturerlogin.php"); //take the user back to lecturerlogin page
    } 
?>

<?php

  $lecturerid = $_SESSION['lecturer_id']; //getting the lecturerid from the session of the user

  //only showing the upcoming appointments to the lecturer which are booked with them
  $Booked = "True"; 

  $readquery = "SELECT student_details.student_first_name, student_details.student_last_name, lecturer_schedule.lecturer_id, lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration, lecturer_schedule.booked_notbooked
  FROM student_details
  INNER JOIN appointment_bookings
  ON student_details.student_id = appointment_bookings.student_id
  INNER JOIN lecturer_schedule
  ON lecturer_schedule.schedule_id = appointment_bookings.schedule_id
  WHERE lecturer_schedule.lecturer_id = $lecturerid AND lecturer_schedule.booked_notbooked = '$Booked'";

  $result = $mydb -> query($readquery);
  if(!$result) //if the read query seen above fails
  {
  die("ERROR HAPPENED".$mydb->error); //show the error
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


    <title>My Upcoming Appointments</title> 
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
      <div class="row"> <!--first row holding the website logo and using the 12 based grid system-->
        <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
        <div class = "col-md-7"></div>
        <div class = "col-md-2"></div>
      </div> <!--first row closes-->
    
      <div class = "row"> <!--second row opens-->
        <div class = "col-md-1"></div>
          <!--navigation menu created within this column-->
          <div class = "col-md-10"> <!--"col-md-10" opens-->
            <nav class="navbar navbar-expand-sm navbar-light">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-mb-0">
                    <li class = "nav-item">
                  <a style="text-decoration:none; color:#5BCEF4;" class="nav-link active" aria-current="page" href=""><?php echo "Welcome " .$_SESSION['lecturer_first_name']?></a>
                  </li> <!--list tag opens-->
                  <li class="nav-item"> <!--nav item linking back to the lecturer home page-->
                    <a class ="nav-link" href="lecturerhome.php">Back to Lecturer Home</a>  
                  </li> <!--list tag closes-->
                </ul>
              </div>
            </nav> <!--navigation tag closes-->
          </div> <!--"col-md-10" ends-->
          <div class = "col-md-1"></div>
      </div> <!--second row closes-->
      
      <div class = "row"> <!--third row opens-->
        <div class = "col-md-1"></div>
          <!--page title using the html heading style h5-->
          <div class = "col-md-6"><br><h5 style="text-decoration:underline;">My Upcoming Appointments</h5><br></div> 
            <div class = "col-md-5"> <br><br> <!--break tag to add space between title and table-->
              <div class="row">
                  <div class="input-group mb-3">
                  </div>
            </div>
          </div> <!--col-md-6 closes-->
      </div> <!--third row closes-->
      
        <div class = "row"> <!--fourth row opens-->
          <div class = "col-md-1"></div>
          <div class = "col-md-10"> <!--rows and columns for the table data with background
            colur set-->
              <table style="background-color:#5BCEF4;" class="table">
                <thead> <!--table head tag opens-->
                    <tr> <!--table row tag opens-->
                      <div class = "row"> <!--row opens and holds the columns names of the table-->
                        <th scope="col">Student First Name</th>
                        <th scope="col">Student Last Name</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Time</th>
                        <th scope="col">Appointment Duration</th>
                        <th scope="col">Appointment Status</th>
                      </div> <!--row closes-->

                    <?php //fetching content of table from the database and echoing it in the table-->
                      while ($row = $result->fetch_assoc()){
                        $lecturer_id = $row["lecturer_id"];
                        $student_first_name = $row["student_first_name"];
                        $student_last_name = $row["student_last_name"];
                        $appointment_date = $row["appointment_date"];
                        $appointment_time = $row["appointment_time"];
                        $duration = $row["duration"];
                        $appointment_booked_notbooked = $row["booked_notbooked"];
                      
                      echo" 
                        <tbody>
                        <tr>
                        <div class = 'row'>
                            <td>$student_first_name</td>
                            <td>$student_last_name</td>
                            <td>$appointment_date</td>
                            <td>$appointment_time</td>
                            <td>$duration</td>
                            <td>$appointment_booked_notbooked</td>
                        </div>
                        </tr>
                        </tbody>
                    ";
                    }
                    ?>
                    </tr> <!--table row closes-->
                  </thead> <!--table head closes-->
            </table> <!--table tag closes-->
            <div class = "col-md-1"></div>
          </div> <!--column md-10 closes-->
        </div> <!--fourth row closes-->
                
        <div class="row"> <!--footer row underneath the table-->
          <div class="col-md-9">&copy;2022</div>
          <div class="col-md-3">Designed by Disha Kareer</div>
        </div> <!--footer row closes-->
    
        <div class = "col-md-1"></div>
    </div> <!--container closes here-->
  </body> <!--body tag closes-->
</html> <!--html tag closes-->