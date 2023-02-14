<?php
session_start();
include 'Admin/conn.php';
$email=$_POST['email'];
$res=mysqli_query($mm,"select * from seller where email='$email'");
while($row=mysqli_fetch_assoc($res)){
	$userId=$row['id'];
	$name=$row['sname'];
}
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($mm,"update seller set otp='$otp' where email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['id']=$userId;
	$_SESSION['sname']=$name;
	$_SESSION['EMAIL']=$email;
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "kakahn45@gmail.com";
	$mail->Password = "ymjwowzpbixqgeht";
	$mail->SetFrom("kakahn45@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>