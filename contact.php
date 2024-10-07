
<?php 
session_start();
include("databasec.php");


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact us</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
      body {
        background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);

       
      }
      body {
        font-family: Arial, sans-serif;
     
      }
      .feedback-form {
        max-width: 500px;
        margin: auto;
      }
      .form-group {
        margin-bottom: 15px;
      }
      .form-group label {
        display: block;
        margin-bottom: 5px;
      }
      .form-group input,
      .form-group textarea {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
      }
      .form-group textarea {
        height: 100px;
        resize: vertical;
      }
      .form-group button {
        padding: 10px 15px;
        background-color: #000000;
        color: white;
        border: none;
        cursor: pointer;
      }
      .form-group button:hover {
        background-color: #ffffff;
      }
      .feedback-result {
        margin-top: 20px;
      }
      h1{
        color:black;
      }
    </style>
  </head>

  <body>
    <audio src="noti.wav" autoplay></audio>
    <nav class="text-center bg-light text-dark">
    <a href="mainpage.php" class="logo d-flex align-items-center mx-5 ">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block mx-"> <h1 class="text-dark">  Darul coding </h1></span>
      </a>
       
           </nav>
    <div class="container-fluid">
      <div class="row text-light">
        <div class="col-12 col-xl-6 mt-5 mb-5 feedback-form">
          <h2>Feedback Form</h2>
          <form id="feedbackForm" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="NAME" required />
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="EMAIL" required />
    </div>
    <div class="form-group">
        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" placeholder="MESSAGE" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" name="save">Submit</button>
    </div>

    <?php
    if (isset($_POST['save'])) {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comments'];

        // Database connection (ensure the $DB_con is already defined)
        include("databasec.php");

        // SQL Query (fixed)
        $query = "INSERT INTO `feedback` (`name`, `email`, `comment`) VALUES ('$name', '$email', '$comment')";

        // Execute the query
        if (mysqli_query($DB_con, $query)) {
            
        } else {
            echo "Error: " . mysqli_error($DB_con);
        }
    }
    ?>
</form>

        </div>

        <div class="col-12 col-xl-6 mt-5">
            <div class="footer-section text-light">
                <h3 style="font-size: 45px;">Darul-Coding</h3>
                <p style="font-size: 25px;">1234 Street Name, City, State, 12345</p>
                <p>Email: info@company.com</p>
                <p>Phone: (123) 456-7890</p>
              </div>
          
            <a href="#" class="social-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i> 
                Facebook</a><br>
            <a href="#" class="social-icon"><i class="fa fa-twitter-square" aria-hidden="true"></i>
                Twitter</a><br>
            <a href="#" class="social-icon"><i class="fa fa-instagram" aria-hidden="true"></i>
                Instagram</a><br>
            <a href="#" class="social-icon"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
                LinkedIn</a>
        
        </div>

        <div class="feedback-result" id="feedbackResult"></div>

      
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <div class="footer-container">
        <!-- Company Information Section -->
        <div class="footer-section">
          <h3>Company Name</h3>
          <p>1234 Street Name, City, State, 12345</p>
          <p>Email: info@company.com</p>
          <p>Phone: (123) 456-7890</p>
        </div>

        <!-- Quick Links Section -->
        <div class="footer-section">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>

        <!-- Social Media Section -->
        <div class="footer-section">
          <h3>Follow Us</h3>
          <div class="social-icons">
            <a href="#" class="social-icon">🔗 Facebook</a>
            <a href="#" class="social-icon">🔗 Twitter</a>
            <a href="#" class="social-icon">🔗 Instagram</a>
            <a href="#" class="social-icon">🔗 LinkedIn</a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2024 Company Name. All rights reserved.</p>
      </div>
    </footer>
  </body>
</html>
