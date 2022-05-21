<?php //including the database connection and show errors files links
include ("../conn/dbconnection.php");
include ("../conn/showerrors.php");

if (isset($_POST['submit'])) {//when the submit is clicked.. do the following steps seen below-->

    $errorMsg = "";
      
    $lecturerfirstname = mysqli_real_escape_string($mydb, $_POST['lecturer_first_name']);
    $lecturerlastname = mysqli_real_escape_string($mydb, $_POST['lecturer_last_name']);
    $lecturerusername = mysqli_real_escape_string($mydb, $_POST['lecturer_username']);
    $lecturerpassword = mysqli_real_escape_string($mydb, $_POST['lecturer_password']);
    $lecturerpassword = password_hash($lecturerpassword, PASSWORD_DEFAULT);
    $lectureremailaddress = mysqli_real_escape_string($mydb, $_POST['lecturer_email_address']);

    //select query created for lecturer email address and will be stored in the variable name
    $sql = "SELECT * FROM lecturer WHERE lecturer_email_address = '$lectureremailaddress'";
    $execute = mysqli_query($mydb, $sql); //executing the select query

    if (!filter_var($lectureremailaddress, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email is not valid try again"; //error message if email address is not valid
    }else if(strlen($lecturerpassword) < 6){ //setting length for password
        $errorMsg = "Password should be six digits";
    }else if($execute->num_rows == 1){
        //check if there is already a row stored in the database for the email address created
        $errorMsg = "This email already exists"; //error message seen by the lecturer
    }else{
        //insert the details of the new lecturer in the lecturer table within the database if 
        //email address is not duplicated
        $query= "INSERT INTO lecturer(lecturer_first_name,lecturer_last_name,lecturer_username,lecturer_password,lecturer_email_address)
                VALUES('$lecturerfirstname', '$lecturerlastname', '$lecturerusername', '$lecturerpassword', '$lectureremailaddress')";   
        $result = mysqli_query($mydb, $query);
    }
    if ($result == true){ ///if the insertion works successfully, 
        header("Location:lecturerlogin.php"); //redirect the student to the student login page
    }else{
        $errorMsg  = "You are not Registered..Please Try Again"; //otherwise give error message
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

        <title>Lecturer Register</title>
        <!--this is the tab name when this file will be viewed in the browser-->

        <style> /* different html elements are styled */
            img{
             padding: 10px;   
            }

            form{
                background-color: #5BCEF4;
            }
        </style>
    </head> <!--head tag closes-->

    <body> <!--body tag opens-->
        <div class="container"> <!--container tag opens-->
            <!--first row opens to add website logo and using the 12 based grid system-->
            <div class="row">
                <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
                <div class = "col-md-7"></div>
                <div class = "col-md-2"></div>
            </div> <!--first row closes-->

            <div class="row"> <!--second row opens-->
                <h1 style="text-align:center;">Lecturer Registration Form</h1>
            </div> <!--second row closes-->

            <div class="row"> <!--third row opens-->
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php
                        if (isset($errorMsg)) {
                        echo "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        $errorMsg
                      </div>";
                        }
                    ?>

                    <form action="" method="POST"> <!--form tag opens with POST method used-->
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <label for="lecturer_first_name">Lecturer First Name</label>
                            <input type="text" class="form-control" name="lecturer_first_name" placeholder= " Enter Lecturer First Name" required="">
                        <div> <!--form group tag closes-->
                        
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <label for="lecturer_last_name">Lecturer Last Name</label>
                            <input type="text" class="form-control" name="lecturer_last_name" placeholder= " Enter Lecturer Last Name" required="">
                        </div> <!--form group tag closes-->

                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <label for="lecturer_username">Lecturer Username</label>
                            <input type="text" class="form-control" name="lecturer_username" placeholder= "Enter Lecturer Username" required="">
                        </div> <!--form group tag closes-->
                        
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <label for="lecturer_password">Lecturer Password</label>
                            <input type="password" class="form-control" name="lecturer_password" placeholder= "Create Password" required="">
                        </div> <!--form group tag closes-->
                        
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <label for="lecturer_email_address">Lecturer Email</label>
                            <input type="email" class="form-control" name="lecturer_email_address" placeholder= "Enter Email Address" required="">
                        </div> <!--form group tag closes-->
                        
                        <!--linking the button to the lecturer login page-->
                        <p>If you have account <a href="lecturerlogin.php">Lecturer Login</a></p>
                        <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Sign Up">  
                    </form> <!--form tag closes-->
                </div>
                <div class="col-md-4"></div>
            </div> <!--third row closes-->
        </div> <!--container tag closes-->
    </body> <!--body tag closes-->
</html> <!--html tag closes-->