<?php
session_start();
include 'Admin/conn.php';
// initializing variables
$username = "";
$errors = array(); 
if (isset($_POST['submit'])) {
$username = mysqli_real_escape_string($mm, $_POST['name']);
    $password = mysqli_real_escape_string($mm, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $query = "SELECT * FROM seller WHERE sname='$username' AND password='$password'";
        $results = mysqli_query($mm, $query);
        $num = mysqli_num_rows($results);
        if ($num == 1){
          $row=mysqli_fetch_assoc($results);
          $userId = $row['id'];
          $_SESSION['loggedin'] = true;
          $_SESSION['name'] = $username;
          $_SESSION['userId'] = $userId;
            header("location: seller/sellerDashborad.php?loginsuccess=true");
            exit();
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car buy and sell Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>.srch{
        font-family: sans-serif;
        background: transparent;
        width: 176px;
        height: 45px;
        border: 1px solid black;
       border-right: none;
        margin-top: 1px;
        margin-left: 780px;
        color: black;
        padding: 10px;
        
        float: left ;
        font-size: 16px;
    }
    .sign{
        width: 280px;
        height: 380px;
        margin: auto;
        margin-top: 120px;
        background-color:black;
        border-radius: 3px;
        
    }
    input[type="button"]{
        background-color: orange;
        color: white;
        font-size: 15px;
        width: 200px;
        border: none;
        cursor: pointer;
        
        
    }
    input{
        padding: 10px;
        width:200px;
        margin-left: 40px;
        margin-top: -8px;
    
        
    }
    h3{
        margin-top: -2px;
        margin-bottom: 20px;
        padding-top: 15px;
        color: white;
        text-align: center;
        font-size: 30px;
    
    }</style>
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>03498776860</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>Zesshi00@gmail.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Used car buy & sell</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link ">Home</a>
                        <a href="Brands.html" class="nav-item nav-link">Brands</a>
                        <a href="Models.html" class="nav-item nav-link">Models</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">categories</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="old car .html" class="dropdown-item">Old car</a>
                                <a href="small car.html" class="dropdown-item">Small car</a>
                                <a href="Family car.html" class="dropdown-item">Family car</a>
                            </div>
                        </div>
                        
                        <a href="Abouts.html" class="nav-item nav-link">About</a>
                        <a href="login.html" class="nav-item nav-link active">Login</a>
                        <a href="register.html" class="nav-item nav-link">Register</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="sign">
        <h3>Sign in</h3>
    <form method="post" >
        <input type="text" name="name" placeholder="UserName:"><br><br>
        <input type="password" name="password" placeholder="Password:"><br><br>
        <button name="submit" class="w-100 bg-primary fs-4 text-white border-none">Login</button>

        
    </form>
    </div>
    


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Sharqi Colony,Vehari,Pakistan</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>03498776860</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>Zeeshi00@gmail.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Home</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Brands</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Models</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Category</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Online used car sale and purchase system</a>. All Rights Reserved.</p>
		
							
        <p class="m-0 text-center text-body">Designed by <a href="#">M Zeeshan Farooq & Ali Haider</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>