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
if(isset($_POST['submit'])){
  $userId = $_SESSION['id'];
  $city=$_POST['city'];
  $category_id= $_POST['category_id'];
  $brand_id= $_POST['cateid'];
  $model_id= $_POST['subCatId'];
  $name=$_POST['name'];
  $millage=$_POST['millage'];
  $year=$_POST['year'];
  $color=$_POST['color'];
  $engine_no=$_POST['engine_no'];
  $price=$_POST['price'];
  $des=$_POST['des'];
  $seller_phone=$_POST['seller_phone'];
  $seller_address=$_POST['seller_address'];
  $registered=$_POST['registered'];
  $image=$_FILES['image'];
  $image_loc=$_FILES['image']['tmp_name'];
  $image_name=$_FILES['image']['name'];
  $allow_ex=array('gif','png','jpg','jpeg');
  $filename=$_FILES['image']['name'];

  $image2=$_FILES['image2'];
  $image_loc2=$_FILES['image2']['tmp_name'];
  $image_name2=$_FILES['image2']['name'];
  $allow_ex1=array('gif','png','jpg','jpeg');
  $filename1=$_FILES['image2']['name'];
  $image3=$_FILES['image3'];
  $image_loc3=$_FILES['image3']['tmp_name'];
  $image_name3=$_FILES['image3']['name'];
  $allow_ex2=array('gif','png','jpg','jpeg');
  $filename2=$_FILES['image3']['name'];

  $error=array();
  if(empty($city)){
    $error['city'] = "City Name Requires";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$city)){
    $error['city'] = "only letter allowed";
  }
  if(empty($name)){
    $error['n'] = "Car Name Requires";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    $error['n'] = "only letter allowed";
  }
  if(empty($millage)){
    $error['m'] = "Milage Requires";
  }
  else if(!preg_match("/^[0-9' ]*$/",$millage)){
    $error['m'] = "only number allowed";
  }
  if(empty($year)){
    $error['y'] = "Year Requires";
  }
  if(empty($color)){
    $error['c'] = "color name Requires";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$color)){
    $error['c'] = "only letter allowed";
  }


  else if(!preg_match("/^[0-9' ]*$/",$year)){
    $error['y'] = "only number allowed";
  }
  if(empty($engine_no)){
    $error['e'] = "Engine number Requires";
  }
  if(empty($price)){
    $error['p'] = "Price Requires";
  }
  else if(!preg_match("/^[0-9' ]*$/",$price)){
    $error['p'] = "only number allowed";
  }
  else if($price<=0){
    $error['p'] = "Please enter price greater than zero";
  }
  if(empty($price)){
    $error['p'] = "Price Requires";
  }
  if(empty($registered)){
    $error['r'] = "registered field Requires";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/",$registered)){
    $error['r'] = "only letter allowed";
  }
  if(empty($seller_phone)){
    $error['sp'] = "seller phone no requires";
  }
  else if(!preg_match("/^[0-9' ]*$/",$seller_phone)){
    $error['sp'] = "only number allowed";
  }
  
  $file_ex=pathinfo($filename,PATHINFO_EXTENSION);
  if(!in_array($file_ex,$allow_ex)){
    $error['i'] = "Image Requires only jpg,png,jpeg and gif";
  }
  else{
  $img_des="Images/".$image_name;
  move_uploaded_file($image_loc,"Images/".$image_name);
  }

  $file_ex1=pathinfo($filename1,PATHINFO_EXTENSION);
  if(!in_array($file_ex1,$allow_ex1)){
    $error['i1'] = "Image Requires only jpg,png,jpeg and gif";
  }
  else{
  $img_des2="Images/".$image_name2;
  move_uploaded_file($image_loc2,"Images/".$image_name2);
  }

  $file_ex2=pathinfo($filename2,PATHINFO_EXTENSION);
  if(!in_array($file_ex2,$allow_ex2)){
    $error['i2'] = "Image Requires only jpg,png,jpeg and gif";
  }
  else{
    $img_des3="Images/".$image_name3;
    move_uploaded_file($image_loc3,"Images/".$image_name3);
  
  if(count($error)==0){
  $sql="insert into `car_list`(name,brand_id,category_id,seller_id,model_id,image,price,millage,color,city,description,seller_phone,seller_address,year,engine_no,registered,image2,image3) values ('$name','$brand_id','$category_id','$userId','$model_id','$img_des','$price','$millage','$color','$city','$des','$seller_phone','$seller_address','$year','$engine_no','$registered','$img_des2','$img_des3' )";
  $res=mysqli_query($mm,$sql);

if($res){
echo"

<script>
alert('Add Successfully');
window.location.href='car list.php';
</script>
";

}

else{

    echo"

    <script>
    alert('Not Add');
    window.location.href='addcar.php';
    </script>
    ";
    

}}}
}

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carlist</title>
    <link rel="stylesheet" href="../Admin/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
