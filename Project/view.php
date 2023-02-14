<?php
include 'Admin/conn.php';
if(isset($_POST['submit'])){
    $name=$_POST['uname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
  $error=array();
//   $u="select catname from `category_list` where catname='$name'";
//   $uu=mysqli_query($mm,$u);
//   if(empty($name)){
//     $error['u'] = "Category Name Requires";
//   }
//   else if(mysqli_num_rows($uu) > 0){
//     $error['u'] = "Category Name Exist";
//   }
//   if(empty($uname)){
//     $error['d'] = "username Requires";
//   }
$u="select sname from `seller` where sname='$name'";
   $uu=mysqli_query($mm,$u);
   if(empty($name)){
    //  $error['u'] = "Category Name Requires";
     echo"
     <script>
     alert('Name Requires');
     window.location.href='index.php';
     </script>
     ";
  }
  else if(mysqli_num_rows($uu) > 0){
    // $error['u'] = "Category Name Exist";
    echo"
    <script>
    alert('Name already taken sign up again');
    window.location.href='index.php';
    </script>
    ";
  }
  $e="select email from `seller` where email='$email'";
   $ee=mysqli_query($mm,$e);
   if(empty($email)){
    //  $error['u'] = "Category Name Requires";
     echo"
     <script>
     alert('Email Requires');
     window.location.href='index.php';
     </script>
     ";
  }
  else if(mysqli_num_rows($ee) > 0){
    // $error['u'] = "Category Name Exist";
    echo"
    <script>
    alert('Email already taken sign up again');
    window.location.href='index.php';
    </script>
    ";
  }
  if(empty($address)){
        //  $error['d'] = "username Requires";
        echo"
     <script>
     alert('Address Requires');
     window.location.href='index.php';
     </script>
     ";
       }
  $p="select phone from `seller` where phone='$phone'";
   $pp=mysqli_query($mm,$p);
   if(empty($phone)){
    //  $error['u'] = "Category Name Requires";
     echo"
     <script>
     alert('Mobile no  Requires');
     window.location.href='index.php';
     </script>
     ";
  }
  else if(mysqli_num_rows($pp) > 0){
    // $error['u'] = "Category Name Exist";
    echo"
    <script>
    alert('Mobile no already exist sign up again');
    window.location.href='index.php';
    </script>
    ";
  }
  if(count($error)==0){
    $sql="insert into `seller`(sname,email,address,phone) values ('$name','$email','$address','$phone')";
    $res=mysqli_query($mm,$sql);
    if($res){
      echo"
      <script>
      alert('Register Successfully');
      </script>
      ";
      }
      
      else{
      
          echo"
          <script>
          alert('Not Register');
          window.location.href='index.php';
          </script>
          ";
          
      
      }
  }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Libaries StyleSheets -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <meta charset="utf-8">
    <title>Car buy and sell Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
<!-- slider  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <!-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    /* product page css */
     /* Full-width input fields */
input[type=email],input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #F77D0A;
  color: white;
  padding:2px;
  border: none;
  cursor: pointer;
  width: 70px;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 500px; /* Full width */
  height: 500px; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
  margin-left:400px;
  margin-top:88px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
    .srch{
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
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;

}
.container {
    margin: 20px auto;
    max-width: 1000px;
    background-color: white;
    padding: 0;
}


.form-control {
    height: 25px;
    width: 150px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
    font-size: 14px;
}

.form-control:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.form-control2 {
    font-size: 14px;
    height: 20px;
    width: 55px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
}

.form-control2:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.form-control3 {
    font-size: 14px;
    height: 20px;
    width: 30px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
}

.form-control3:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

p {
    margin: 0;
}

img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.text-muted {
    font-size: 10px;
}

.textmuted {
    color: #6c757d;
    font-size: 13px;
}

.fs-14 {
    font-size: 14px;
}

.btn.btn-primary {
    width: 100%;
    height: 55px;
    border-radius: 0;
    padding: 13px 0;
    background-color: black;
    border: none;
    font-weight: 600;
}

.btn.btn-primary:hover .fas {
    transform: translateX(10px);
    transition: transform 0.5s ease
}


.fw-900 {
    font-weight: 900;
}

::placeholder {
    font-size: 12px;
}

.ps-30 {
    padding-left: 30px;
}

.h4 {
    font-family: 'Work Sans', sans-serif !important;
    font-weight: 800 !important;
}

.textmuted,
h5,
.text-muted {
    font-family: 'Poppins', sans-serif;
}
    
    
    

</style>
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
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="Brands.php" class="nav-item nav-link">Brands</a>
                        <a href="Models.php" class="nav-item nav-link">Models</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">categories</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <?php
    $sql="select * from `category_list`";
    $res=mysqli_query($mm,$sql);
  
      while($row=mysqli_fetch_assoc($res)){
         $id=$row['id'];
        $name=$row['catname'];
        echo '
                                <a href="category.php?catid='.$id.' " class="dropdown-item">'.$name.'</a>
                             ';
      } ?>   
                            </div>
                        </div>
                       
                        
                        <!-- <a href="Abouts.html" class="nav-item nav-link">About</a> -->
                        <!-- <a href="login.php" class="nav-item nav-link">Login</a> -->
                        
<button onclick="document.getElementById('id01').style.display='block'" style=" margin: 27px;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate"  method="post">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form  method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group first_box">
            <input type="email" id="email" class="form-control" placeholder="Email" required="required">
			<span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group first_box">
            <button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button>
        </div>
        <div class="form-group second_box">
            <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
			<span id="otp_error" class="field_error"></span>
        </div>
        <div class="form-group second_box">
            <button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
        </div>       
    </form>
</div>
<script>
function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send_otp.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			if(result=='yes'){
				jQuery('.second_box').show();
				jQuery('.first_box').hide();
			}
			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}
		}
	});
}

