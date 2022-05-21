<?php

include("password.php");
include("showerrors.php");

//OO (object oriented syntax) for my sqli connection
// create mysqli object to connect to database
//needs 4 parameters
// 1. Host
// 2. Username
// 3. Password
// 4. Database Name
$mydb = new mysqli("webhost3.eeecs.qub.ac.uk", "dkareer01", $pwd, "dkareer01");

// check connection
if ($mydb->connect_errno) {
    echo "failed to connect to db" . $mydb->connect_error;
}

else{
    //echo "connection successful";
}
?>

<?php
//Login Details of Students and Lecturers stored within the PHP My Admin Database

// Student Number 1 
// Name:- Timmy Turner
// Email Address:- tturner01@qub.ac.uk 
// Password:- test1234

// Student Number 2
// Name:- Mary Patterson
//email Address:- 
// Password:- test1

// Student Number 3
// Name:- Claire Stewart
// Email Address:- test666
// Password:- test666

//Student Number 4 
// Name:-  Neil Bell 
// Email Address:- nbell04@qub.ac.uk
// Password:- test466

// Lecturer Number 1 
// Name:- Bert Wilson
// Email Address:- bwilson01@qub.ac.uk
// Password:- test345

// Lecturer Number 2
// Name:- Sarah Smith
// Email Address:- ssmith03@qub.ac.uk
// Password:- test568

// Lecturer Number 3
// Name:- Sarah Wilson
// Email Address:- swilson05@qub.ac.uk
// Password:- test889

// Lecturer Number 4
// Name:- David Cutting
// Email Address:- dcutting07@qub.ac.uk
// Password:- test777

// Lecturer Number 5
// Name:- Peter Burns
// Email Address:- pburns09@qub.ac.uk
// Password:- test888
?>