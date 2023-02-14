<?php
$mm=mysqli_connect('localhost','root','','car_buy_sale');
$name=$_POST['name'];
$password=$_POST['password'];


$result=mysqli_query($mm, " SELECT * FROM  `admin_login` WHERE name = '$name' and  password = '$password' ");

session_start();

if(mysqli_num_rows($result)){

    $_SESSION['admin']=$name;

echo"

<script>
alert('Login Successfully');
window.location.href='../admin_dashboard.php';
</script>
";

}

else{

    echo"

    <script>
    alert('Invalid username/password');
    window.location.href='login.php';
    </script>
    ";
    

}

?>