<?php
include '../conn.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color:#007aff;
  color: white;
}

.pagination a:hover:not(.active) {background-color:#ddd;}
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
<?php

session_start();
if(!$_SESSION['admin']){
  header("location:../login/login.php");
}

?>
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
              <a href="category.php"class="active">
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
            <span class="dashboard"> Category</span>
          </div>
          <form method="get" action="search.php" style="width:600px">
          <div class="search-box">
            <input type="text" id="search" class="form-control" name="search" placeholder="Search Category">
            
            <i class='bx bx-search' ></i> 
          </div>
</form>
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Hi  <?php echo $_SESSION['admin']; ?></span>
            
          </div>
        </nav>
    
        <div class="home-content">
    
          <div class="sales-boxes">
            <div class="recent-sales box">
              <div class="title">Categories</div>
              <div>
                <div class="button">
                    <a href="addcategory.php">+Add New Category</a>
                  </div>
              </div>
              <br>
              <div class="table-responsive-xl">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">S#</th>
      <th scope="col">Date Created</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col" >Update</th>
      <th scope="col" >Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    $limit=5;
    if(isset($_GET['page'])){
      $page=$_GET['page'];
    }else{
      $page=1;
    }
    $offset=($page-1)*$limit;
    $sql="select * from `category_list`LIMIT {$offset},{$limit} ";
    $res=mysqli_query($mm,$sql);
    if($res){
      while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $i=$i+1;
        $date=date('d-m-Y',strtotime($row['date_created']));
        $name=$row['catname'];
        $description=$row['description'];
        echo '
        <tr>
      <th scope="row">'.$i.'</th>
      <td>'.$date.'</td>
      <td>'.$name.'</td>
      <td>'.$description.'</td>
      <td>
      <button class="btn btn-primary"><a href="update.php?updatid='.$id.' "class="text-light">Update</a></button>
    </td>
    
    <td>
      <button class="btn btn-danger"><a href="del.php?delid='.$id.' "class="text-light">Delete</a></button>
    </td>
    </tr>';

      }
    }
    ?>
    
  </tbody>
</table>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<?php
$sql1="select * from category_list";
$result=mysqli_query($mm,$sql1);
if(mysqli_num_rows($result)>0){
  $total=mysqli_num_rows($result);
 
  $total_page=ceil($total/$limit);
  // echo '<ul class="pagination admin-pagination">';
  echo '<div style="margin-left:300px" class="pagination">';
  if($page>1){
    echo '<a href="category.php?page='.($page-1).'">Prev</a>';
  }
  
  for($m=1;$m<=$total_page;$m++){
    if($m==$page){
      $active="active";
    }
    else{
      $active="";
    }
echo '<a class="'.$active.'" href="category.php?page='.$m.'">'.$m.'</a>';
  }
  if($total_page>$page){
    echo '<a  href="category.php?page='.($page+1).'">Next</a>';
  }

  echo '</div>';
}
?>
  </div>

  <div class="footer-basic">
            <footer>
                <div class="social"><a href="https://www.instagram.com/am_alii1129/"><i class="icon ion-social-instagram"></i></a><a href="https://www.snapchat.com/"><i class="icon ion-social-snapchat"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a><a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="icon ion-social-facebook"></i></a></div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="../admin_dashboard.php">Dashboard</a></li>
                    <li class="list-inline-item"><a href="../car list/list.php">car list</a></li>
                    <li class="list-inline-item"><a href="category.php">car categories</a></li>
                    <li class="list-inline-item"><a href="../Brands/brand.php">car brands</a></li>
                    <li class="list-inline-item"><a href="../Models/model.php">car models</a></li>
                </ul>
                <p class="copyright">Used car sell & buy © 2022</p>
            </footer>
        </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  
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