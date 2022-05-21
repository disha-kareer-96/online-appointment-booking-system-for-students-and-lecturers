<?php //including the database connection and show errors files links
include ("conn/dbconnection.php");
include ("conn/showerrors.php");

//reading only the lecturer availabilities from the database onto this page which are not booked
//by the student. The read query created below with the select clause
$Booked = "False"; 
$readindexpagequery = "SELECT lecturer.lecturer_first_name, lecturer.lecturer_last_name, 
lecturer_schedule.appointment_date, lecturer_schedule.appointment_time, lecturer_schedule.duration,lecturer_schedule.booked_notbooked  
FROM lecturer_schedule
INNER JOIN lecturer
ON lecturer_schedule.lecturer_id = lecturer.lecturer_id
WHERE lecturer_schedule.booked_notbooked = '$Booked'";

//storing the select query variable seen above within the result variable
$result = $mydb -> query($readindexpagequery);
if(!$result) //explaining what should happen if the variable name is not correct
{
    die("ERROR HAPPENED".$mydb->error); // error happened message will be seen by the users
}

?>

<!doctype html>
<html lang = "en"> <!--html tag opens-->

  <head> <!--head tag opens-->

    <!-- Required meta tags -->
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--link of the website used to select different colours for the web application-->
    <link href = "https://coolors.co/palettes/trending"> 
    
    <title>Welcome</title> <!--this is the tab name when this file will be viewed in the browser-->

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
    <!--Developing the index.php page using the Bootstrap CSS Framework starter template-->
    <div class="container"> <!--container opens here-->
      <div class="row"> <!--first row opens-->
         <!--12 based grid system used which holds the logo of the website-->
        <div class = "col-md-3"><img src="img/logo.jpg"/></div>
        <div class = "col-md-7"></div>
        <div class = "col-md-2">
          <div class = "btn-group"> <!--button group div class tag opens-->
            <!--register button added on this page with margin attribute, linking the button to
            select usertype page-->
            <a style="margin:10px;" href ="selectusertype.php" class = "btn btn-warning active" aria-current = "page">Register</a>
          </div> <!--button group div class tag closes-->
        </div> <!--col-md-2 closes-->
      </div> <!--first row closes-->

      <div class = "row"> <!--second row opens-->
        <!--12 based grid system used-->
        <div class = "col-md-3"></div>
        <!--title of the web application added using the heading style 5 in html-->
        <div class = "col-md-6"><h5 style="text-align:center;">EEECS Online Appointment Booking System for Students & Lecturers</h5></div>
        <div class = "col-md-3"></div>
      </div> <!--second row closes-->

      <div class = "row"> <!--third row opens-->
        <!--12 based grid system used-->
        <div class = "col-md-1"></div>
          <!--column used to create the navigation menu-->
          <div class = "col-md-10">
            <!--navigation tag opens-->
            <nav class="navbar navbar-expand-sm navbar-light">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-mb-0"> <!--unordered list opens-->
                  <li style="background-color:#5BCEF4;" class="nav-item"> <!--list tag opens-->
                    <!--background colour of navigation-->
                    <a style="text-decoration:underline;" class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <!--the active link is underlined using the CSS text-decoration attribute-->
                  </li> <!--list tag closes-->
                </ul> <!--unordered list tag closes-->
              </div>
            </nav> <!--navigation tag closes-->
        </div> <!--"col-md-10" closes-->
        <div class = "col-md-1"></div>
      </div> <!--third row closes-->

      <div class = "row"> <!--fourth row opens-->
        <!--12 based grid system used-->
        <div class = "col-md-1"></div>
        <div class = "col-md-11"><br><h5 style="text-decoration:underline;">Lecturer Schedule Information</h5><br></div> 
        <!--heading given to the page using h5 style from html and break tags-->
        <div class = "col-md-0"></div>
      </div> <!--fourth row closes-->

      <div class = "row"> <!--fifth row opens-->
        <!--12 based grid system used-->
        <div class = "col-md-1"></div>
          <div class = "col-md-10"> <!--col-md-10 opens-->
            <!--rows and columns for the table data with background colour and 
            headings of table columns given-->
            <table style="background-color:#5BCEF4" class="table">
                <thead> <!-- table head tag opens-->
                    <tr> <!--table row opens-->
                      <div class = "row"> <!--creating a div for a row-->
                        <th scope="col">Lecturer First Name</th>
                        <th scope="col">Lecturer Last Name</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Time</th>
                        <th scope="col">Duration</th>
                      </div> <!-- div for the row finishes-->
                    </tr> <!--table row ends-->
                  </thead> <!--table head closes-->

                <!--reading the table content from the database and echoing it out on the page-->
                <?php
                  while ($row = $result->fetch_assoc()){
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
                      </div>
                    </tr> 
                  </tbody>
                  ";
                  }
                ?>
              </table> <!--table tag ends-->
            <div class = "col-md-1"></div>
          
            <!--footer row underneath the table with copyright notice and name of the designer-->
            <div class="row"> 
              <div class="col-md-9">&copy;2022</div>
              <div class="col-md-3">Designed by Disha Kareer</div>
            </div> <!--footer row closes-->
          </div> <!--col-md-10 closes-->
      </div> <!--fifth row closes-->
    </div> <!--container ends here-->
  </body> <!--body tag opens-->
</html> <!--html tag finishes-->