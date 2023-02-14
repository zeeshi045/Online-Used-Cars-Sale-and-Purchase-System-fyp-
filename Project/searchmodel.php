<?php
include 'Admin/conn.php';
include 'nav.php';
?>
    <!-- Search Start -->
    <form action="searchmodel.php" method="get">
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
                <input style="margin-top:-1px" type="text"  name="ok" class="form-control p-4 datetimepicker-input" placeholder="Search Car"
                        data-target="#time" data-toggle="datetimepicker" />
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-primary btn-block mb-3" type="submit"style="height: 50px;">Search</button>
            </div>
        </div>
    </div>
    </form>
    <!-- Search End -->
    <div class="container my-3 mb-5">
        <h2 style="text-align:center"><span id="catTitle">Model</span></h2>
            <div class="row">
            <?php
            if(isset($_GET['ok']))
            {
                $filtervalues = $_GET['ok'];               
            $sql1="select * from `model_list` WHERE CONCAT(id,mname) LIKE '%$filtervalues%'";
            $res1=mysqli_query($mm,$sql1);
          $no=true;
              while($row=mysqli_fetch_assoc($res1)){
                $id=$row['id'];
                $no=false;
                $name=$row['mname'];
                $image=$row['image'];
                echo '
                <div class="col-xs-3 col-sm-3 col-md-3">
                          <div class="card" style="width: 18rem;">
                            <img src="Admin/Models/'.$image.'" class="card-img-top"  width="249px" height="270px">
                            <div class="card-body">
                              <h5 class="card-title"><a href="modelview.php?modelid=' . $id . '">' . $name . '</a></h5>
                              
                              <a href="modelview.php?modelid=' . $id . '" class="btn btn-primary">View All</a>
                            </div>
                          </div>
                        </div>';
                }
                echo'
            </div>
            
          </div>
        ';
        
        }
            if($no) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1>Your search - <em>"' .$_GET['ok']. '"</em> - No Result Found.</h1>
                        <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li></ul>
                        </p>
                    </div>
                </div> ';
            }
            ?>
           
            
        </div>
    </div>
    </div>
    
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