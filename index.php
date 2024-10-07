<?php 

//


include('databasec.php'); 

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Loading Page with Enter Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        /* Basic styles for the body and the loading screen */
        body {
            background-image: url("https://png.pngtree.com/background/20231222/original/pngtree-3d-illustration-of-a-backpack-wearing-college-student-picture-image_6932624.jpg");
            background-size: cover;
            background-attachment: fixed;
            overflow-x: hidden;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #000000;
        }

        .loading-screen {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
            background-image: url("https://static.wixstatic.com/media/bc476e_e77237791b4d419f961d5373de51106d~mv2.gif");
            background-size: cover;
            color: white;
            flex-direction: column;
            transition: opacity 1s;
        }

        .loading-screen.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .enter-button {
            margin-top: -50px;
            padding: 0px 20px;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .enter-button:hover {
            background-color: #1c86ee;
        }

        .main-content {
            display: none;
            text-align: center;
            width: 100%;
            padding: 0px;
            color: white;

            padding-top: 0px;
        }

        .main-content.visible {
            display: block;
        }

       


        .zoomIn {
            -webkit-animation-name: zoomIn;
            animation-name: zoomIn;
            -webkit-animation-duration: 3s;
            animation-duration: 3s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @-webkit-keyframes zoomIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(.3, .3, .3);
                transform: scale3d(.3, .3, .3);
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(.3, .3, .3);
                transform: scale3d(.3, .3, .3);
            }

            50% {
                opacity: 1;
            }
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            margin-top:-300px;
            padding: 20px 0;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 250px;
        }

        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #f0a500;
        }

        .footer-section p,
        .footer-section a {
            font-size: 14px;
            color: #ddd;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .footer-section a:hover {
            color: #f0a500;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .social-icon {
            margin: 0 10px;
            font-size: 16px;
            color: #ddd;
            text-decoration: none;
        }

        .social-icon:hover {
            color: #f0a500;
        }

        .footer-bottom {
            background-color: #222;
            padding: 10px 0;
            margin-top: 20px;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 14px;
            color: #bbb;
        }
        @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");

svg {
	font-family: "Russo One", sans-serif;
	width: 1400px; height: 100%;
}
svg text {
	animation: stroke 5s infinite alternate;
	stroke-width: 2;
	stroke: #FFFFFF;
	font-size: 120px;
    font-weight:600;
}
@keyframes stroke {
	0%   {
		fill: rgba(41,79,117,0); stroke: rgba(255,255,255,1);
		stroke-dashoffset: 25%; stroke-dasharray: 0 50%; stroke-width: 2;
	}
	70%  {fill: rgba(41,79,117,0); stroke: rgba(255,255,255,1); }
	80%  {fill: rgba(41,79,117,0); stroke: rgba(255,255,255,1); stroke-width: 3; }
	100% {
		fill: rgba(41,79,117,1); stroke: rgba(255,255,255,0);
		stroke-dashoffset: -25%; stroke-dasharray: 50% 0; stroke-width: 0;
	}
}



.wrapper {background-color:transparent
            width:100%;

};

        
    </style>
</head>

<body>
    <audio src="noti.wav" autoplay></audio>
    <nav class="navbar navbar-expand-lg text-dark" data-bs-theme="dark" >
        <div class="container-fluid">
            <img src="favicon.png" width="60" alt="" style="border-radius:0px;"><b>DARUL CODING</b>
            <button class="navbar-toggler  text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="width:80px;">
                <span class="navbar-toggler-icon"></span><h1 style="margin-top:-20px;">=</h1>
            </button>
            <div class="collapse navbar-collapse bg-light" id="navbarColor02">
                <ul class="navbar-nav me-auto mx-5" style="margin-left:0px;">
                    <li class="nav-item">
                        <a class="nav-link active mx-" href="loading.php" style="margin-left:200px" id="bor">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown text-dark">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" id="bor">About Us</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#about">About us</a>
                            <a class="dropdown-item" href="#mis">Our mission</a>
                            <a class="dropdown-item" href="#vis">Our vision</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" id="bor">Administration</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#teach">Teaching staff</a>
                            <a class="dropdown-item" href="#">None Teaching staff</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="#card" id="bor">Our Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php" id="bor">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"></a>
                    </li>
                  
            </div>
        </div>
    </nav>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">

    <div class="wrapper">
	<svg>
		<text x="50%" y="50%" dy=".35em" text-anchor="middle">
			Darul Coding
		</text>
	</svg>
