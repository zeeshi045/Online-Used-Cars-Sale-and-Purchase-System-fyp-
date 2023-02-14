<?php
include '../Admin/conn.php';
$cateid=$_POST['cateid'];
if(!empty($cateid)){
	
   $sql = "SELECT * FROM model_list WHERE brand_id=$cateid";
$result= mysqli_query($mm,$sql);
$fetchsubcat= mysqli_num_rows($result);

if($fetchsubcat> 0){
?>
	<div class="form-group" id="subcatdiv">
                    <label for="subCatId">Model</label>
                    <select class="form-control" id="subCatId" name="subCatId" >
					<?php
					while($row=mysqli_fetch_array($result)){
						?>
						<option value="<?php echo $row['id'];?>"><?php echo $row['mname']?></option>
						<?php
					}
					?>
					</select>
					</div>
        <?php
      }else{
        ?>
               <div class="form-group" id="subcatdiv">
                    <label >Select Model</label>
                    <input type="text" name="subCatId" class="form-control" disabled placeholder="this brand has no model available">
                  </div>
         <?php
		 }

        }
       else{
     ?>
	 <div class="form-group" id="subcatdiv">
                    <label >Select Model</label>
                    <input type="text" name="subCatId" class="form-control" disabled placeholder="this brand has no model available">
                  </div>
	   <?php
	   }
	   ?>
	 