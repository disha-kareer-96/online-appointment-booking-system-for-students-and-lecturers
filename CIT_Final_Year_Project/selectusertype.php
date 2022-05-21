<!doctype html>
<html lang="en"> <!--html tag opens-->
  <head> <!--head tag opens-->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Users Dashboard</title> <!--this is the tab name when this file will be viewed 
    in the browser-->

      <style> /* different html elements are styled */
        .col-md-12{
          text-align:center;
        }

        img{
            padding: 10px;
        }
      </style>
  </head> <!--head tag closes-->
  <body> <!--body tag opens-->

    <div class = "container"> <!--the main container opens-->
        <div class = "row"> <!--row one opens-->
            <!--12 based grid system used which holds the logo of the website-->
          <div class = "col-md-3"><img src="img/logo.jpg"/></div>
          <div class = "col-md-7"></div>
          <div class = "col-md-2">
        </div> <!--row one closes-->

        <!--heading style h1 used with inline CSS applied to the title "User Type"-->
        <h1 style ="text-align:center;">User Type</h1> 

          <div class = "row"> <!--row two opens-->
            <div class = "col-md-12"> <!--div for column width 12 opens-->
              <a href = "secure/studentregister.php"> 
              <!--link to the page where the student button will be directed to-->
                <br></br> <!--adding space between the two buttons used on this page-->
                <button type="button" class="btn btn-warning">Student</button>
                <!--button created with the bootstrap button style used called btn btn-warning-->
              </a> <!-- a tag closes for the button "student"-->
            </div> <!--div for column width 12 ends-->
          </div> <!--row two closes-->

            <div class = "row"> <!--row three opens-->
              <div class = "col-md-12"> <!--div for column width 12 opens-->
                <a href = "secure/lecturerregister.php">
                   <!--link to the page where the lecturer button will be directed to-->
                  <br></br> <!--adding space between the two buttons used on this page-->
                  <button type="button" class="btn btn-warning">Lecturer</button>
                  <!--button created with the bootstrap button style used called btn btn-warning-->
                </a> <!-- a tag closes for the button "lecturer"-->
              </div> <!--div for column width 12 ends-->
            </div> <!--row three closes-->
      </div> <!--container tag closes-->
  </body> <!--body tag finishes-->
</html> <!--html tag closes-->