<?php 
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

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
            background-image: url("https://png.pngtree.com/thumb_back/fw800/background/20231009/pngtree-3d-illustration-of-a-student-engaged-in-an-online-classroom-image_13559709.png");
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
            background-color: transparent;
        }

        .main-content.visible {
            display: block;
        }

        .navbar {
            
            height: 10vh;
          
            background-color:white;
            color:black;
        
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

        .open-btn {
            padding: 10px 10px;
            height: 40px;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            border: none;
            cursor: pointer;
            border-radius: 10px;
        }

        .open-btn:hover {
            background-color: #c7870f;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
            max-width: 500px;
            border-radius: 5px;
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #000000;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #c76d07;
        }
        b{
            font-size:25px;
        }
        .fadeInUpBig {
  -webkit-animation-name: fadeInUpBig;
  animation-name: fadeInUpBig;
  -webkit-animation-duration: 3s;
  animation-duration: 3s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  animation-timeline: view();
  animation-range: entry 10% cover 40%;
  }
  @-webkit-keyframes fadeInUpBig {
  0% {
  opacity: 0;
  -webkit-transform: translate3d(0, 2000px, 0);
  transform: translate3d(0, 2000px, 0);
  }
  100% {
  opacity: 1;
  -webkit-transform: none;
  transform: none;
  }
  }
  @keyframes fadeInUpBig {
  0% {
  opacity: 0;
  -webkit-transform: translate3d(0, 2000px, 0);
  transform: translate3d(0, 2000px, 0);
  }
  100% {
  opacity: 1;
  -webkit-transform: none;
  transform: none;
  }
  } 
    </style>
</head>

<body text="black">
    <audio src="noti.wav" autoplay></audio>
    <nav class="navbar navbar-expand-lg text-dark" data-bs-theme="dark" >
        <div class="container-fluid">
            <img src="favicon.png" width="60" alt="" style="border-radius:0px;"><b>DARUL CODING</b>
            <button class="navbar-toggler  text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="width:80px;">
                <span class="navbar-toggler-icon"></span><h1 style="margin-top:-20px;">=</h1>
            </button>
            <div class="collapse navbar-collapse bg-light " id="navbarColor02">
                <ul class="navbar-nav me-auto mx-5">
                    <li class="nav-item ">
                        <a class="nav-link active mx-" href="index.php" style="margin-left:0px" id="bor">Home
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
                    <li class="nav-item dropdown text-dark">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" id="bor">Gallary</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="img.php">Image</a>
                            <a class="dropdown-item" href="event.php">Event</a>
                           

                    </li>
                    
                    <li class="nav-item dropdown text-dark">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" id="bor">Profile</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="studentpro.php">My Profile</a>
                            <a class="dropdown-item" href="singup.php">Sing Up</a>
                            <a class="dropdown-item" href="lon in.php">Log In</a>

                    </li>
                    </ul>
                 
 
                
            </div>
        </div>
    </nav>
        <div class="container-fluid text-dark" style="margin-top:220px;" >
            <div class="row text-center">
                <div class="col-12 col-xl-12" style="height:100vh; width:100%; position :relative;">
                    <div style="height:50vh;">
                    <h1 class="focus-in-expand" style="margin-top: 0px; font-size: 55px">
                        Learn from <b style="color: orangered; font-size:55px;"> Darul Coding</b> Experts
                    </h1>
                    <p class="focus-in-expand mt-5" style="font-size: 23px; color:black;" align="">
                        Darul-Coding is the most trusted and friedly <br>plateform to learn coding and more cousres
                    </p>
                    </div>
                   <br><br>
                      <a href="addform.php"><button class="mb-5">Addmission</button>
                      </a>                           
                        
                    </div>
                </div>
            </div>
        </div>
         <div class="container-fluid" style="margin-top: -200px ;border:1px solid black;" id="box2">
            <div class="row bg-light text-center" id="box2" style="height: 100vh;">
            <h1 >ABOUT Darul Coding</h1>
                <div class="fadeInUpBig col-12 col-xl-6 d-none d-xl-block" id="about">
                    
                    <img src="https://gethppy.com/wp-content/uploads/2021/12/pexels-fox-1595391.jpg"
                        style="margin-top: 50px; border-radius: 20px; width: 500px" alt="" />
                </div>

                <div class=" col-12 col-xl-6 d-xl-none d-block" id="about">
                    
                    <img src="https://gethppy.com/wp-content/uploads/2021/12/pexels-fox-1595391.jpg"
                        style="margin-top: 50px; border-radius: 20px; width: 380px" alt="" />
                </div>
                <div class="fadeInUpBig col-12 col-xl-6 mt-5 d-none d-xl-block">
                  
                    <p align="justify"  style="color: black; margin-top:0px; font-size:25px;">
                    Welcome to Darul Coding - Your Gateway to the Digital Future
                    At Darul Coding, we are committed to empowering learners of all ages with the skills needed to thrive in the ever-evolving world of technology. Whether you are a beginner or a professional looking to enhance your expertise, our comprehensive courses in web development, data science, and AI will guide you toward success.
                        
                    </p>
                </div>


                <div class="fadeInUpBig col-12 col-xl-6 d-xl-none d-block ">
                  
                    <p align="justify"  style="color: black; margin-top:-300px; font-size:35px;">
                    Welcome to Darul Coding - Your Gateway to the Digital Future
                    At Darul Coding, we are committed to empowering learners of all ages with the skills needed to thrive in the ever-evolving world of technology. Whether you are a beginner or a professional looking to enhance your expertise, our comprehensive courses in web development, data science, and AI will guide you toward success.
                        
                    </p>
                </div>
            </div>
        </div>

        <div class="d-none d-block" style="background-color: rgb(219, 219, 219); color: black; border:1px solid black;">
           
            <marquee style="width: 1220px;">
                <pre style="">
    <h3> <a href="https://www.w3schools.com/html/default.asp">HTML | </a>  <a href="https://www.w3schools.com/css/default.asp">CSS |</a> <a href="https://www.w3schools.com/bootstrap/bootstrap_ver.asp">BOOSTRAP</a>  | <a href="https://www.w3schools.com/php/default.asp">PHP</a>  | <a href="https://www.w3schools.com/sql/default.asp">SQL</a>  | <a href="https://www.w3schools.com/java/default.asp">JAVA</a>    |<a href="https://www.w3schools.com/js/default.asp">JAVA SCRIPT </a> </h3></pre>

            </marquee>
        </div>
        <div class="container-fluid bg-light" id="card" style="border:1px solid black;">
            <div class="row bg-light text-center text-dark container zoomIn  " id="course">
                <h1 class="mt-3 text-center mx-5">Our Courses</h1>

                <div class="card  zoomIn  col-12 col-xl-4">
                    <div class="card-details">
                        <img src="https://cdn.pixabay.com/photo/2019/10/09/07/28/development-4536630_1280.png"width="220" alt="">
                        <p class="text-title">web devlopment</p>
                        <p class="text-body">
                            In our collage web dev course id avilable and teach by profesional
                            teacher
                        </p>
                    </div>
                    <a href="weblog.php">
                        <button class="card-button">Apply Now</button></a>
                </div>

                <div class="card  col-12 col-xl-4 zoomIn">
                    <div class="card-details">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/044/448/928/small/cartoon-character-with-the-desk-working-concept-illustration-free-png.png"width="220" alt="">
                        <p class="text-title">Data science</p>
                        <p class="text-body">
                            In our collage Data science course id avilable and teach by profesional
                            teacher
                        </p>
                    </div>
                    <a href="weblog1.php">
                        <button class="card-button">Apply Now</button></a>
                </div>

                <div class="card zoomIn   col-12 col-xl-4">
                    <div class="card-details">
                    <img src="https://e7.pngegg.com/pngimages/791/820/png-clipart-software-development-custom-software-computer-software-web-development-mobile-app-development-others-miscellaneous-web-design.png"width="220" alt="">
                        <p class="text-title">Digital marketing</p>
                        <p class="text-body">
                            In our collage Digital marketing course id avilable and teach by profesional
                            teacher
                        </p>
                    </div>
                    <a href="weblog2.php">
                        <button class="card-button">Apply Now</button></a>
                </div>

                <div class="card zoomIn  col-5   col-xl-4">
                    <div class="card-details">
                    <img src="https://e7.pngegg.com/pngimages/385/345/png-clipart-web-development-mobile-app-development-software-development-web-application-development-web-application-development-web-design-text.png"width="220" alt="">
                        <p class="text-title">JS React</p>
                        <p class="text-body">
                            In our collage JS React course id avilable and teach by
                            profesional teacher
                        </p>
                    </div>
                    <a href="weblog3.php">
                        <button class="card-button">Apply Now</button></a>
                </div>

                <div class="card  zoomIn   col-12 col-xl-4">
                    <div class="card-details">
                    <img src="https://p.kindpng.com/picc/s/127-1272110_web-application-transparent-hd-png-download.png"width="220" alt="">
                        <p class="text-title">front end dev</p>
                        <p class="text-body">
                            In our collage front end dev course id avilable and teach by profesional
                            teacher
                        </p>
                    </div>
                    <a href="weblog4.php"><button class="card-button">Apply Now</button></a>
                </div>

                <div class="card zoomIn  col-12 col-xl-4 mb-5">
                    <div class="card-details">
                    <img src="https://e7.pngegg.com/pngimages/262/104/png-clipart-website-development-web-design-web-application-web-developer-world-wide-web-web-design-search-engine-optimization-web-design.png"width="220" alt="">
                        <p class="text-title">Back end dev</p>
                        <p class="text-body">
                            In our collage BED course id avilable and teach by profesional
                            teacher
                        </p>
                    </div>
                    <a href="weblog5.php">
                        <button class="card-button">Apply Now</button></a>
                </div>
            </div>
        </div> 

        <div id="page1" style="   height: 100vh;
        width: 100%;
        background-color: black;
 
        text-align: center;
        justify-content: center;
        margin-top: 0px;">
            <h1 id="hed" style=" font-size: 25vw;
        color: aqua;
        padding-top: 50px;"> 
                DarulCodingLearnGreat
            </h1>
        </div>

        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <script src="java.js">
              // Register the ScrollTrigger plugin if it's not already registered
      gsap.registerPlugin(ScrollTrigger);

gsap.to("#page1 #hed", {
    x: "-200%", // Changed 'transform' to x property for better GSAP integration
    scrollTrigger: {
        trigger: "#page1",
        scroller: "body",
       
        start: "top 10%",  // Adjust start point based on your scroll position
        end: "top -100%",  // Adjust end point based on how long the animation should last
        scrub: 5,
        pin: true ,// Pin the element during the animation
    }
});
    </script>

        <div class="container-fluid bg-light text-dark" style="border:1px solid black;">
            <div class="row text-center">
                <h1 class="mt-5 mb-5" id="vis">VISION</h1>
                <div class="col-12 col-xl-6  zoomIn">

                    <p align="justify" style="font-size: 25px; margin-bottom:100px;" class="mt-5 ">At Darul Coding, we envision a world where technology education is accessible to everyone, fostering innovation and empowering individuals to shape the future. Our goal is to become a global hub for tech learning, where aspiring developers and professionals can master cutting-edge skills in coding, data science, and artificial intelligence. We aim to bridge the gap between theory and practical application, preparing our students for real-world challenges.

We believe in nurturing creativity, critical thinking, and problem-solving through a dynamic learning environment. By building a strong community of passionate learners, we strive to inspire the next generation of leaders who will drive technological advancements across industries. At Darul Coding, we are dedicated to transforming lives through education and making technology a force for positive change.</p>
                </div>

                <div class="col-12 col-xl-6 d-none d-xl-block  zoomIn">
                    <img src="https://us.123rf.com/450wm/fengdr/fengdr2309/fengdr230903786/219300706-3d-illustration-of-asian-girl-renae-leaning-on-a-pile-of-books-reading-3d-rendering-on-white.jpg?ver=6"
                        alt="">

                </div>

                <div class="col-12 col-xl-6 d-xl-none d-block   zoomIn">
                    <img src="https://us.123rf.com/450wm/fengdr/fengdr2309/fengdr230903786/219300706-3d-illustration-of-asian-girl-renae-leaning-on-a-pile-of-books-reading-3d-rendering-on-white.jpg?ver=6"
                        alt="" width="380">

                </div>
            </div>
        </div>
  <div id="page2" style="   height: 100vh;
        width: 100%;
        background-color: aqua;
 
        text-align: center;
        justify-content: center;
        margin-top: 0px;">
            <h1 id="he" style=" font-size: 22vw;
        color: black;
        padding-top: 100px;"> 
                LearnByProfessionalTeachers
            </h1>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <script src="java.js">
         gsap.registerPlugin(ScrollTrigger);

gsap.to("#page2 #he", {
    x: "-250%", // Changed 'transform' to x property for better GSAP integration
    scrollTrigger: {
        trigger: "#page2",
        scroller: "body",
       
        start: "top 10%",  // Adjust start point based on your scroll position
        end: "top -100%",  // Adjust end point based on how long the animation should last
        scrub: 5,
        pin: true ,// Pin the element during the animation
    }
}); 
</script>

        <div class="container-fluid">
            <div class="row text-center bg-light text-dark" style="border:1px solid black;">
                <h1 class="mt-5 mb-5" id="mis">MISSION</h1>
                <div class="col-12 col-xl-6 d-none d-xl-block zoomIn">
                    <img src="https://www.shutterstock.com/image-illustration/3d-illustration-student-boy-reading-600w-2362553759.jpg"
                        alt="" width="500" class="" style="border-radius:20px;">

                </div>
                <div class="col-12 col-xl-6  d-xl-none d-block zoomIn">
                    <img src="https://www.shutterstock.com/image-illustration/3d-illustration-student-boy-reading-600w-2362553759.jpg"
                        alt="" width="380" class="" style="border-radius:20px;">

                </div>

                <div class="col-12 col-xl-6 zoomIn">

                    <P align="justify" style="font-size: 22px;" class="mt-2">
Our Mission at Darul Coding
Our mission at Darul Coding is to deliver high-quality, accessible education in the fields of technology and programming. We are committed to empowering individuals from diverse backgrounds with the skills and knowledge needed to thrive in a rapidly evolving digital world. Through a combination of practical training and innovative teaching methods, we aim to bridge the skills gap and help learners unlock their full potential.

We focus on building a strong foundation in coding, software development, and emerging technologies, ensuring our students are equipped to tackle real-world challenges. Our mission is to foster a community of continuous learners who are not just consumers of technology but creators and innovators. We strive to inspire passion for lifelong learning and professional growth, while contributing to the global advancement of technology through our educational efforts. At Darul Coding, we believe that everyone has the potential to succeed, and we are here to help them achieve their goals.






</P>

                </div>
            </div>
          
                   </div>
                  
        <div class="container-fluid mb-5 mt-5" style="height: 70vh;">
            <div class="row text-light text-center">
                <h1 id="teach">Teaching Staff</h1>
                <div id="carouselExampleFade" class="carousel slide carousel-fade">


<div class="carousel-item">
                            <img src="https://domolearn.in/img/staff/shivam.jpeg" width="350" alt="..."><br>sumit sir



                        </div>



                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="kaif.png" width="350" alt="..."><br>kaif ali khan

                        </div>
                        
                        <div class="carousel-item">
                            <img src="https://domolearn.in/img/staff/asif_md.jpeg" width="350" height="350"
                                alt="..."><br>Asif sir
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev" style="margin-top: 150px; width: 50px;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next" style="margin-top: 150px; width: 50px;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <br><br>

       <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12 col-xl-12"> 
            <a href="teach.php"><button style="">Teaching staff</button></a>
            </div>
        </div>

       </div>
<br><br>
        <!-- Footer -->
        <footer>
            <div class="footer-container">
                <!-- Company Information Section -->
                <div class="footer-section">
                    <h3>Darul-Coding</h3>
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



    </div>
</body>

</html>