function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='seller/sellerDashborad.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script>
<style>
.second_box{display:none;}
.field_error{color:red;}
</style>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<button onclick="document.getElementById('id02').style.display='block'" style=" margin: 27px;">Register</button>
<div id="id02" class="modal">
  
  <form class="modal-content animate"  method="post">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form  method="post">
        <h2 class="text-center">Sign Up</h2>       
        <div class="container">
      <label for="uname"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="uname"required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email"  required>
      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="address"  required>
      <label for="phone"><b>Mobile no</b></label>
      <input style="width:360px; height: 45px;" type="number" placeholder="Enter Mobile no" name="phone"  required>
      <br> <br>
      <button type="submit" name="submit">Register</button>
</form>
</form>
                    </div>
</div>
                    </div>
                </div>
            </nav>
        </div>
        
    </div>
    <!-- Navbar End -->

    
</body>

&nbsp;
&nbsp;
&nbsp;
&nbsp;
<?php
if(isset($_GET['viewid'])){
 $id=$_GET['viewid'];
 
 $sql="select c.id,c.name,c.image,c.image2,c.image3,c.price,c.millage,c.color,c.city,c.description,c.seller_phone,c.seller_address,c.year,c.engine_no,c.registered,b.bname,cat.catname,s.sname,m.mname from car_list c INNER JOIN brand_list b ON c.brand_id=b.id INNER JOIN category_list cat ON c.category_id=cat.id INNER JOIN seller s ON c.seller_id=s.id INNER JOIN model_list m ON c.model_id=m.id WHERE c.id=$id";
 
 $res=mysqli_query($mm,$sql);
     $row=mysqli_fetch_assoc($res);
       $name=$row['name'];
       $image=$row['image'];
       $image2=$row['image2'];
       $image3=$row['image3'];
       $cat=$row['catname'];
       $b=$row['bname'];
       $m=$row['mname'];
       $y=$row['year'];
       $clr=$row['color'];
       $r=$row['registered'];
       $mil=$row['millage'];
       $p=$row['price'];
       $e=$row['engine_no'];
       $des=$row['description'];
       $ph=$row['seller_phone'];
       $add=$row['seller_address'];
       $cit=$row['city'];
       $s=$row['sname'];

//        echo '

// <h4 style="margin-left: 400px;">
//     '.$name.'
// </h4>
    echo'
    
<div class="container">
<div class="row m-0">
    <div class="col-lg-7 pb-5 pe-lg-5">
        <div class="row">
    <div class="col-12 p-5">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="seller/'.$image.' " class="d-block w-100" alt="Image">
                          </div>
                          <div class="carousel-item">
                            <img src="seller/'.$image2.' " class="d-block w-100" alt="Image">
                          </div>
                          <div class="carousel-item">
                            <img src="seller/'.$image3.' " class="d-block w-100" alt="Image">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>

    <!-- Carousel End -->

    <div class="row m-0 bg-light">
                    <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                        <p class="text-muted">Mileage</p>
                        <p class="h5">'.$mil.'<span class="ps-1">Km</span></p>
                    </div>
                    <div class="col-md-4 col-6  ps-30 my-4">
                        <p class="text-muted">Color</p>
                        <p style="text-transform:uppercase;" class="h5 m-0">'.$clr.'</p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Register</p>
                        <p style="text-transform:uppercase;" class="h5 m-0">'.$r.'</p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Category</p>
                        <p style="text-transform:uppercase;" class="h5 m-0">'.$cat.'</p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Brand</p>
                        <p  style="text-transform:uppercase;"class="h5 m-0">'.$b.'</p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Model</p>
                        <p style="text-transform:uppercase;" class="h5 m-0">'.$m.'</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 p-0 ps-lg-4">
            <div class="row m-0">
                <div class="col-12 px-4">
                    <div class="d-flex align-items-end mt-4 mb-2">
                        <p class="h4 m-0"><span class="pe-1">'.$name.'</span>
                
                
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="textmuted">Price</p>
                        <p class="fs-14 fw-bold">PKR: '.$p.'</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="textmuted">Year</p>
                        <p class="fs-14 fw-bold"><span class="">'.$y.'</span></p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="textmuted">Engine</p>
                        <p class="fs-14 fw-bold">'.$e.' </p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="textmuted">City</p>
                        <p style="text-transform:uppercase;" class="fs-14 fw-bold"><span class="">'.$cit.'</span></p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                    <details>
                    <summary>Description</summary>
                        <p class="textmuted fw-bold">'.$des.'</p>
                    </details>
                    </div>
                </div>
                <div class="col-12 px-0">
                    <div class="row bg-light m-0">
                        <div class="col-12 px-4 my-4">
                            <p class="fw-bold">Seller detail</p>
                        </div>
                        <div class="col-12 px-4">
                            <div class="d-flex  mb-4">
                                <span class="">
                                    <p class="text-muted">Contact number</p>
                    
                                        <label for="css">'.$ph.'</label>
                                </span>
                                <div class=" w-100 d-flex flex-column align-items-end">
                                    <p class="text-muted">Seller name</p>
                                    <label for="css" style="text-transform:uppercase;">'.$s.'</label>
                                </div>
                            </div>
                            <div class="d-flex mb-5">
                                <span class="me-5">
                                    <p class="text-muted">Seller address</p>
                                    <label for="css" style="text-transform:uppercase;">'.$add.'</label>
                                </span>
                            
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
                    ';}?>

      
     

              
    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>