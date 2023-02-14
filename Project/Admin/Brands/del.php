<?php
include '../conn.php';
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $sql="delete`brand_list`,`car_list` from `brand_list`, `car_list` where brand_list.id=car_list.brand_id and brand_list.id=$id";
    $sql1="delete from `brand_list` where id=$id";
    $res=mysqli_query($mm,$sql);
    $res1=mysqli_query($mm,$sql1);
    if($res){
        echo"
        <script>
        alert('Deleted  Successfully');
        window.location.href='brand.php';
        </script>
        ";
        
        }
        
        else{
        
            echo"
        
            <script>
            alert('Not Deleted');
            window.location.href='brand.php';
            </script>
            ";
            
        
        }

}