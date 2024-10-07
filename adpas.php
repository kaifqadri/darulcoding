<?php 
session_start();
include("databasec.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>collage project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-image: url("https://img.pikbest.com/origin/09/28/35/30gpIkbEsTsdb.jpg!w700wp");
        }
        /* From Uiverse.io by Spacious74 */ 




    </style>
   
</head> <audio src="noti.wav" autoplay></audio>
    <nav class="text-center bg-light text-dark">
    <a href="mainpage.php" class="logo d-flex align-items-center mx-5 ">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block mx-">
             <h1 class="text-dark text-center" style="color:black;">  Darul coding </h1></span>
             <h1 class="d-xl-none d-block">Darul Coding</h1>
      </a> 
       
           </nav>
 
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-xl-12">
            
<div class="container">
 
  
  <form method="Post" class="mt-5 text-center" style="border-radius: 42px;
background: #e0e0e0;
box-shadow: inset -8px -8px 16px #a6a6a6,
            inset 8px 8px 16px #ffffff;
            width:350px;
            margin-left:400px;"><br>Name <br>
<input type="text" name="Name" placeholder="name" class="p-2 text-center"><br><br>USERNAME<br>
<input type="text" name="Username" placeholder="Rollno" class="p-2 text-center" autocomple="off"><br><br> Email <br>
<input type="email" name="Email" placeholder="email" class="p-2 text-center"><br><br>Password <br>
<input type="password" name="Password" placeholder="password" class="p-2 text-center"><br><br>
<button type="submite" name="save" class="btn btn-warning" class="p-2 text-center">sing up</button><br>
    
    <?php
    if(isset($_POST['save'])){
        $name=$_POST['Name'];
        $username=$_POST['Username'];
        $email=$_POST['Email'];
    
        $password=$_POST['Password'];

        $query="INSERT INTO `addpas`(`name`, `username`, `email`, `password`) VALUES ('$name','$username','$email','$password')";

        if (mysqli_query($DB_con, $query)) {
           $_SESSION['user']=$username;
           echo "<script>window.open('index.php','_self')</script>";

    }

}   
?><br><br>
    </form>
</div>

        </div>
    </div>
</div>



      </body>
      </html>