</div>
        <div style="height: 20vh; width: 400px;">
            <img src="" width="300" alt="" style="border-radius: 100px; margin-left: 50px;" >
        </div>
        <button class="enter-button" id="enterButton">Enter</button>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">


    <div class="container-fluid text-light d-none d-xl-block">
      <div class="row text-center">
        <div class="col-12 col-xl-12 " id="box1" style="height:100vh; width:100%; margin-top:-620px;">
           
          <h1 class="focus-in-expand" style="margin-top: 100px; font-size: 55px">
             <b style="color: rgb(255, 136, 0);"> Darul Coding Experts</b> 
          </h1>
          <p class="focus-in-expand mt-5" style="font-size: 30px; color:white;" align=" ">
           Darul-Coding is the most trusted and friedly <br>plateform to learn coding and more cousres
          </p><br><br>
         <a href="mainpage.php"> <button class="enter-button" id="enterButton">Enter</button></a>
        </div>
      </div>
    </div>

    <div class="container-fluid text-light d-xl-none d-block">
      <div class="row text-center">
        <div class="col-12 col-xl-12 " id="box1" style="height:100vh; width:100%; margin-top:-920px;">
           <div style="width:100%; height:40vh;">
          <h1 class="focus-in-expand" style="margin-top: 100px; font-size: 55px">
             <b style="color: rgb(255, 136, 0);"> Darul Coding Experts</b> 
          </h1>
          <p class="focus-in-expand mt-5" style="font-size: 30px; color:white;" align=" ">
           Darul-Coding is the most trusted and friedly <br>plateform to learn coding and more cousres
          </p> </div><br><br>
          <a href="lon in.php"> <button id="btn" class="m-3">Log In</button></a>
          <a href="singup.php"> <button id="btn">Sing Up</button></a>
        </div>
      </div>
    </div>
    
    
    </div>

    



    <script>
        // JavaScript to handle the "Enter" button click
        document
            .getElementById("enterButton")
            .addEventListener("click", function () {
                // Hide the loading screen
                const loadingScreen = document.getElementById("loadingScreen");
                loadingScreen.classList.add("hidden");

                // Show the main content after the transition
                setTimeout(() => {
                    const mainContent = document.getElementById("mainContent");
                    mainContent.classList.add("visible");
                }, 1000); // The timeout should match the CSS transition duration
            });

        // Get the modal
        const modal = document.getElementById('signupModal');
        // Get the button that opens the modal
        const openModalBtn = document.getElementById('openModalBtn');
        // Get the <span> element that closes the modal
        const closeModalBtn = document.getElementById('closeModalBtn');
        // Get the form
        const signupForm = document.getElementById('signupForm');
        // Get the form message div
        const formMessage = document.getElementById('formMessage');

        // When the user clicks the button, open the modal
        openModalBtn.onclick = function () {
            modal.style.display = 'block';
        }

        // When the user clicks on <span> (x), close the modal
        closeModalBtn.onclick = function () {
            modal.style.display = 'none';
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Handle form submission
        signupForm.onsubmit = function (event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Display form data in a message
            formMessage.innerHTML = `
                <h3>Thank you for signing up, ${name}!</h3>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Password:</strong> ${password}</p>
            `;

            // Optionally, clear the form fields after submission
            signupForm.reset();
        }
    </script>
</body>

</html>