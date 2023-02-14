<?php
include 'Admin/conn.php';
include 'nav.php';
?>
    <!-- Search Start -->
    <form action="search.php" method="get">
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
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4  text-center mb-5">Search Result</h1>
            <div class="row">
            <?php
            if(isset($_GET['ok']))
            {
                $filtervalues = $_GET['ok'];               
    $sql="select c.id,  c.name,c.image,c.price,c.millage,c.color,c.city,c.description,c.seller_phone,c.seller_address,c.year,c.engine_no,c.registered,b.bname,cat.catname,s.sname,m.mname from car_list c INNER JOIN brand_list b ON c.brand_id=b.id INNER JOIN category_list cat ON c.category_id=cat.id INNER JOIN seller s ON c.seller_id=s.id INNER JOIN model_list m ON c.model_id=m.id WHERE CONCAT(c.id,c.name,c.color,bname,catname,mname,c.year,c.millage,c.millage) LIKE '%$filtervalues%'";
    $res=mysqli_query($mm,$sql);
    $no = true;
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $name=$row['name'];
        $no = false;
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
           
            ';} }
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
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Sharqi Colony,Vehari,Pakistan</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>03498776860</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>Zeeshi00@gmail.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Home</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Brands</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Models</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Category</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Online used car sale and purchase system</a>. All Rights Reserved.</p>
		
							
        <p class="m-0 text-center text-body">Designed by <a href="#">M Zeeshan Farooq & Ali Haider</a></p>
    </div>
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