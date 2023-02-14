<?php
include '../conn.php';
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $sql="delete from `car_list` where id= $id";
    $res=mysqli_query($mm,$sql);
    if($res){
 
        echo"
        
        <script>
        alert('Deleted  Successfully');
        window.location.href='list.php';
        </script>
        ";
        
        }
        
        else{
        
            echo"
        
            <script>
            alert('Not Deleted');
            window.location.href='list.php';
            </script>
            ";
            
        
        }

}