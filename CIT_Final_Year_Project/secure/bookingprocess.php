<?php //including the database connection and show errors files links
  include ("../conn/dbconnection.php");
  include ("../conn/showerrors.php");
?>

<?php
session_start(); //starting the session
if(!isset($_SESSION['student_id'])){ //if the session id is not set
    header("Location: studentlogin.php"); //take the student to the studentlogin page
}
?>

<?php     
if(isset($_GET['schedule_id'])){ //if the schedule id is set
  $_SESSION["ScheduleID"] = ($_GET['schedule_id']); 
  //get it from the session of the student who is logged on
}
$scheduleID = $_SESSION["ScheduleID"];
//schedule id should equal to the schedule id of the session

if (isset($_POST['submit'])){ //when the student clicks on the submit button on the form
  $getStudentID = ($_SESSION['student_id']); //get the student id from the session 
  
  //add the ids of the booking made by the student into the appointment_bookings table by getting 
  //the student id and schedule id from the session
  $query = "INSERT INTO appointment_bookings(student_id, schedule_id) VALUES ($getStudentID, $scheduleID)";
  $result = mysqli_query($mydb, $query); //if the insert query runs successfully
  if($result){
    // echo "Appointment Booked Successfully";
    //update the lecturer schedule table where the column name booked_notbooked will be updated
    //from "False" to "True" based on the lecturer schedule_id
    $Booked = "True";
    $updatequery = "UPDATE lecturer_schedule SET booked_notbooked = '$Booked' WHERE lecturer_schedule.schedule_id =$scheduleID";

    $result2 = $mydb -> query($updatequery);
    if(!$result2) //if the updatequery variable is not set and stored in $result2
    {
      die("ERROR HAPPENED".$mydb->error); //error message will be seen by the student
    }
    header("Location: studentdashboard.php"); //else go back to studentdashboard page
  }
  else{
    die("ERROR HAPPENED".$mydb->error); //else error message seen by the student
  }
}

//read query created to read the content of the appointment details form on the page based on 
//scheduleid of the lecturer
$readquery = "SELECT lecturer.lecturer_id, lecturer.lecturer_first_name, lecturer.lecturer_last_name,
  lecturer_schedule.schedule_id, lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration 
  FROM lecturer_schedule
  INNER JOIN lecturer
  ON lecturer_schedule.lecturer_id = lecturer.lecturer_id
  WHERE lecturer_schedule.schedule_id =  $scheduleID";
        
  $result = $mydb -> query($readquery);
  if(!$result)
  {
    die("ERROR HAPPENED".$mydb->error);
  }
?>

<!doctype html>
<html lang = "en"> <!--html tag opens-->
  <head> <!--head tag opens-->
    <!-- required meta tags -->
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Appointment Booking</title> 
    <!--this is the tab name when this file will be viewed in the browser-->

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

        form label{
          background-color: #59a96a;;
        }
      </style>
  </head> <!--head tag closes-->

  <body> <!--body tag opens-->
    <div class="container"> <!--container tag opens-->
      <!--first row opens containing the website logo added and use of 12 based grid system-->
      <div class="row">
        <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
        <div class = "col-md-7"></div>
        <div class = "col-md-2"></div>
      </div> <!--first row closes-->
    
      <div class = "row"> <!--second row opens-->
        <div class = "col-md-1"></div>
          <!--creating navigation menu-->
          <div class = "col-md-10">
            <nav class="navbar navbar-expand-sm navbar-light">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-mb-0">
                  <li style="background-color:#59a96a;" class="nav-item">
                    <a style="text-decoration:none;" class="nav-link active" aria-current="page" href=""><?php echo "Welcome " .$_SESSION['student_first_name']?></a>
                  </li>
                  <!--nav item created as a link to take the student back to the student home page-->
                  <li class="nav-item">
                    <a class ="nav-link" href="studenthome.php">Back to Student Home</a>  
                  </li>
                </ul>
              </div>
            </nav> <!--navigation tag closes-->
            <br></br>
          </div> <!--col-md-10 closes-->

          <div class = "col-md-1"></div>
      </div> <!--second row closes-->
      
      <div class = "row"> <!--third row opens-->
        <div class = "col-md-1"></div> 
        <div class = "col-md-10"> <!--col-md-10 opens-->
          <div class="row"> <!--row opens inside the third row-->
            <h5 style="text-decoration:underline;">Appointment Details</h5>

              <?php
              while ($row = $result->fetch_assoc()){
                $lecturerID = $row["lecturer_id"];
                $scheduleID = $row["schedule_id"];
                $lecturerFirstName = $row["lecturer_first_name"];
                $lecturerLastName = $row["lecturer_last_name"];
                $appointmentDate = $row["appointment_date"];
                $appointmentTime = $row["appointment_time"];
                $duration = $row["duration"];
              
                echo "<form action='bookingprocess.php' method='POST'>
                <div class='row mb-3'>
                  <label for='lecturer_first_name' class='col-sm-2 col-form-label'>Lecturer First Name</label>
                    <div class='col-sm-5'>
                      <input type='text' class='form-control' name='lecturer_first_name' value='$lecturerFirstName'/>
                    </div>
                </div>

                <div class='row mb-3'>
                  <label for='lecturer_last_name' class='col-sm-2 col-form-label'>Lecturer Last Name</label>
                    <div class='col-sm-5'>
                      <input type='text' class='form-control' name='lecturer_last_name' value='$lecturerLastName'/>
                    </div>
                </div>

                <div class='row mb-3'>
                  <label for='appointment_date' class='col-sm-2 col-form-label'>Appointment Date</label>
                    <div class='col-sm-5'>
                      <input type='date' class='form-control' name='appointment_date' value='$appointmentDate'/>
                    </div>
                </div>

                <div class='row mb-3'>
                  <label for='appointment_time' class='col-sm-2 col-form-label'>Appointment Time</label>
                    <div class='col-sm-5'>
                      <input type=time' class='form-control' name='appointment_time' value='$appointmentTime'/>
                    </div>
                </div>

                <div class='row mb-3'>
                  <label for='duration' class='col-sm-2 col-form-label'>Appointment Duration</label>
                    <div class='col-sm-5'>
                      <input type='text' class='form-control' name='duration' value='$duration' />
                    </div>
                </div>

                <input type='submit' class='btn btn-warning btn btn-block' name='submit' value='submit'/>
              </form>";
              }
              ?>
          </div> <!--row closes inside the third row-->
        </div> <!--col-md-10 closes-->

        <div class = "col-md-1"></div>
      </div> <!--third row closes-->

      <div class="row"> <!--fourth row opens-->
          <div class="col-md-9">&copy;2022</div>
          <div class="col-md-3">Designed by Disha Kareer</div>
        </div> <!--fourth row closes-->
    </div> <!--container tag closes here-->
  </body> <!--body tag closes-->
</html> <!--html tag closes-->