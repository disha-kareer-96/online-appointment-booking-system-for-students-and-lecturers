<?php
    session_start(); //session start
    unset($_SESSION['student_id']); 
    //student id will be unset when the student clicks on logout button when on studenthome page
    header("Location:studentlogin.php"); //redirected back to studentlogin page
?>