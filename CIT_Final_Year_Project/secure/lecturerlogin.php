<?php //including the database connection and show errors files links
include ("../conn/dbconnection.php");
include ("../conn/showerrors.php");

session_start(); //session start for the lecturer

if(isset($_SESSION['lecturer_id'])){ //if the session id is set take the lectuer to the lecturerhome
    header("Location:lecturerhome.php"); //changed the page name from lecturer dashboard to 
    //lecturer home
}

if (isset($_POST['submit'])) {

    $errorMsg = "";

    $lectureremailaddress = mysqli_real_escape_string($mydb, $_POST['lecturer_email_address']);
    echo $lectureremailaddress;
    echo "\r\n";
    $lecturerpassword = mysqli_real_escape_string($mydb, $_POST['lecturer_password']); 
    echo $lecturerpassword;
    echo "\r\n";

    if (!empty($lectureremailaddress) || !empty($lecturerpassword)) {
        $query  = "SELECT * FROM lecturer WHERE lecturer_email_address = '$lectureremailaddress'";
        $result = mysqli_query($mydb, $query);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($lecturerpassword, $row['lecturer_password'])) {
                $_SESSION['lecturer_id'] = $row['lecturer_id'];
                $_SESSION['lecturer_first_name'] = $row['lecturer_first_name'];
                header("Location:lecturerhome.php"); //name change from lecturer dashboard
                //to lecturer home
            }else{
                $errorMsg = "Email or Password is invalid";
            }    
          }
        }else{
          $errorMsg = "No user found on this email";
        } 
    }else{
      $errorMsg = "Email and Password is required";
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
        
        <title>Lecturer Login</title>
        <!--this is the tab name when this file will be viewed in the browser-->

        <style> /* different html elements are styled */
            img{
            padding: 10px;
            }
        </style>

    </head> <!--head tag closes-->

    <body> <!--head tag opens-->
        <div class="container"> <!--container tag opens-->
            <!--first row to add logo of the website and using the 12 based grid system-->
            <div class="row">
                <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
                <div class = "col-md-7"></div>
                <div class = "col-md-2"></div>
            </div> <!--first row closes-->

            <div class="row"> <!--second row opens-->
                <h1 style="text-align:center;">Login</h1> 
                <!--using the h1 heading style for the page name-->
            </div> <!--second row closes-->

            <div class = "row"> <!--third row opens-->
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

                    <form action="" method="POST"> <!--form tag opens with the POST method-->
                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <input type="email" class="form-control" name="lecturer_email_address" placeholder="Email">
                        </div> <!--form group tag closes-->

                        <!--form group holding the different elements of the form-->
                        <div class="form-group">
                            <input type="password" class="form-control" name="lecturer_password" placeholder="Password">
                        </div> <!--form group tag closes-->
                        
                         <!--sign up button linking to the lecturerregister page-->
                        <p>Are you already registered? <a href="lecturerregister.php">Sign Up</a></p>
                        <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Login">
                    </form> <!--form tag closes-->
                </div>
                <div class = "col-md-4"></div>
            </div> <!--third row closes-->
        </div> <!--container tag closes-->
    </body> <!--body tag closes-->
</html> <!--html tag closes-->