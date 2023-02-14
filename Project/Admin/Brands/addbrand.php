<?php
include '../conn.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $image=$_FILES['image'];
  $image_loc=$_FILES['image']['tmp_name'];
  $image_name=$_FILES['image']['name'];
  $allow_ex=array('gif','png','jpg','jpeg');
  $filename=$_FILES['image']['name'];
  $error=array();
  $u="select bname from `brand_list` where bname='$name'";
$uu=mysqli_query($mm,$u);
  if(empty($name)){
    $error['u'] = "Brand Name Requires";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    $error['u'] = "only letter allowed";
  }
  else if(mysqli_num_rows($uu) > 0){
    $error['u'] = "Brand Name Exist";
  }
  
  $file_ex=pathinfo($filename,PATHINFO_EXTENSION);
  if(!in_array($file_ex,$allow_ex)){
    $error['i'] = "Image Requires only jpg,png,jpeg and gif";
  }
  else{
  $img_des="Images/".$image_name;
  move_uploaded_file($image_loc,"Images/".$image_name);
  if(count($error)==0){
  $sql="insert into `brand_list`(bname,image) values ('$name','$img_des' )";
$res=mysqli_query($mm,$sql);
// if($res){
//   echo "Data inserted Successfully";
// }
// else{
//   die(mysqli_error($mm));
// }

// }


if($res){
 
echo"

<script>
alert('Add  Successfully');
window.location.href='brand.php';
</script>
";

}

else{

    echo"

    <script>
    alert('Not Add');
    window.location.href='addbrand.php';
    </script>
    ";
    

}}
}
  
}
?>
<?php

session_start();
if(!$_SESSION['admin']){
  header("location:../login/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand Page</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #0A2558;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
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
<body>

    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Cars Sale System</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="../admin_dashboard.php" >
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="../car list/list.php">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Car list</span>
              </a>
            </li>
            <li>
              <a href="../Category/category.php">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Car Categories</span>
              </a>
            </li>
            <li>
              <a href="brand.php"class="active">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Car Brands</span>
              </a>
            </li>
            <li>
              <a href="../Models/model.php">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Car Models</span>
              </a>
            </li>
            <li>
              <a href="../seller.php">
                <i class='bx bx-user' ></i>
                <span class="links_name"></span>
                <span class="links_name"> Seller</span>
              </a>
            </li>
            
            
            <li class="log_out">
              <a href="../Login/logout.php">
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
            <span class="dashboard">Car brands</span>
          </div>
         
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name"> Hi <?php echo $_SESSION['admin']; ?></span>
          </div>
        </nav>
    
        <div class="home-content">
    
          <div class="sales-boxes">
            <div class="recent-sales box">
              <div class="title"> Add Brand</div>
             
              <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-25">
                      <label for="name">Brand Name</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="name" name="name" placeholder="Brand name..">
                      <p style="color:red"><?php if(isset($error['u'])) echo $error['u']; ?> </p>
                    </div>
                  </div>
                 <br><br>
                  <div class="row">
                    <div class="col-25">
                      <label for="image">Image</label>
                    </div>
                    <div class="md-3">
                        <input  style="margin-top: 17px;" type="file"  name="image" placeholder="" >
                        <p style="color:red"><?php if(isset($error['i'])) echo $error['i']; ?> </p>
                    </div>
                  </div>
                 
                  <div class="row">
                    <input type="submit" name="submit" value="Save">
                  </div>
                </form>
              </div> 
             
            </div>
           
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