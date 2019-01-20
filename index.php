<?php

  include('session.php');

?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Media Schroeff VT18</title>


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Media Streamer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/pages/browse.php">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="upload.php">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="logout.php">Log Out</a>
		</li>



            </ul>
        </div>
    </div>
</nav>


<header class="bg-primary text-white">
    <div class="container text-center">
        <h1>Media Streamer Schroeff</h1>
        <p class="lead">A CSI Project for the company Cyse</p>
    </div>
</header>



<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2></h2>
                <p class="lead">Welcome on this website where users can upload their content and watch it on the same website by navigating to the browse page or by navigating to their unique url.</p>
                <ul>
                    <li>Only .mp4 extension allowed at the time.</li>
                    <li>Thumbnails are created on the 7th second on every video.</li>
                    <li>Users need a account to use this website.</li>
                    <li>No content allowed that is forbidden by EU law.</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Team VT18 </p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>

</html>
