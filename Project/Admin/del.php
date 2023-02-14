<?php
include 'conn.php';
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $sql="delete `seller` , `car_list`from `seller`, `car_list` where seller.id=car_list.seller_id and seller.id=$id";
    $sql1="delete from `seller` where id=$id";
    $res=mysqli_query($mm,$sql);
    $res1=mysqli_query($mm,$sql1);
    if($res){
        echo"
        <script>
        alert('Deleted  Successfully');
        window.location.href='seller.php';
        </script>
        ";
        
        }
        
        else{
        
            echo"
        
            <script>
            alert('Not Deleted');
            window.location.href='seller.php';
            </script>
            ";
            
        
        }

}