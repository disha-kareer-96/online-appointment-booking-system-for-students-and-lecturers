<?php //including the database connection and show errors files links
include ("../conn/dbconnection.php");
include ("../conn/showerrors.php");

session_start(); //starting the session
if(isset($_SESSION['student_id'])){ //if the session id is set take the student to the studenthome
    header("Location:studenthome.php"); //student_dashboard changed to studenthome.php 
}

if (isset($_POST['submit'])) {

    $errorMsg = "";

    $studentemailaddress = mysqli_real_escape_string($mydb, $_POST['student_email_address']);  
    $studentpassword = mysqli_real_escape_string($mydb, $_POST['student_password']); 

    //if student email address and password are not empty, run the select query 
    //and see if the result equals to 1
    if (!empty($studentemailaddress) || !empty($studentpassword)) { 
        $query  = "SELECT * FROM student_details WHERE student_email_address = '$studentemailaddress'";
        $result = mysqli_query($mydb, $query);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) { //verify login details and take the student to student home-->
            if (password_verify($studentpassword, $row['student_password'])) {
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['student_first_name'] = $row['student_first_name'];
                header("Location:studenthome.php"); //name change from student dashboard 
                //to student home
            }else{
                $errorMsg = "Email or Password is invalid";//else error message given to the user
            }    
          }
        }else{
          $errorMsg = "No user found on this email"; 
          // error message if the database does not find the user on the requested email
        } 
    }else{
        
      $errorMsg = "Email and Password is required"; 
      //if the form is submitted empty, error message given
    }
}
?>

<!doctype html>
<html lang="en"> <!--html tag opens-->
    <head> <!--head tag opens-->

        <!--required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Bootstrap CSS framework-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <title>Student Login</title>
        <!--this is the tab name when this file will be viewed in the browser-->

        <style> /* different html elements are styled */
            img{
            padding: 10px;
            }
        </style>
    </head> <!--head tag closes-->

    <body> <!--body tag opens-->
        <div class="container"> <!--container tag opens-->
            <div class="row"> <!--first row to add logo using the 12 based grid system-->
                <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
                <div class = "col-md-7"></div>
                <div class = "col-md-2"></div>
            </div> <!--first row closes-->

            <div class="row"> <!--second row opens-->
                <h1 style="text-align:center;">Login</h1><!--h1 heading style given to this page-->
            </div> <!--second row closes-->

            <div class = "row"> <!--third row opens-->
                <!--12 based grid system used-->
                <div class = "col-md-4"></div>
                <div class = "col-md-4">
                    <?php
                        if(isset($errorMsg)){
                            echo "<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            $errorMsg
                          </div>";
                        }
                    ?>

                    <form action="" method="POST"> <!--form method post used-->
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <input type="email" class="form-control" name="student_email_address" placeholder="Email">
                        </div> <!--form group tag closes-->
                        
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <input type="password" class="form-control" name="student_password" placeholder="Password">
                        </div> <!--form group tag closes-->
                        
                        <!--sign up button linking to the studentregister page-->
                        <p>Are you already registered? <a href="studentregister.php">Sign Up</a></p>
                        <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Login">
                    </form> <!--form tag closes-->
                </div> <!--col-md-4 tag closes-->
                <div class = "col-md-4"></div>
            </div> <!--third row closes-->
        </div> <!--container tag closes-->
    </body> <!--body tag closes-->
</html> <!--html tag closes-->