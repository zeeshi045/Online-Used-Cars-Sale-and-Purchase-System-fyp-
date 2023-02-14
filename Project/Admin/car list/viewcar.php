<?php
include '../conn.php';
// session_start();
// $loggedin= true;
// $userId = $_SESSION['userId'];
// $username = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Car</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxicons CDN Link -->
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border:none;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

</head>

<body>
<?php

session_start();
if(!$_SESSION['admin']){
  header("location:../login/login.php");
}
?>
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
              <a href="list.php"class="active">
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
              <a href="../Brands/brand.php">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Car Brands</span>
              </a>
            </li>
            <li>
              <a href="../Models/model.html">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Car Models</span>
              </a>
            </li>
            <li>
              <a href="seller.php">
                <i class='bx bx-user' ></i>
                <span class="links_name"></span>
                <span class="links_name"> Seller</span>
              </a>
            </li>
            
            
            <li class="log_out">
              <a href="../login/logout.php">
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
            <span class="dashboard">Car list</span>
          </div>
          
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name"> Hi   <?php echo $_SESSION['admin']; ?></span>
          </div>
        </nav>
    
        <div class="home-content">
        
    
            <div class="sales-boxes">
              <div class="recent-sales box">
              <?php
 if(isset($_GET['viewid'])){
  $id=$_GET['viewid'];
  
  $sql="Select c.id,c.name,c.image,c.price,c.millage,c.color,c.city,c.description,c.seller_phone,c.seller_address,c.year,c.engine_no,c.registered,b.bname,cat.catname,s.sname,m.mname from car_list c INNER JOIN brand_list b ON c.brand_id=b.id INNER JOIN category_list cat ON c.category_id=cat.id INNER JOIN seller s ON c.seller_id=s.id INNER JOIN model_list m ON c.model_id=m.id where c.id=$id";
  $res=mysqli_query($mm,$sql);
      $row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $image=$row['image'];
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

        echo '
                
                <h2>'.$name.'</h2>
                    <img style="margin-top: 20px;height: 400px;width: 500px;"; src="../../Seller/'.$image.' " alt="">
 
                    <table style="border: none;" id="customers">
                      
                          <td ><strong>Category</strong></td>
                          <td><strong>Brand</strong></td>
                          <td><strong>Model</strong></td>
                        </tr>
                        <tr>
                          <td>'.$cat.' </td>
                          <td>'.$b.' </td>
                          <td>'.$m.' </td>
                        </tr>
                        <tr>
                          <td><strong>Year</strong> </td>
                          <td><strong>Color</strong> </td>
                          <td><strong>Registered</strong></td>
                        </tr>
                        <tr>
                          <td>'.$y.' </td>
                          <td>'.$clr.' </td>
                          <td>'.$r.'</td>
                        </tr>
                        <tr>
                          <td><strong>Price</strong></td>
                          <td><strong>Mileage</strong> </td>
                          <td><strong>Engine</strong></td>
                        </tr>
                        <tr>
                          <td>'.$p.'</td>
                          <td>'.$mil.'</td>
                          <td>'.$e.'</td>
                        </tr>
                       
                      </table>
                      <br>
                      <br>
                      <p>
                        <h3>Description</h3>
                        '.$des.'
                      </p>
                    
                      <br>
                      <br>
                      <h3>Seller Detail</h3>
                      <table style="border: none;" id="customers">
                        
                        <td ><strong>Phone no.</strong></td>
                        <td><strong>Address</strong></td>
                      </tr>
                      <tr>
                        <td>'.$ph.'</td>
                        <td>'.$add.'</td>
                      </tr>
                     
                    </table>
                    ';}?>
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