<?php //including the database connection and show errors files links
  include ("../conn/dbconnection.php");
  include ("../conn/showerrors.php");
?>

<?php
session_start(); //session start
if(!isset($_SESSION['student_id'])){ //if the student_id is not set in the session
    header("Location: studentlogin.php"); //take the user back to studentlogin page
}
?>

<?php
if(isset($_GET['search'])){ //get the search value from the url
  $filtervalues = $_GET['search']; //filter values in the search bar based on the url value
  $Booked = "False"; //variable set to "False", meaning only show the lecturer availabilities to
  //student which are not booked and display the results using the read query below.
  $readquery = "SELECT lecturer.lecturer_id, lecturer.lecturer_first_name, lecturer.lecturer_last_name, 
  lecturer_schedule.schedule_id,lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration, lecturer_schedule.booked_notbooked
  FROM lecturer_schedule
  INNER JOIN lecturer
  ON lecturer_schedule.lecturer_id = lecturer.lecturer_id
  WHERE CONCAT(lecturer_first_name, lecturer_last_name) LIKE '%$filtervalues%' AND lecturer_schedule.booked_notbooked = '$Booked'";

  $query_run = mysqli_query($mydb, $readquery); //running the read query

  if(mysqli_num_rows($query_run) > 0) //if the number of rows are greater than 0
    {
      foreach($query_run as $LecturerFirstName); 
      //then show the filtered records based on lecturerfirstname
    }
  else{
    echo "No record found"; //else display message, no record found. 
  }
}

else{ 
  $Booked = "False"; //display all the not booked lecturer availabilities without filtering process
  $readquery = "SELECT lecturer.lecturer_id, lecturer.lecturer_first_name, lecturer.lecturer_last_name, 
  lecturer_schedule.schedule_id, lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration, lecturer_schedule.booked_notbooked
  FROM lecturer_schedule
  INNER JOIN lecturer
  ON lecturer_schedule.lecturer_id = lecturer.lecturer_id
  WHERE lecturer_schedule.booked_notbooked = '$Booked'";
  $query = mysqli_query($mydb, $readquery) or 
  die("ERROR HAPPENED".$mydb->error);
}

//storing the readquery variable of the first select query within the result variable
$result = $mydb -> query($readquery);  //if the first query fails, then error happens
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

    <!--Bootstrap CSS framework-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel = "https://coolors.co/palettes/latest">
    <!--link of the website used to select different colours for the web application-->

    <title>Student Dashboard</title> 
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
      </style>
  </head> <!--head tag closes-->

  <body> <!--body tag opens-->
    <div class="container"> <!--container tag opens-->
      <div class="row"> <!--first row opens with 12 based grid system used and website logo-->
        <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
        <div class = "col-md-7"></div>
        <div class = "col-md-2"></div>
      </div> <!--first row closes-->
    
      <div class = "row"> <!--second row opens-->
        <div class = "col-md-1"></div>
        <!--navigation bar created with the first name of the student seen taking from the session-->
          <div class = "col-md-10"> <!--col-md 10 tag opens-->
            <nav class="navbar navbar-expand-sm navbar-light">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-mb-0"> <!--unordered list tag opens-->
                  <!--background colour given to the nav item, holding the first name of student-->
                  <li style="background-color:#59a96a;" class="nav-item">
                    <a style="text-decoration:none;" class="nav-link active" aria-current="page" href=""><?php echo "Welcome " .$_SESSION['student_first_name']?></a>
                  </li>

                  <li class="nav-item"> 
                    <!--nav item in li tag created which will take the student back to student home-->
                    <a class ="nav-link" href="studenthome.php">Back to Student Home</a>  
                  </li> <!--list tag closes-->
                </ul> <!--unordered list tag closes-->
              </div>
            </nav> <!--navigation tag closes-->
          </div> <!--col-md 10 tag closes-->

          <div class = "col-md-1"></div>
      </div> <!--second row closes-->
      
    
      <div class = "row"> <!--third row opens-->
        <!--12 based grid system used-->
        <div class = "col-md-1"></div>
          <div class = "col-md-8"><br><h5 style="text-decoration:underline;">Lecturer Schedule Information</h5><br></div> 
            <div class = "col-md-3"> <br><br> <!--adding some space between the title of the page and search bar-->
              <div class="row"> <!-- a row within the col-md-5 opens-->
                <form action="studentdashboard.php" method = "GET"> 
                  <!--using the get method to echo out the value searched for in the search bar-->
                  <div class="input-group mb-3"> 
                    <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search data">
                  </div>
                </form> <!--form holding the search bar closes-->
            </div> <!--col-md-5 closes-->
          </div> <!--col-md-6 closes-->
      </div> <!--third row closes-->
      
        <div class = "row"> <!--fourth row opens-->
         <!--12 based grid system used-->
          <div class = "col-md-1"></div>
            <!--rows & columns for the table data with background color set-->
            <div class = "col-md-10">
              <table style="background-color:#59a96a;" class="table"> 
                <thead> <!--table head tag opens-->
                    <tr> <!--table row tag opens-->
                      <div class = "row"> <!--creating a row for holding the column names of table-->
                        <th scope="col">Lecturer First Name</th>
                        <th scope="col">Lecturer Last Name</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Time</th>
                        <th scope="col">Appointment Duration</th>
                        <th scope="col">Book Now</th>
                      </div> <!-- div closes-->
                    </tr> <!--table row tag closes-->
                  </thead> <!--table head closes-->

                  <?php //fetch the table content from the database and echoing it out on the page
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
                            <td>$LecturerFirstName</td>
                            <td>$LecturerLastName</td>
                            <td>$AppointmentDate</td>
                            <td>$AppointmentTime</td>
                            <td>$Duration</td>
                            <td><a href=bookingprocess.php?lecturer_id=$LecturerID&schedule_id=$ScheduleID><button type='button' class='btn btn-warning'>Book</button></a></td>
                          </div>
                          </tr>
                        </tbody>
                        ";
                      }
                    ?>
              </table> <!--table closes-->
              <div class = "col-md-1"></div>
          </div> <!--column md-10 closes-->
        </div> <!--fourth row closes-->
                
        <div class="row"> <!--footer row underneath the table-->
          <div class="col-md-9">&copy;2022</div>
          <div class="col-md-3">Designed by Disha Kareer</div>
        </div> <!--fifth row closes-->
    
        <div class = "col-md-1"></div>
    </div> <!--container closes here-->
  </body> <!--body tag closes-->
</html> <!--html tag closes--> 