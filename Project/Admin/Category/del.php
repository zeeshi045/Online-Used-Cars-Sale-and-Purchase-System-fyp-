<?php
include '../conn.php';
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $sql="delete`category_list`,`car_list` from `category_list`, `car_list` where category_list.id=car_list.category_id and category_list.id=$id";
    $sql1="delete from `category_list` where id=$id";
   
    $res=mysqli_query($mm,$sql);
    $res1=mysqli_query($mm,$sql1);
    if($res>0){
        echo"
        <script>
        alert('Deleted  Successfully');
        window.location.href='category.php';
        </script>
        ";
        
        }
        
        else{
        
            echo"
        
            <script>
            alert('Not Deleted');
            window.location.href='category.php';
            </script>
            ";
            
        
        }
       

}