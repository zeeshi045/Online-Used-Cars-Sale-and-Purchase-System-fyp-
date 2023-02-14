<?php
include '../Admin/conn.php';
session_start();
if(isset($_SESSION['IS_LOGIN'])){
  $userId=$_SESSION['id'];
}else{
	header('location:index.php');
	die();
}
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $sql="delete from `car_list` where id= $id";
    $res=mysqli_query($mm,$sql);
    if($res){
 
        echo"
        
        <script>
        alert('Deleted  Successfully');
        window.location.href='car list.php';
        </script>
        ";
        
        }
        
        else{
        
            echo"
        
            <script>
            alert('Not Deleted');
            window.location.href='car list.php';
            </script>
            ";
            
        
        }

}