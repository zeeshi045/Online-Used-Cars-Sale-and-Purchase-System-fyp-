<?php
include '../Admin/conn.php';
session_start();
if(isset($_SESSION['IS_LOGIN'])){
  $userId=$_SESSION['id'];
  $name=$_SESSION['sname'];

}else{
	header('location:../index.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsiive Seller Dashboard</title>
    <link rel="stylesheet" href="../Admin/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  <style>
    
.footer-basic {
  padding:40px 0;
  background-color:#ffffff;
  color:#4b4c4d;
  margin-top: 200px;
}

.footer-basic ul {
  padding:0;
  list-style:none;
  text-align:center;
  font-size:18px;
  line-height:1.6;
  margin-bottom:0;
}

.footer-basic li {
  padding:0 10px;
}

.footer-basic ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-basic ul a:hover {
  opacity:1;
}

.footer-basic .social {
  text-align:center;
  padding-bottom:25px;
}

.footer-basic .social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin:0 8px;
  color:inherit;
  opacity:0.75;
}

.footer-basic .social > a:hover {
  opacity:0.9;
}

.footer-basic .copyright {
  margin-top:15px;
  text-align:center;
  font-size:13px;
  color:#aaa;
  margin-bottom:0;
}

  </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Cars Sale System</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="sellerDashborad.php" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <!-- <li>
              <a href="#">
                <i class='bx bx-box' ></i>
                <span class="links_name">Product</span>
              </a>
            </li> -->
            <li>
              <a href="car list.php">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Car list</span>
              </a>
            </li>
           
            
            <li>
              <a href="account.php">
                <i class='bx bx-user' ></i>
                <span class="links_name"></span>
                <span class="links_name">Manage Account</span>
              </a>
            </li>
           
            <!-- <li>
              <a href="#">
                <i class='bx bx-heart' ></i>
                <span class="links_name">Favrorites</span>
              </a>
            </li> -->
           
            <li class="log_out">
              <a href="logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
              </a>
            </li>
          </ul>
      </div>
      <section class="home-section">
        <nav>
          <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
          </div>
        
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Hi    <?php echo $_SESSION['sname']; ?></span>
            
          </div>
        </nav>
    
        <div class="home-content">
          
          
          
          
        <p style="text-align: center; color: #0A2558; font-size: 3vw; border-bottom: 1px solid black; ">Welcome To Online Used Cars Sale and Purchase System</p>
          <div class="overview-boxes">
            
                      <?php
          
    $sql="select id from `car_list` where seller_id=$userId";
    $res=mysqli_query($mm,$sql);
    $row=mysqli_num_rows($res);
     
echo '
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Listed Cars</div>
                <div class="number">'.$row.'</div>  
              ';  ?>
                <div class="indicator">
                  <!-- <i class='bx bx-up-arrow-alt'></i> -->
                  <!-- <span class="text">Up from yesterday</span> -->
                </div>
              </div>
              <i class='bx bx-cart cart three' ></i>
            </div>
            
            </div>
          </div>
         <?php
include 'footer.php';

?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    
    
      <script>
       let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
     </script>
</body>
</html>