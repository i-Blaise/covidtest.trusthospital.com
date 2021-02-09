<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- <script src="JavaScript/jquery-1.6.1.min.js" type="text/javascript"></script> -->
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/icons/Trust-hspital-logo.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>The Trust Hospital || Covid Testing Portal</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <!-- Notification -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<link href="assets/notification/toastr.css" rel="stylesheet"/>
<link href="assets/notification/toastr.min.css" rel="stylesheet"/>


<?php
    if(isset($_GET['status']) && $_GET['status'] == "saved")
    {
        ?>
        <!-- Notification -->
     <script type='text/javascript'>   
    $(document).ready(function() {      
    toastr.options.positionClass = "toast-top-right";
    toastr.options.closeButton = true;
    toastr.options.closeDuration = 300;
    toastr.success('Your Covid Test has been booked!', 'Success');
});
</script>
     
       <?php
    }
       ?>
</head>

<body>

    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <img src="assets/img/icons/Trust-hspital-logo.png" alt="logo" width="220" height="100" style="top: 70px;">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <li>
                        <a href="#">Covid Testing Portal</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt"></i> Share
                        </a>
                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <!-- <a href="#" class="btn btn-danger btn-fill">Free Download</a> -->
                        <a href="#">FAQ</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>


    <div class="section section-header">
        <div class="parallax filter filter-color-black">
            <div class="image"
                style="background-image: url('assets/img/covid-bg.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <p>Covid Testing Portal</p>
                        <h1 class="title-modern">The Trust Hospital</h1>
                        <h3>Making Testing easier than ever!</h2>
                        <div class="separator line-separator">♦</div>
                    </div>

                    <div class="button-get-started">
                        <a href="#process" class="btn btn-white btn-fill btn-lg ">
                            Read More
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="section section-the-process" id="process">
        <div class="container">
            <div class="title-area">
                <h2>The Process</h2>
                <div class="separator separator-danger">∎</div>
            </div>

            <ul class="nav nav-text" role="tablist">
                <li class="active">
                    <a href="#process1" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/1.png"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#process2" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/2.png"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#process3" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/3.png"/>
                        </div>
                    </a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="process1">
                    <h3 class="subtitle text-gray">Book A Covid Test</h3>
                    <div class="image-clients process-img">
                        <img alt="..." class="img-rounded" src="assets/img/appointment.png"/>
                    </div>
                    <p class="description">
                        And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color... Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all!
                    </p>
                </div>
                <div class="tab-pane" id="process2">
                    <h3 class="subtitle text-gray">Make Payment</h3>
                    <div class="image-clients process-img">
                        <img alt="..." class="img-rounded" src="assets/img/payment-method.png"/>
                    </div>
                    <p class="description">Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all! And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color...
                    </p>
                </div>
                <div class="tab-pane" id="process3">
                    <h3 class="subtitle text-gray">Check Covid Test Status</h3>
                    <div class="image-clients process-img">
                        <img alt="..." class="img-rounded" src="assets/img/covid-test.png"/>
                    </div>
                    <p class="description"> I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. The 'Gaia' team did a great work while we were collaborating. They provided a vision that was in deep connection with our needs and helped us achieve our goals.
                    </p>
                </div>

            </div>

           <div class="process-get-started-btn">
                <a href="#" class="btn btn-danger btn-fill">Get Started</a>
            </div>

        </div>
    </div>


    <!-- <div class="section">
        <div class="container">
            <div class="row">
                <div class="title-area">
                    <h2>Our Services</h2>
                    <div class="separator separator-danger">✻</div>
                    <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Sales</h3>
                        <p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <h3>Content</h3>
                        <p class="description">We create a persona regarding the multiple wardrobe accessories that we provide..</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-music"></i>
                        </div>
                        <h3>Music</h3>
                        <p class="description">We like to present the world with our work, so we make sure we spread the word regarding our clothes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="section section-our-team-freebie">
        <div class="parallax filter filter-color-black">
            <div class="image" style="background-image:url('assets/img/covid-header2.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="title-area">
                            <h2>Lorem Ipsum</h2>
                            <div class="separator separator-danger">✻</div>
                            <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.</p>
                        </div>
                    </div>

                    <div class="team">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-rounded" src="assets/img/appointment.png"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Book Test Now</h3>
                                                    <p class="small-text">Fill In your info to book now!</p>
                                                    <a href="#" class="btn btn-danger btn-fill btn-lg">Book Test</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-rounded" src="assets/img/covid-test.png"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Check Test Status</h3>
                                                    <p class="small-text">Already Tested with Us? Check the status of your test here</p>
                                                    <a href="#" class="btn btn-danger btn-fill btn-lg">Check Test Status</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-small section-get-started">
            <div class="container">
                <div class="title-area">
                    <h2>Have any questions for us?</h2>
                    <div class="separator line-separator">♦</div>
                    <p class="description"> We are keen on creating a second skin for anyone with a sense of style! We design our clothes having our customers in mind and we never disappoint!</p>
                </div>

                <div class="button-get-started">
                    <a href="#" class="btn btn-danger btn-fill btn-lg">Contact Us</a>
                </div>
            </div>
    </div>


    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4 footer-col">
                    <div class="info">
                        <h5 class="title">The Trust Hospital</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Home</a></li>
                                <li>
                                    <a href="#">More on Covid</a>
                                </li>
                                <li>
                                    <a href="#">Our Centers</a>
                                </li>
                                <li>
                                    <a href="#">Branches</a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 footer-col">
                    <div class="info">
                        <h5 class="title"> Help and Support</h5>
                         <nav>
                            <ul>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">How it works</a>
                                </li>
                                <li>
                                    <a href="#">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Company Policy</a>
                                </li>
                                <li>
                                    <a href="#">Money Back</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- <div class="col-md-3 col-sm-3">
                    <div class="info">
                        <h5 class="title">Latest News</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i> <b>Get Shit Done</b> The best kit in the market is here, just give it a try and let us...
                                        <hr class="hr-small">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i> We've just been featured on <b> Awwwards Website</b>! Thank you everybody for...
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> -->
                <div class="col-lg-4 col-sm-4 footer-col">
                    <div class="info">
                        <h5 class="title">Follow us on</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="https://web.facebook.com/The-Trust-Hospital-Company-Limited-1496485860666878?_rdc=1&_rdr" class="btn btn-social btn-facebook btn-simple">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/thetrusthosp?lang=en" class="btn btn-social btn-twitter btn-simple">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                 © <script> document.write(new Date().getFullYear()) </script> The Trust Hospital
            </div>
        </div>
    </footer>
    <script>
    $(document).ready(function() {

// show when page load
// toastr.info('Hey - it works!');
// alert('hi');

});


</script>

</body>

<!--   core js files    -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="assets/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the - Bootstrap Template   -->
<script type="text/javascript" src="assets/js/main.js"></script>

<!--   smooth scrolling jquer   -->
<script type="text/javascript" src="assets/js/smooth-scroll.js"></script>


<!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="assets/notification/toastr.js.map"></script>
<script src="assets/notification/toastr.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> -->


<script type = "text/javascript">  
function successNotif() {   
    $(document).ready(function() {
    toastr.options.positionClass = "toast-top-right";
    toastr.options.closeButton = true;
    toastr.success('Check your email', 'Success')
    //    die();
    // alert('hello');
//     window.alert = null;
// alert('test'); // fail
// delete window.alert; // true
// alert('test'); // win
//     }
});

</script>  
</html>
