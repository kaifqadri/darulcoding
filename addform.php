<?php 
session_start();
include("databasec.php");


?>
<!DOCTYPE html>
<html>

<head>
    <title>Addmission form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #FBAB7E;
            background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);

        }

        .container {
            background-color: #ebe8e875;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>
</head>

<body>
    <audio src="noti.wav" autoplay></audio>
    <nav class="text-center bg-light text-dark">
    <a href="mainpage.php" class="logo d-flex align-items-center mx-5 ">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block mx-"> <h1 class="text-dark">  Darul coding </h1></span>
        <h1 class="d-xl-none d-block">Darul Coding</h1>
      </a>
       
           </nav>
           

    <div class="container mt-5">
        <div class="header d-flex justify-content-between align-items-center text-center">
            <h1>Addmission Form</h1>

        </div>
        <form method="post"  enctype="multipart/form-data">
            <div class="row">

                <div class="form-group col-12 col-md-4 col-12">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" Name" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="father_name">Father Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name"
                        placeholder="Father Name" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="mobile">Mobile No</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" minlength="10"
                        placeholder="Mobile No" required>
                </div>
                <div class="form-group col-md-4  col-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="aadhar">Rollno</label>
                    <input type="text" class="form-control" id="aadhar" name="Rollno" maxlength="10" minlength="4"
                        placeholder="Rollno" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="dob">DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="doj">password</label>
                    <input type="password" class="form-control" id="doj" name="password" required
                        placeholder="password">
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="s_photo">Photo</label>
                    <input type="file" class="form-control-file" id="s_photo" name="s_photo">
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="department">subject</label>
                    <input type="text" class="form-control" id="department" name="subject" placeholder="Subject"
                        required>
                </div>


            </div>
            

            <button type="submit" name="save" class="btn btn-primary mt-3">Save Details</button>
            <?php
 if(isset($_POST['save'])){
    $name=$_POST['name'];
    $father_name=$_POST['father_name'];
    $mobile_no=$_POST['mobile'];
    $email=$_POST['email'];
    $roll_no=$_POST['Rollno'];
    $dob=$_POST['dob'];
    $password=$_POST['password'];
  
    $address=$_POST['address'];
    $subject=$_POST['subject'];

    


    $query="INSERT INTO `addmission`( `name`, `father_name`, `mobile_no`, `email`, `roll_no`, `dob`, `password`, `address`, `subject`) VALUES ('$name','$father_name','$mobile_no','$email','$roll_no','$dob','$password','$address','$subject')";

    if (mysqli_query($DB_con, $query)) {
        $_SESSION['user']=$username;
        echo "<script>window.open('mainpage.php','_self')</script>";

 }


        }
    


 
?>


        </form>
    </div>
    <br><br><br>
</body>

</html>