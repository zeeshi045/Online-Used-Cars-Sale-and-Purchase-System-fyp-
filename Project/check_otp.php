<?php
session_start();
include 'Admin/conn.php';
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$userId=$_SESSION['id'];
$res=mysqli_query($mm,"select * from seller where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($mm,"update seller set otp='' where email='$email'");
	$_SESSION['IS_LOGIN']=$email;
	
	echo "yes";
}else{
	echo "not_exist";
}
?>