
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <style>
      
        a{
            text-decoration: none;
            color:white;
        }
        li:hover{
            background-color:blue;
            color:white;
            padding:15px 00px;
            margin:-15px;   
        }
    </style>
</head>
<body>
    <audio src="noti.wav" autoplay ></audio>
    <nav class="text-center bg-light text-dark">
    <a href="mainpage.php" class="logo d-flex align-items-center mx-5 ">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block mx-"> <h1 class="text-dark">  Darul coding </h1></span>
      </a>
       
           </nav>
           <div class="container-fluid">
            <div class="row text-center text-light bg-light"  >
                <div class=" col- col-xl- bg-dark side-bar  text-light text-center"><br><br><br>
                    <p></p><hr>
                    

                </div>
                <div class="col-12 col-xl-12  text-dark " style="height:vh; margin-top:-0px;
  overflow: scroll; ;">
               
               <div class="container mt-5">
    <div class="row">
        <?php
        // Include the database connection file
        include("databasec.php");

        // Write the query to fetch data
        $fetchQuery = "SELECT `hed`, `main`, `side`, `fut` FROM `back`";

        // Execute the query
        $run = mysqli_query($DB_con, $fetchQuery);

        // Check if the query was successful
        if (!$run) {
            die("Query Failed: " . mysqli_error($DB_con));
        }

        // Loop through the rows
        while ($row = mysqli_fetch_assoc($run)) {
            ?>
            <div class="col-md-12 border">
                <h1 class=""> <?php echo $row['hed']; ?></h1>
            </div>

            

            <div class="col-md-3 border d-none d-xl-block">
                <pre class="mt-5" align="justify" style="font-size:20px;  font-family:arial; word-wrap: break-word;  overflow: auto;  
   white-space: pre-wrap;  " class="mt-5" align="justify"><?php echo $row['side']; ?></pre>
            </div>

            <div class="col-md-9 border"><br><br>
                <img src="https://ddi-dev.com/uploads/developer-responsebilities.png" alt="" width="500" class="d-none d-xl-block">
                <img src="https://ddi-dev.com/uploads/developer-responsebilities.png" alt="" width="360" class="d-xl-none d-block"> 
                <pre class="mt-5" align="justify" style="font-size:23px; font-family:arial; word-wrap: break-word;  overflow: auto;  
   white-space: pre-wrap;  "> <?php echo $row['main']; ?></pre>
            </div>

            <div class="col-md-12 border">
                <pre class="mt-5" align="justify" style="font-size:20px;  font-family:arial; word-wrap: break-word;  overflow: auto;  
   white-space: pre-wrap;"  class="mt-5" align="justify"> <?php echo $row['fut']; ?></pre>
            </div>
            <?php
        }
        ?>
    </div>
</div>

                </div>
              
            </div><br>
    
           
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