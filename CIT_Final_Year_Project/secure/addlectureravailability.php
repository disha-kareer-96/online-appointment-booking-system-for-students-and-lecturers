<?php //including the database connection and show errors files links
    include ("../conn/dbconnection.php");
    include ("../conn/showerrors.php");

    session_start(); //session start

   if(!isset($_SESSION['lecturer_id'])){//if the lecturer_id is not set in the session
        header("Location: lecturerlogin.php"); //take the user back to lecturerlogin page
    }

    if(isset($_POST['submit'])) { //when the submit button is clicked
        $lecturerid = $_SESSION['lecturer_id']; //take the lecturer id from the session of the user
        $appointment_date = $_POST['appointment_date']; //post the new appointment_date in database
        $appointment_time = $_POST['appointment_time']; //post the new appointment_time in database
        $duration = $_POST['duration']; //post the new duration in database
     
        //when the lecturer will add his/her availability slots it will be inserted into the
        //lecturer_schedule table with the table column name: booked_notbooked set to "False"
        $Booked = "False";
        $query = "INSERT INTO lecturer_schedule(lecturer_id,appointment_date,appointment_time,duration,booked_notbooked)
        VALUES ('$lecturerid', '$appointment_date', '$appointment_time', '$duration', '$Booked')";
        $result = mysqli_query($mydb, $query); //if the query run successfully
        if($result)
        {
            echo "Lecturer availability added successfully"; //echo this success message
        }
        else{
            echo "Please try again"; //if unsuccessful then echo this message
        }
    }
?>

<!doctype html>
<html lang ="en"> <!--html tag opens-->
    <head> <!--head tag opens-->
        <!--required meta tags-->
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        
        <!--Bootstrap CSS framework-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--link of the website used to select different colours for the web application-->
        <link rel = "https://coolors.co/palettes/latest"> 
        
        <title>Add Lecturer Availability</title> 
        <!--this is the tab name when this file will be viewed in the browser-->

        <style> /* different html elements are styled */
        img{
            padding: 10px;
        }

        nav{
        border-style: groove inset;
        border-radius: 25px;
        }

      form label{
          background-color: #5BCEF4;
        }

       nav li{
          font-weight: bold;
        }
        </style>

    </head> <!--head tag closes-->
    <body> <!--body tag opens-->
        <div class="container"> <!--container tag opens-->
            <!--first row opens to add website logo with the 12 based grid system used-->
            <div class="row">
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
        <br><br> <!--break tag to add space between title and table-->

            <div class="row"> <!--third row opens to add a heading of the page-->
                <br><h1 style="text-align:center;">Add Lecturer Availability</h1><br>
            </div> <!--third row closes-->


            <div class ="row"> <!--fourth row opens-->
                <!--form tag opens with the post method set and link of the form action where
                message will be seen when the lecturer availability is added successfully-->
                <form action="addlectureravailability.php" method="post">
                    <div class="row mb-3"> <!--row mb-3 tag opens-->
                        <label for="appointment_date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="appointment_date"/>
                        </div>
                    </div> <!--row mb-3 tag ends-->

                    <div class="row mb-3"> <!--row mb-3 tag opens-->
                        <label for="appointment_time" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="appointment_time"/>
                            </div>
                    </div> <!--row mb-3 tag ends-->

                    <div class="row mb-3"> <!--row mb-3 tag opens-->
                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="duration"/>
                            </div>
                    </div> <!--row mb-3 tag closes-->
                    
                    <!--submit button created-->
                    <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="submit"/>
                </form> <!--form tag closes-->
            </div> <!--fourth row closes-->
        </div> <!--container tag closes-->
    </body> <!--body tag closes-->
</html> <!--html tag closes-->