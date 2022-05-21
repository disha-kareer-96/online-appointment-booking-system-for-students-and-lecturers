<?php
    session_start(); //session start
    unset($_SESSION['lecturer_id']);
    //lecturer id will be unset when the lecturer clicks on logout button when on lecturer page
    header("Location:lecturerlogin.php"); //redirected back to lecturerlogin page
?>