</head>
<style>
     /* Style inputs, select elements and textareas */
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
              <a href="sellerDashborad.php" >
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="car list.php"class="active">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Car list</span>
              </a>
            </li>
            <li>
              <a href="account.php">
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
            <span class="dashboard">Add Car List</span>
          </div>
         
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Hi    <?php echo $_SESSION['sname'];  ?></span>
            
          </div>
        </nav>
    
        <div class="home-content">
    
          <div class="sales-boxes">
            <div class="recent-sales box">
              <div class="title">Add Car Information</div>
              <div>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-control">
                          <label for="city">City </label>
                        
                          <input type="text" id="city" name="city" placeholder="Location">
                          <p style="color:red"><?php if(isset($error['city'])) echo $error['city']; ?> </p>
                          </div>
                      
                      <div class="form-control">
                        <label for="category_id">Category</label>
                     
                        
                        <select id="category_id" name="category_id"required>
                        <option value="" selected disabled required>Select</option>
                                  <?php
                                  
                                      $catsql = "SELECT * FROM `category_list`"; 
                                      $catresult = mysqli_query($mm, $catsql);
                                      while($row = mysqli_fetch_assoc($catresult)){
                                          $catId = $row['id'];
                                          $catName = $row['catname'];
                                          echo '<option value="' .$catId. '">' .$catName. '</option>';
                                      }
                                  ?>
                  </select>
                </div>
                
                                
                                   
                      <div class="form-control">
                      <label for="cateid">Brand</label>
                     
    
                    <select class="form-control" id="cateid" name="cateid"required >
					<option  value="" selected disabled required >Select Your Brand </option>
					<?php
					$sql2= "SELECT * from brand_list ";
					$result2= mysqli_query($mm,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
						<option value="<?php echo $fetch2['id']?>"><?php echo $fetch2['bname']?></option>
					<?php
					}	
					?>
					</select>
                  </div>
                 
                
                
                                    
                      
                      <div class="form-group" id="subcatdiv">
                    <label for="catid">Model</label>
                    <input type="text" name="subCatId" class="form-control"  placeholder="please select your brand">
                  </div>
                        <!-- <select id="model_id" name="model_id" >
                        <option>Select</option> -->
                                  <!-- <?php
                                  
                                      $catsql = "SELECT * FROM `model_list`"; 
                                      $catresult = mysqli_query($mm, $catsql);
                                      while($row = mysqli_fetch_assoc($catresult)){
                                          $catId = $row['id'];
                                          $catName = $row['mname'];
                                          echo '<option value="' .$catId. '">' .$catName. '</option>';
                                      }
                                  ?> -->
                
      
         
                     
                        <div class="form-control">
                          <label for="name">Car Name</label>
                       
                        
                          <input type="text" id="name" name="name" placeholder="Enter car name">
                          <p style="color:red"><?php if(isset($error['n'])) echo $error['n']; ?> </p>
                      </div>
                      
                        <div class="form-control">
                          <label for="millage">Mileage</label>
                       
                  
                          <input type="text" id="millage" name="millage" placeholder="Mileage KM">
                          <p style="color:red"><?php if(isset($error['m'])) echo $error['m']; ?> </p>
                      </div>
                      
                        <div class="form-control">
                          <label for="year">Year</label>
                      
                        
                          <input type="text" id="year" name="year" placeholder="Year">
                          <p style="color:red"><?php if(isset($error['y'])) echo $error['y']; ?> </p>
                      </div>
                      
                        <div class="form-control">
                          <label for="color">Color</label>
                       
                       
                          <input type="text" id="color" name="color" placeholder="Color">
                          <p style="color:red"><?php if(isset($error['c'])) echo $error['c']; ?> </p>
                      </div>
                      
                        <div class="form-control">
                          <label for="engine_no">Engine_No</label>
                        
                          <input type="text" id="engine_no" name="engine_no" placeholder="Engine Number">
                          <p style="color:red"><?php if(isset($error['e'])) echo $error['e']; ?> </p>
                      </div>
                      
                      
                        <div class="form-contrl">
                          <label for="price">Price</label>
                        

                        
                          <input type="text" id="price" name="price" placeholder="PKR:Price">
                          <p style="color:red"><?php if(isset($error['p'])) echo $error['p']; ?> </p>
                      </div>
                      <div class="form-control">
                     
                          <label for="registered">Registered</label>
                        
                       
                          <input type="text" id="registered" name="registered" placeholder="Yes/No">
                          <p style="color:red"><?php if(isset($error['r'])) echo $error['r']; ?> </p>
                      </div>
                      
				  <div class="form-control">
          
                          <label for="image">Image 1</label>
                          
                            <input class="form-control" type="file" id="image" name="image" placeholder="">
                            <p style="color:red"><?php if(isset($error['i'])) echo $error['i']; ?> </p>
          </div>
                    <div class="form-control">
          
          <label for="image2">Image 2</label>
         
            <input class="form-control" type="file" id="image2" name="image2" placeholder="">
            <p style="color:red"><?php if(isset($error['i1'])) echo $error['i1']; ?> </p>
                    </div>
                    <div class="form-control">
          
                          <label for="image3">Image 3</label>
                        
                            <input class="form-control" type="file" id="image3" name="image3" placeholder="">
                            <p style="color:red"><?php if(isset($error['i2'])) echo $error['i2']; ?> </p>
                    </div>
                     
                      <?php
            $sql="select * from `seller` where id=$userId ";
            $res=mysqli_query($mm,$sql);
            if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
            //  $name=$row['name'];
            //  $des=$row['description'];
            
             ?>
                      
                        <div class="form-control">
                          <label for="seller_phone">Mobile No</label>
                       
                       
                          <input type="text" id="seller_phone" name="seller_phone" maxlength="11" placeholder="Enter Phone No" value="<?php echo $row['phone'];?>">
                          <p style="color:red"><?php if(isset($error['sp'])) echo $error['sp']; ?> </p>
                      </div>
                      
                        <div class="form-control">
                          <label for="seller_address">Address</label>
                       
                          <input type="text" id="seller_address" name="seller_address" placeholder="Enter Address" value="<?php echo $row['address'];?>">
                       
                      </div>
                      <?php }} ?>
                      
                        <div class="form-control">
                          <label for="des">Description</label>
                      
                       
                          <textarea id="des" name="des" placeholder="Describe your car: Example Original Paint , Excellent Mileage etc." style="height:200px"></textarea>
                        
                      </div>
                      <div class="row">
                        <input type="submit" name="submit" value="Submit">
                      </div>
                   
                    </form>
                    
                  </div> 


              
              </div>
             
           
          </div>
        </div>
      </section>
      <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script >
$(document).ready(function(){	
$( "#cateid" ).change(function () {

    var cateid = $(this).val();
	
        $.ajax({
            url: "dynamicajax.php",
           type:"POST",
            data: {cateid:cateid},
            success: function(data) {
                $("#subcatdiv").replaceWith(data);      
            },
        });
});
});
        // function get_sub_cat(){
        //   var brand_id=jQuery('#brand_id').val();
        // jQuery.ajax({
        //   url:'get_sub_cat.php',
        //   type:'POST',
        //   data:'brand_id='+brand_id,
        //   success:function(result){
        //     jQuery('#model_id').html(result)
        //   }
        // });
        // }
        </script>
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