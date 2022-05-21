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

          <title>Student Home</title>
          <!--this is the tab name when this file will be viewed in the browser-->

          <style> /* different html elements are styled */
            .col-md-12 {
                text-align:center;
            }

            img{
            padding: 10px;
            }
          </style>

  </head>  <!--head tag closes-->
    <body> <!--body tag opens-->
      <div class = "container"> <!--container tag opens-->
        <div class = "row"> <!--first row opens-->
          <!--12 based grid system used which holds the logo of the website-->
          <div class = "col-md-3"><img src="../img/logo.jpg"/></div>
          <div class = "col-md-7"></div>
          <div class = "col-md-2"></div>
        </div> <!--first row closes-->

        <!--name of the page with h1 heading style-->
        <h1 style ="text-align:center;"> Student Home </h1>

            <div class = "row"> <!--second row opens-->
              <div class = "col-md-12"> <!--col-md-12 tag opens-->
                <a href = "studentdashboard.php"> <!--link to the studentdashboard page-->
                  <br></br> <!--break tag-->
                  <button type="button" class="btn btn-warning">Student Dashboard</button> 
                </a> <!--a tag ends-->
              </div> <!--col-md-12 tag closes-->
            </div> <!--second row ends-->
            
            <div class = "row"> <!--third row opens-->
                <div class = "col-md-12"> <!--col-md-12 tag opens-->
                  <br></br> <!--break tag-->
                  <a href="studentlogout.php"><button type="button" class="btn btn-warning">Logout</button></a>
              </div> <!--col-md-12 tag closes-->
            </div> <!--third row ends-->
      </div> <!--container tag closes-->
  </body> <!--body tag closes-->
</html> <!--html tag closes-->