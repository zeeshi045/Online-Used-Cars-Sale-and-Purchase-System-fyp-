<?php
include 'Admin/conn.php';
include 'nav.php';

?>
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
  background-color:#2a2e4b;
  color: white;
}

.pagination a:hover:not(.active) {background-color:#ddd;}
</style>
    <!-- Search Start -->
    <form method="get" action="search.php">
    <div class="container-fluid bg-white pt-3 px-lg-5">
        <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="time mb-3" id="time" data-target-input="nearest">
                    <!-- <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                        data-target="#time" data-toggle="datetimepicker" /> -->
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <!-- <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Select A Car</option>
                    <option value="1">Car 1</option>
                    <option value="2">Car 1</option>
                    <option value="3">Car 1</option>
                </select> -->
                <input style="margin-top:-1px" type="text" name="ok"  class="form-control p-4 datetimepicker-input" placeholder="Search Car"
                        data-target="#time" data-toggle="datetimepicker" />
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-primary btn-block mb-3" type="submit"style="height: 50px;">Search</button>
            </div>
        </div>
    </div>
    </form>
    <!-- Search End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Online car sale and purchase system</h4>
                            <h1 class="display-1 text-white mb-md-4">Find Best Used Car</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Find Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Online car sale and purchase system</h4>
                            <h1 class="display-1 text-white mb-md-4">Quality Cars</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Find Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Find  Car Start -->

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
            <div class="row">
            <?php
             $limit=10;
             if(isset($_GET['page'])){
               $page=$_GET['page'];
             }else{
               $page=1;
             }
             $offset=($page-1)*$limit;
    $sql="select  * from `car_list`  LIMIT {$offset},{$limit} ";
    $res=mysqli_query($mm,$sql);
    $noResult = true;
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $noResult = false;
        $name=$row['name'];
        $year=$row['year'];
        $millage=$row['millage'];
        $price=$row['price'];
        $image=$row['image'];
        echo '

           
            <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                    <a href="view.php?viewid='.$id.' "class="text-light">
                       <img src="Seller/'.$image.' " alt="" width="249px" height="270px">
                        <h4 class="text-uppercase mb-4">'.$name.'</h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span style="color:grey">'.$year.'</span>
                            </div>
                           
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span  style="color:grey">'.$millage.'</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href="view.php?viewid='.$id.' ">PK:'.$price.'</a>
                        
                    </div>
                    
                </div>
               
                </a>
           
            ';}
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry No items available.</p>
                       
                    </div>
                </div> ';
            } ?>
           
            
        </div>
    </div>
    </div>
    &nbsp;
&nbsp;
&nbsp;
&nbsp;
<?php
$sql1="select * from car_list";
$result=mysqli_query($mm,$sql1);
if(mysqli_num_rows($result)>0){
  $total=mysqli_num_rows($result);
 
  $total_page=ceil($total/$limit);
  // echo '<ul class="pagination admin-pagination">';
  echo '<div style="margin-left:100px" class="pagination">';
  if($page>1){
    echo '<a href="index.php?page='.($page-1).'">Prev</a>';
  }
  
  for($m=1;$m<=$total_page;$m++){
    if($m==$page){
      $active="active";
    }
    else{
      $active="";
    }
echo '<a class="'.$active.'" href="index.php?page='.$m.'">'.$m.'</a>';
  }
  if($total_page>$page){
    echo '<a  href="index.php?page='.($page+1).'">Next</a>';
  }

  echo '</div>';
}
?>
    
    
    
    <!-- Rent A Car End -->


    
  

    




    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->


    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>

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