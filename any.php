<?php

session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="") 
    {   
    header("Location: index.php"); 
    }else{}
if(isset($_POST['submit'])) {


        $fullname = $_POST['fullname'];
        $address = $_POST['address']; 
        $age = $_POST['age']; 
        $lastschoolattended = $_POST['lastschoolattended']; 
        $mothersname =$_POST['mothersname']; 
        $fathersname = $_POST['fathersname']; 
        $contactno = $_POST['contactno']; 
        $email = $_POST['email']; 
        $gender = $_POST['gender']; 
        $dob = $_POST['dob']; 


    $Query = "INSERT INTO admissionn (FullName, Address, Age, Lastschoolattended, MothersName, FathersName, ContactNo, Email, Gender, DOB)".
    "VALUES('$fullname', '$address', '$age', '$lastschoolattended', '$mothersname', '$fathersname', '$contactno', '$email', '$gender', $dob)";
    $InsertData = mysqli_query($conn, $Query);
            if($InsertData) {
            $msg=" We will inform you in your registered Email for more information";
            }
            else 
            {
            $error="Something went wrong. Please try again";
            }

}
            
            
    ?>