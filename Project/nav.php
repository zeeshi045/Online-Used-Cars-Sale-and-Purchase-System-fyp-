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
     alert('UserName Requires');
     window.location.href='index.php';
     </script>
     ";
  }
  else if(mysqli_num_rows($uu) > 0){
    // $error['u'] = "Category Name Exist";
    echo"
    <script>
    alert('UserName already taken sign up again');
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
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo"
    <script>
    alert('Invaild Email format');
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
    <head>
        <style>
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
</style>
</head>
    <style>
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
                    <a class="text-body px-3" href="https://web.facebook.com/profile.php?id=100028569801463">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="https://twitter.com/">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="https://www.linkedin.com/in/ali-haider-77a742207/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="https://www.instagram.com/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="https://www.youtube.com/">
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
      <label for="uname"><b>UserName</b></label>
      <input type="text" placeholder="Enter UserName" name="uname"required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email"  required>
      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="address"  required>
      <label for="phone"><b>Mobile no</b></label>
      <input style="width:360px; height: 45px;" type="tel" placeholder="03498776860" name="phone"  required  pattern="[0-9]{11}" maxlength="11">
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