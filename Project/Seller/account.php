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
<?php
if(isset($_POST['submit'])){
  $userId=$_SESSION['id'];
  $name=$_POST['sname'];
  $email=$_POST['email'];
  $add=$_POST['address'];
  $city=$_POST['city'];
  $phone=$_POST['phone'];
  $gen=$_POST['g'];
  $error=array();
  if(empty($name)){
    $error['u'] = "UserName Requires";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    $error['u'] = "only letter allowed";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$gen)){
    $error['gn'] = "only letter allowed";
  }

  else if(!preg_match("/^[a-zA-Z-' ]*$/",$city)){
    $error['ci'] = "only letter allowed";
  }
  
  if(empty($email)){
    $error['e'] = "Email Requires";
  }
  if(empty($phone)){
    $error['p'] = "Phone number Requires";
  }

  else if(!preg_match("/^[0-9' ]*$/",$phone)){
    $error['p'] = "only number allowed";
  }
  if(empty($add)){
    $error['a'] = "Address Requires";
  }
  if(count($error)==0){
    $sql="UPDATE `seller` SET `id`='$userId',`sname`='$name',`email`='$email',`address`='$add',`phone`='$phone',`city`='$city',`gender`='$gen' WHERE id=$userId";
 $res=mysqli_query($mm,$sql);
  if($res){
  echo"
  <script>
  alert(' Update Successfully');
  window.location.href='account.php';
  </script>
  ";
  
  }
  else{
    $error['u'] = "Seller Name Exist";
  }
} 
} 
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Car</title>
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="../Admin/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #0A2558;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
              <a href="sellerDashborad.php" >
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="car list.php">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Car list</span>
              </a>
            </li>
            <li>
              <a href="account.php"class="active">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Manage Account</span>
              </a>
            </li>
           
            
            
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
            <span class="dashboard">Profile</span>
          </div>
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Hi    <?php echo $_SESSION['sname']; ?></span>
          </div>
        </nav>
        <div class="home-content">
    
            <div class="sales-boxes">
              <div class="recent-sales box">
                <div class="title">Seller Information</div>
                <div>
                    <div class="container">
                        <form method="post">
                        <?php
            $sql="select * from `seller` where id={$userId} ";
            $res=mysqli_query($mm,$sql);
            if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
            //  $name=$row['name'];
            //  $des=$row['description'];
             ?>
                          <div class="row">
                            <div class="col-25">
                              <label for="sname">Name</label>
                            </div>
                            <div class="col-75">
                              <input type="text" id="sname" name="sname" placeholder="Name" value="<?php echo $row['sname'];?>">
                              <p style="color:red"><?php if(isset($error['u'])) echo $error['u']; ?> </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-25">
                              <label for="email">Email</label>
                            </div>
                          <div class="col-75">
                            <input style="width:674px;height: 40px;" type="email" id="email" name="email" placeholder="Email"  value="<?php echo $row['email'];?>">
                            <p style="color:red"><?php if(isset($error['e'])) echo $error['e']; ?> </p>
                          </div>
                </div>
               
        <div class="row">
            <div class="col-25">
              <label for="address">Address</label>
            </div>
          <div class="col-75">
            <input type="text" id="address" name="address" placeholder="Address"  value="<?php echo $row['address'];?>" >
            <p style="color:red"><?php if(isset($error['a'])) echo $error['a']; ?> </p>
          </div>
          
          
          

</div>
<div class="row">
    <div class="col-25">
      <label for="city">City</label>
    </div>
  <div class="col-75">
    <input type="text" id="city" name="city" placeholder="City" value="<?php echo $row['city'];?>">
    <p style="color:red"><?php if(isset($error['ci'])) echo $error['ci']; ?> </p>
  </div>
</div>

        
<div class="row">
    <div class="col-25">
      <label for="phone">Phone</label>
    </div>
  <div class="col-75">
    <input  type="text" id="phone" name="phone" maxlength="11" placeholder="   Phone number"  value="<?php echo $row['phone'];?>">
    <p style="color:red"><?php if(isset($error['a'])) echo $error['a']; ?> </p>
  </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="g">Gender</label>
    </div>
  <div class="col-75">
    <input type="text" id="g" name="g" placeholder="Male/Female"value="<?php echo $row['gender'];?>" >
    <p style="color:red"><?php if(isset($error['gn'])) echo $error['gn']; ?> </p>
  </div>
</div>
&nbsp;
<div class="row">
    <input type="submit" name="submit" value="Update">
</div>       
</form>
                <?php
            }}
            ?>
            </div>
          </div>
        </section>
      
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