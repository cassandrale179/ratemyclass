<?php
session_start();
if (isset($_SESSION['logged_in'])){
  if($_SESSION['logged_in'] == 1){
    header('location: phpfile/dashboard.php');
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <title>RateMyClass</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!--Link to chartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>

    <!--Import Font for chartJs-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="phpfile/register.php">
                    <i class="fa fa-search"></i> Search
                </a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="phpfile/login.php">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll border" href="phpfile/register.php">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading typewriter" style="font-size: 70px">Ratemyclass</h1>
                        <p class="intro-text" style="color: #979A9A"> Want to boost your GPA by finding an easy class to take?
                            Created by Drexel student for Drexel students, RateMyClass got you covered!</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ______________________________About Section  ______________________________ -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About RateMyClass</h2>
                <div id="flex-display">
                  <div id="A1">
                    <p>Wonder if MATH 221 will be hard? How many students will pass? No need to worry. </p>
                    <p> RateMyClass allows Drexel students to anonymously submit class scores. Using algorithm and data parsing, RateMyClass will automatically calculate average of a class, passing rate and label class as easy, medium or hard.</p>
                  </div>
                  <div id="A2"></div>
                  <div id="A3">
                    <h3> ENGL 103</h3>
                    <canvas id="canvas2" width="400" height="400"></canvas>
                    <div id="A4">
                      <p id="A4header">Easy</p>
                      <p id="A4p">
                        Average: <b> 3.36/4.00 </b> <br>
                        Most students receive <b>A </b><br>
                        Passing rate: <b>92% </b><br>
                        Sample Size: <b>100 users</b>
                      </p>
                    </div>
                    <br><br>
                    <p style="font-size: 12px"><i><b>Disclaimers:</b> this pie chart data are not real and for demonstrative purpose only</i></p>
                  </div>
              </div>
            </div>
        </div>
    </section>

    <!-- ______________________________Sample Section ______________________________ -->
    <section id="register" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>See a Sample Page</h2>
                    <p>You can see a sample page of a class here!</p>
                    <a href="terms/samplepage.html" class="btn btn-default btn-lg">See Sample</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ______________________________Sorting Section  ______________________________ -->
    <section id="sorting" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Sort Class by Major</h2>
                <div id="flex-display2">
                  <div id="A5">
                    <h3> Easy to Difficult </h3>
                    <button style='border-left: 50px solid #117864'><b>BIO 116</b> (Average: 3.70) </button>
                    <button style='border-left: 50px solid #117864'><b>BIO 107</b> (Average: 3.60) </button>
                    <button style='border-left: 50px solid #117864'><b>BIO 109</b> (Average: 3.55) </button>
                    <button style='border-left: 50px solid #F4D03F'><b>BIO 124</b> (Average: 3.30) </button>
                    <button style='border-left: 50px solid #922B21'><b>BIO 122</b> (Average: 2.90) </button>

                  </div>
                  <div id="A6"></div>
                  <div id="A7">
                    <p>Don't like biology but have to take a bio elective next term? </p>
                    <p>With RateMyClass sorting function, you can now see which are the easiest biology classes to take base on average score. And not just biology, you can choose whatever majors you want to find classes from easy to hard.</p>
                  </div>
              </div>
            </div>
        </div>
    </section>


    <!-- ______________________________Registration Section______________________________ -->
    <section id="register" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Register Here!</h2>
                    <p>What are you waiting for? Sign up and access test scores for free!</p>
                    <a href="phpfile/register.php" class="btn btn-default btn-lg">Register</a>
                </div>
            </div>
        </div>
    </section>


    <!-- ______________________________Contact Section______________________________ -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>Contact RateMyClass</h2>
                <p>Feel free to email us to if you have any questions or suggestions. </p>


                <p> Contact: <a href="mailto:mnl98x@gmail.com">mnl98x@gmail.com</a>
                </p>

                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="#" class="btn btn-default btn-lg"> <span class="network-name">Terms </span></a>
                    </li>
                    <li>
                        <a href="terms/privacy.html" class="btn btn-default btn-lg"> <span class="network-name">Privacy Policy</span></a>
                    </li>
                </ul>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p> Open source project on <a href="https://github.com/cassandrale179/ratemyclass/blob/master/README.md">GitHub.</p></a>
            Copyright &copy; RateMyClass 2017 | All rights reserved. <a href="#"></a> <a href="#"></a>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

</body>

</html>


<script>
// ----------------------------collapseNavBar
function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".navbar-fixed-top").addClass("whitefont");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

// ----------------------------jQuery for page scrolling feature
//----------------------------requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $(".navbar-collapse").collapse('hide');
});



//----------------------------this part is for chartJS stuff-------------------
Chart.defaults.global.defaultFontFamily = "Roboto Condensed";
Chart.defaults.global.defaultFontSize = 16;
Chart.defaults.global.defaultFontColor = '#FFFFFF';

var dough = $("#canvas2");
var dooptions = {
  maintainAspectRatio: false,
    responsive: false,
    animateScale: true,
    cutoutPercentage: 70
}

var dodata = {
    labels: [
        "60% of users receive A",
        "20% of users receive B",
        "15% of users receive C ",
        " 3% of users receive D",
        "2% of users receive F"
    ],
    datasets: [
        {
          data: [60,20,15,3,2],
           backgroundColor: [
        "#117864",
        "#48C9B0",
        "#A3E4D7",
        "#D1F2EB",
            "#E5E8E8"
        ],
           hoverBackgroundColor: [
            "#0E6655",
            "#1ABC9C",
            "#76D7C4",
            "#A3E4D7",
            "#E5E7E9"
        ]
        }]
};

var myDoughnut = new Chart(dough, {
  type: "doughnut",
  data: dodata,
  options: dooptions
});
</script>
