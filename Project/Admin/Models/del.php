<?php
include '../conn.php';
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $sql="delete `model_list`,`car_list` from `model_list`, `car_list` where model_list.id=car_list.model_id and model_list.id=$id";
    $sql1="delete from `model_list` where id=$id";
   
    $res=mysqli_query($mm,$sql);
    $res1=mysqli_query($mm,$sql1);
    if($res){
 
        echo"
        
        <script>
        alert('Deleted  Successfully');
        window.location.href='model.php';
        </script>
        ";
        
        }
        
        else{
        
            echo"
        
            <script>
            alert('Not Deleted');
            window.location.href='model.php';
            </script>
            ";
            
        
        }

}