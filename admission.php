<?php

session_start();
if(isset($_POST['admission'])){



            
            $tracksAndStrand = $_POST['Strand'];
            $LRN = $_POST['lrn'];
            $Fname = $_POST['Firstname'];
            $Mname = $_POST['Middlename'];
            $Lname = $_POST['Lastname'];
            $Gender = $_POST["gender"];
            $Bday = $_POST['bday'];
            $Birthday = date('Y-m-d', strtotime($Bday));
            $Age = $_POST['age'];
            $StudentAddress = $_POST['Address'];
            $City = $_POST['city'];
            $Province = $_POST['Province'];
            $PostalCode = $_POST['postalcode'];
            $Email = $_POST['email'];
            $Guardian = $_POST['fullname_guardian'];
            $GuardianAddress = $_POST['Addressof'];
            $ContactNumber = $_POST['cpNumber'];
            $LastSchoolAttend = $_POST['SchoolLastAttend'];
            $SchoolType = $_POST['schoolType'];
            $public = "/Public School/i";;
            $private = "Private School";
            
            if(preg_match($public, $SchoolType, $vouchour, PREG_OFFSET_CAPTURE)) {
                $vouchour = "TRUE";
                
            }else{
                $vouchour = "FALSE";

            }




            $LastSchoolAttendAddress = $_POST['SchoolLastAttendAddress'];
            $yearGraduated = date('Y-m-d', strtotime($_POST['yearGraduated']));
            $LearningModality = $_POST['LearningModality'];

            $conn = mysqli_connect("sql207.epizy.com", "epiz_31816239", "ZV2ce46zUM", "epiz_31816239_bestlinkbulacan");
            $check = "SELECT COUNT(LRN) FROM admission_list WHERE LRN = '$LRN'";
            $rs = mysqli_query($conn,$check);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                if($data[0] > 0) {
                    echo '<script> alert("STUDENT ALREADY SUBMITTED") </script>';
            
            }else {
                    $InsertDataToDatabase = "INSERT INTO admission_list (`LRN`, `Strand`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `Birthday`, `Age`, `Address`, `City`, `Province`, `PostalCode`, `Email`, `GuardianName`, `GuardianAddress`, `ContactNumber`, `LastSchoolAttend`, `LastSchoolType`, `VouchourStatus`, `LastSchoolAttendAddress`, `yearGraduated`, `LearningModality`) VALUES ('$LRN', '$tracksAndStrand', '$Fname', '$Mname', '$Lname', '$Gender', '$Birthday', '$Age','$StudentAddress', '$City', '$Province', '$PostalCode', '$Email', '$Guardian', '$GuardianAddress', '$ContactNumber', '$LastSchoolAttend', '$SchoolType', '$vouchour', '$LastSchoolAttendAddress', '$yearGraduated', '$LearningModality')";
                    $resultData = mysqli_query($conn, $InsertDataToDatabase);
                    if($resultData) {
                        
                        echo '<script> alert("A D M I S S I O N     S U C C E S S!") </script>';
                    }else{
                        echo '<script> alert("A D M I S S I O N     F A I L") </script>';
                        
                    }
            }
}

                    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    
    <div class="img_logo"> <img src="res/bcplogo.png" alt="">
    <h1 class="h1_bcp"> Bestlink College Of the Philippines Bulacan </h1>
    </div>

    <div class="myForm">
    <form action="admission.php" method="post" id="form1" onsubmit="if(document.getElementById('check').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
        <br><br><br>
    <h1 class="h1_admission"> ADMISSION </h1>
            <br><br><br>
            <label for="Strand" id="Strand"> Choose a Track and Strand: </label>
            <select  name="Strand" id="Strand">
            <optgroup label="Academic Track" >
           
            <option value="Accountancy, Business, and Management">Accountancy, Business, and Management</option>
            <option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
            <option value="General Academic Strand">General Academic Strand</option>
            <option value="Science, Technology, Engineering, and Mathematics">Science, Technology, Engineering, and Mathematics</option>
        </optgroup> <br>
        <optgroup label="Technical-Vocational-Livelihood Track">
            <option value="Commercial Cooking (NC III)">Commercial Cooking (NC III)</option>
            <option value="Food and Beverage Services (NC II)">Food and Beverage Services (NC II)</option>
            <option value="Housekeeping (NC II)">Housekeeping (NC II)</option>
            <option value="Bread and Pastry Production (NC II)">Bread and Pastry Production (NC II)</option>
            <option value="Local Guiding Services (NC II)">Local Guiding Services (NC II)</option>
            <option value="Front Office Services (NC II)">Front Office Services (NC II)</option>
            <option value="Bartending (NC II)">Bartending (NC II)</option>
            <option value="Bread and Pastry Production (NC II)">Bread and Pastry Production (NC II)</option>
            <option value="Computer Programming (Java) (NC III)">Computer Programming (Java) (NC III)</option>
            <option value="Computer Hardware Servicing (NC II)">Computer Hardware Servicing (NC II)</option>
        </optgroup>
        <optgroup label="Arts and Design Track">
            <option value="Performing Arts">Performing Arts</option>
            <option value="Bread and Pastry Production (NC II)">Bread and Pastry Production (NC II)</option>
            <option value="Computer Programming (Java) (NC III)">Computer Programming (Java) (NC III)</option>
            <option value="Computer Hardware Servicing (NC II)">Computer Hardware Servicing (NC II)</option>
        </optgroup>
        </select> <br><br><br>
    <label for="lrn" id="input_text"> LRN : </label>
    <input type="text" name="lrn" id="input_text" maxlength="13" required="required"> <br>
    <label for="Firstname" id="input_text"> Firstname : </label>
    <input type="text" name="Firstname" id="input_text"> <br>
    <label for="Middlename" id="input_text"> Middlename : </label>
    <input type="text" name="Middlename" id="input_text"> <br>
    <label for="Lastname" id="input_text"> Lastname : </label>
    <input type="text" name="Lastname" id="input_text"> <br><br>


    <label for="gender" id="input_text"> Gender : </label>
    <input type="radio" name="gender" id="radio" value="Male"> Male <br>
    <input type="radio" name="gender" id="sec_radio" value="Female"> Female<br><br><br>



    <label for="bday" id="input_text"> Birthday : </label>
    <input id="input_text" name="bday" required="required" type="date" class="date"> <br>
    <label for="age" id="input_text"> Age : </label>
    <input type="text" id="input_text" name="age" required="required" > <br>


    <label for="Address" id="input_text"> Address : </label>
    <input type="text" name="Address" id="input_text"> <br>
    <label for="city" id="input_text"> City : </label>
    <input type="text" name="city" id="input_text" placeholder="e.g San Jose Del Monte" required="required"> <br>
    <label for="Province" id="input_text"> Province : </label>
    <input type="text" name="Province" id="input_text" placeholder="e.g Bulacan" required="required"> <br>
    <label for="postalcode" id="input_text"> Postal Code : </label>
    <input type="text" name="postalcode" id="input_text" required="required"> <br>
    <label for="email" id="input_text"> Email : </label>
    <input type="email" name="email" id="input_text" required="required"> <br>
    <br>
    <br>
    <h3 class="h2_parent"> Parent's / Guardian Information </h3> <br><br>
    <label for="fullname_guardian" id="input_text" > Full Name : </label>
    <input type="text" name="fullname_guardian" id="input_text" required="required" placeholder="e.g Juan Dela Cruz"> <br>
    <label for="Addressof" id="input_text"> Address : </label>
    <input type="text" name="Addressof" id="input_text" required="required"> <br>
    <label for="cpNumber" id="input_text"> Contact Number : </label>
    <input type="text" name="cpNumber" id="input_text" required="required" placeholder="+63"> <br>
    
    
    <label for="radio"> School Type : </label> <br> <br>

    <input type="radio" name="schoolType"  required="required"  id="sec_radio" value="Public School"> Public School <br>
    <input type="radio" name="schoolType"  required="required"  id="sec_radio" value="Private School"> Private School<br><br>

    <label for="SchoolLastAttend" id="input_text"> School Last Attended : </label>
    <input type="text" name="SchoolLastAttend" id="input_text" required="required" > <br>
    <label for="SchoolLastAttendAddress" id="input_text"> School Address : </label>
    <input type="text" name="SchoolLastAttendAddress" id="input_text" required="required"> <br>
    <label for="yearGraduated" id="input_text"> Year Graduated : </label>
    <input type="date" name="yearGraduated" id="input_text" required="required"> <br><br><br>
    
    
    <label for="LearningModality" id="input_text"> Select the Preferred Learning Modality : </label> <br> <br> 
    <input type="radio" name="LearningModality" required="required"  id="sec_radio" value="Modular (Digital)"> Modular (Digital) <br>
    <input type="radio" name="LearningModality" required="required"  id="sec_radio" value="Online (Digital)"> Online (Digital) <br>
    <input type="radio" name="LearningModality" required="required"  id="sec_radio" value="Blended"> Blended <br>
        
    
    
    <br><br><br><br><br>



        <input type="checkbox" name="termsandcondition" value="check" required="required" id="check">
        <label for="termsandcondition" id="check"> I Accept Terms and Conditions. </label>
    
        <br><br><br><br>
        <button type="submit" name="admission" form="form1" id="admission"> ADMISSION </button>
        <button type="submit" name="clear" form="form1" id="clear"> CLEAR </button> <br><br><br><br><br>



    </form>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>
</html>