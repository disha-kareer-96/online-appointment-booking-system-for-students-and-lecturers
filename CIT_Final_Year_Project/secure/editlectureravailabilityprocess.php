<?php //including the database connection and show errors files links
  include ("../conn/dbconnection.php");
  include ("../conn/showerrors.php");
?>

<?php
session_start(); //session start
    
if(!isset($_SESSION['lecturer_id'])){ //if the lecturer_id is not set in the session
     header("Location: lecturerlogin.php"); //take the user back to lecturerlogin page
    }
?>

<?php
if(isset($_GET['schedule_id'])){ //if the schedule id is set
  $_SESSION["ScheduleID"] = ($_GET['schedule_id']); 
  //get it from the session of the lecturer who is logged on
}
$scheduleID = $_SESSION["ScheduleID"];
//schedule id should equal to the schedule id of the session

if (isset($_POST['submit'])){//when the lecturer clicks on the submit button on the form
  $duration = $_POST['duration'];//post the updated value of the duration using the update query

    $updatequery = "UPDATE lecturer_schedule SET duration ='$duration' WHERE lecturer_schedule.schedule_id =$scheduleID";

    $result2 = $mydb -> query($updatequery); //if update query is successful
    echo "Lecturer Availability Updated Successfully"; //echo this success message on the page
    if(!$result2) //if the update query fails
    {
        die("ERROR HAPPENED".$mydb->error); //shows the error message to the lecturer
    }
    header("Location: editlectureravailability.php"); 
    //else go back to the edit lecturer availability page
}

?>

<?php
//reading the form data using the select query with inner join and where clause equal to
//scheduleid
$readquery = "SELECT lecturer.lecturer_id, lecturer_schedule.schedule_id, lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration 
  FROM lecturer_schedule
  INNER JOIN lecturer
  ON lecturer_schedule.lecturer_id = lecturer.lecturer_id
  WHERE lecturer_schedule.schedule_id =  $scheduleID";
        
  $result = $mydb -> query($readquery); //shows the result of the query
  if(!$result) //if the result variable is not set
  {
    die("ERROR HAPPENED".$mydb->error); //error should happen
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

    <title>Edit Availability Process</title>
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
        
        form label{
          background-color: #5BCEF4;
        }
    
      </style>
  </head> <!--head tag closes-->

  <body> <!--body tag opens-->
    <div class="container"> 
      <!--container tag opens, includes a website logo and uses the 12 based grid system-->
      <div class="row"> <!--first row opens-->
        <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
        <div class = "col-md-7"></div>
        <div class = "col-md-2"></div>
      </div> <!--first row closes-->
    
      <div class = "row"> <!--second row opens-->
        <div class = "col-md-1"></div>
          <!--navigation menu created within the column-->
          <div class = "col-md-10">
            <nav class="navbar navbar-expand-sm navbar-light">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-mb-0">
                  <li class="nav-item">
                    <a style="text-decoration:none; color:#5BCEF4;" class="nav-link active" aria-current="page" href=""><?php echo "Welcome " .$_SESSION['lecturer_first_name']?></a>
                  </li>

                  <li class="nav-item">
                    <a class ="nav-link" href="lecturerhome.php">Back to Lecturer Home</a>  
                  </li>
                </ul>
              </div>
            </nav> <!--navigation tag closes-->
            <br></br>
          </div>
          <div class = "col-md-1"></div>
      </div> <!--second row closes-->
      
      <div class = "row"> <!--third row opens-->
        <div class = "col-md-1"></div>
        <div class = "col-md-10"> <!--col-md-10 opens-->
          <div class="row"> <!--row inside col-md-10 opens-->
            <h5 style="text-decoration:underline;">Edit Lecturer Avaialability</h5>
            <br><br>
              <?php
              while ($row = $result->fetch_assoc()){
                $lecturerID = $row["lecturer_id"];
                $scheduleID = $row["schedule_id"];
                $appointmentDate = $row["appointment_date"];
                $appointmentTime = $row["appointment_time"];
                $duration = $row["duration"];
                
                echo "<form action='editlectureravailabilityprocess.php' method='POST'>
                
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
            </div> <!--row inside col-md-10 opens-->
        </div> <!--col-md-10 closes-->
        <div class = "col-md-1"></div>
      </div> <!--third row closes-->

      <div class="row"> <!--fourth row opens-->
          <div class="col-md-9">&copy;2022</div>
          <div class="col-md-3">Designed by Disha Kareer</div>
        </div> <!--fourth row closes-->
    </div> <!--container tag closes-->
  </body> <!--body tag closes-->
</html> <!--html tag closes--> 