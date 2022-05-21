<?php //including the database connection and show errors files links
include ("../conn/dbconnection.php");
include ("../conn/showerrors.php");
?>

<!doctype html>
<html lang="en"> <!--html tag opens-->
  <head> <!--head tag opens-->
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Lecturer Home</title>

    <style>
      .col-md-12 {
        text-align:center;
      }

      img{
      padding: 10px;
      }
    </style>
  </head> <!--head tag closes-->
  <body> <!--body tag opens-->
      <div class = "container"> <!--container tag opens-->
        <div class = "row"> <!--first row opens-->
          <!--using the 12 based grid system from Bootstrap with website logo -->
          <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
          <div class = "col-md-7"></div>
          <div class = "col-md-2"></div>
        </div> <!--first row closes-->

        <!--name of the page with h1 heading style-->
        <h1 style ="text-align:center;">Lecturer Home</h1> 

          <div class = "row"> <!--second row opens-->
            <div class = "col-md-12"> <!--col-md-12 tag opens-->
              <!--linking the button to addlectureravailability page-->
              <a href = "addlectureravailability.php">
                <br></br> <!--break tag between the buttons-->
                <button type="button" class="btn btn-warning">Add Lecturer Availability</button>
              </a> <!-- a tag closes-->
            </div>  <!--col-md-12 tag ends-->
          </div> <!--second row closes-->

            <div class = "row"> <!--third row opens-->
              <div class = "col-md-12"> <!--col-md-12 tag opens-->
                <!--linking the button to lecturerupcomingappointments page-->
                <a href = "lecturerupcomingappointments.php">
                  <br></br> <!--break tag between the buttons-->
                  <button type="button" class="btn btn-warning">Check Upcoming Appointments</button> 
                </a> <!--a tag closes-->
              </div> <!--col-md-12 tag closes-->
            </div> <!--third row closes-->

            <div class = "row"> <!--fourth row opens-->
              <div class = "col-md-12"> <!--col-md-12 tag opens-->
                <!--linking the button to editlectureravailability page-->
                <a href = "editlectureravailability.php">
                  <br></br> <!--break tag between the buttons-->
                  <button type="button" class="btn btn-warning">Edit Lecturer Availability</button> 
                </a> <!--a tag closes-->
              </div> <!--col-md-12 tag closes-->
            </div> <!--fourth row closes-->

            <div class = "row">  <!--fifth row opens-->
              <div class = "col-md-12"> <!--col-md-12 tag opens-->
                  <br></br> <!--break tag between the buttons-->
                  <a href="logout.php"><button type="button" class="btn btn-warning">Logout</button></a>
              </div> <!--col-md-12 tag closes-->
            </div> <!--fifth row closes-->
    </div> <!--container tag closes-->
  </body> <!--body tags closes-->
</html> <!--html tags closes-->