<?php //including the database connection and show errors files links
include ("../conn/dbconnection.php");
include ("../conn/showerrors.php");

if (isset($_POST['submit'])) { //when the submit is clicked.. do the following steps seen below-->

    $errorMsg = "";
      
    $studentfirstname = mysqli_real_escape_string($mydb, $_POST['student_first_name']);
    $studentlastname = mysqli_real_escape_string($mydb, $_POST['student_last_name']);
    $studentusername = mysqli_real_escape_string($mydb, $_POST['student_username']);
    $studentpassword = mysqli_real_escape_string($mydb, $_POST['student_password']);
    $studentpassword = password_hash($studentpassword, PASSWORD_DEFAULT);
    $studentemailaddress = mysqli_real_escape_string($mydb, $_POST['student_email_address']);
    $studentcontactnumber = mysqli_real_escape_string($mydb, $_POST['student_contact_number']);

    //select query created for student email address and will be stored in the variable name
    $sql = "SELECT * FROM student_details WHERE student_email_address = '$studentemailaddress'";
    $execute = mysqli_query($mydb, $sql); //executing the select query

    if (!filter_var($studentemailaddress, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email is not valid try again"; //error message if email address is not valid
    }else if(strlen($studentpassword) < 6){ //setting length for password
        $errorMsg = "Password should be six digits";
    }else if($execute->num_rows == 1){ 
        //check if there is already a row stored in the database for the email address created
        $errorMsg = "This email already exists"; //error message seen by the student
    }else{ 
        //insert the details of the new student in the student_details table within the database
        //if email address is not duplicated
        $query= "INSERT INTO student_details(student_first_name,student_last_name,student_username,student_password,student_email_address, student_contact_number)
                VALUES('$studentfirstname', '$studentlastname', '$studentusername', '$studentpassword', '$studentemailaddress', '$studentcontactnumber')";
        $result = mysqli_query($mydb, $query);
    }
    if ($result == true){
        header("Location:studentlogin.php"); //if the insertion works successfully, 
        //redirect the student to the student login page
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
       
        <!--link to Bootstrap CSS framework-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel = "https://coolors.co/palettes/latest"> 
        <!--link of the website used to select different colours for the web application-->

        <title>Student Register</title> 
         <!--this is the tab name when this file will be viewed in the browser-->

        <style> /* different html elements are styled */
            img{
             padding: 10px;   
            }

            form{
                background-color: #59a96a;
            }
        </style>

    </head> <!--head tag closes-->

    <body> <!--head tag opens-->
        <div class="container"> <!--container tag opens-->
            <div class="row"> <!--first row to add logo using the 12 based grid system-->
                <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
                <div class = "col-md-7"></div>
                <div class = "col-md-2"></div>
            </div> <!--first row closes-->

            <div class="row"> <!--second row opens-->
                <!--h1 heading style given to this page-->
                <h1 style="text-align:center;">Student Registration Form</h1>
            </div>  <!--second row closes-->

            <div class="row"> <!--third row opens-->
                <!--12 based grid system used-->
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

                    <form action="" method="POST"> <!--form using the post method-->
                        <div class="form-group"> 
                            <!--form group holding the different elements of the form-->
                            <label for="student_first_name">Student First Name</label> <!--label name given-->
                            <input type="text" class="form-control" name="student_first_name" placeholder= "Student First Name" required="">
                        <div> <!--form group tag closes-->
                            
                        <div class="form-group">
                            <!--form group holding the different elements of the form-->
                            <label for="student_last_name">Student Last Name</label> <!--label name given-->
                            <input type="text" class="form-control" name="student_last_name" placeholder= "Student Last Name" required="">
                        </div> <!--form group tag closes-->

                        <div class="form-group">
                            <!--form group holding the different elements of the form-->
                            <label for="student_username">Student Username</label> <!--label name given-->
                            <input type="text" class="form-control" name="student_username" placeholder= "Enter Student Username" required="">
                        </div> <!--form group tag closes-->

                        <div class="form-group">
                            <!--form group holding the different elements of the form-->
                            <label for="student_password">Student Password</label> <!--label name given-->
                            <input type="password" class="form-control" name="student_password" placeholder= "Create Password" required="">
                        </div> <!--form group tag closes-->

                        <div class="form-group">
                            <!--form group holding the different elements of the form-->
                            <label for="student_email_address">Student Email</label> <!--label name given-->
                            <input type="email" class="form-control" name="student_email_address" placeholder= "Enter Email" required="">
                        </div> <!--form group tag closes-->
                  
                        <div class="form-group">
                            <!--form group holding the different elements of the form-->
                            <label for="student_contact_number">Student Contact Number</label>
                            <input type="tel" class="form-control" id="student_contact_number" placeholder= "Enter your Contact Number" name="student_contact_number"/>
                        </div> <!--form group tag closes-->
                        
                        <!--linking the button to the student login page-->
                        <p>If you have account? <a href="studentlogin.php">Student Login</a></p>
                        <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Sign Up">  
                    </form> <!--form tag ends-->
                </div>
                <div class="col-md-4"></div>
            </div> <!--third row closes-->
        </div> <!--container tag ends-->
    </body> <!--body tag finishes-->
</html> <!--html tag ends-->