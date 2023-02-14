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
 <form method="get" action="searchbrand.php">
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
                <input style="margin-top:-1px" type="text" name="ok"  class="form-control p-4 datetimepicker-input" placeholder="Search brand"
                        data-target="#time" data-toggle="datetimepicker" />
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-primary btn-block mb-3" type="submit"style="height: 50px;">Search</button>
            </div>
        </div>
    </div>
    </form>
        <div class="container my-3 mb-5">
<h2 style="text-align:center; text-transform: uppercase;"><span id="catTitle">Brands</span></h2>
    <div class="row">
      <!-- Fetch all the categories and use a loop to iterate through categories -->
      <?php
       $limit=10;
       if(isset($_GET['page'])){
         $page=$_GET['page'];
       }else{
         $page=1;
       }
       $offset=($page-1)*$limit;
    $sql="select * from `brand_list`  LIMIT {$offset},{$limit}";
    $res=mysqli_query($mm,$sql);
  
      while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $name=$row['bname'];
        $image=$row['image'];
        echo '
        <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img src="Admin/Brands/'.$image.'" class="card-img-top"  width="249px" height="270px">
                    <div class="card-body">
                      <h5 class="card-title"><a href="Brandview.php?brandid=' . $id . '">' . $name . '</a></h5>
                      
                      <a href="Brandview.php?brandid=' . $id . '" class="btn btn-primary">View All</a>
                    </div>
                  </div>
                </div>';
        }
      ?>
    </div>
    </div>
    &nbsp;
&nbsp;
&nbsp;
&nbsp;
<?php
$sql1="select * from brand_list";
$result=mysqli_query($mm,$sql1);
if(mysqli_num_rows($result)>0){
  $total=mysqli_num_rows($result);
 
  $total_page=ceil($total/$limit);
  // echo '<ul class="pagination admin-pagination">';
  echo '<div style="margin-left:100px" class="pagination">';
  if($page>1){
    echo '<a href="brands.php?page='.($page-1).'">Prev</a>';
  }
  
  for($m=1;$m<=$total_page;$m++){
    if($m==$page){
      $active="active";
    }
    else{
      $active="";
    }
echo '<a class="'.$active.'" href="brands.php?page='.$m.'">'.$m.'</a>';
  }
  if($total_page>$page){
    echo '<a  href="brands.php?page='.($page+1).'">Next</a>';
  }

  echo '</div>';
}
?>
  
    <!-- Vendor End -->

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