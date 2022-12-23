<?php
include 'condb.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//เข้ารหัสผ่าน password ด้วย sha512
$password=hash('sha512',$password);

$sql="SELECT * FROM member WHERE username='$username' and password ='$password' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if($row > 0 ){
    $_SESSION["username"]=$row['username'];
    $_SESSION["pw"]=$row['password'];
    $_SESSION["firstname"]=$row['name'];
    $_SESSION["lastname"]=$row['lastname'];
    $show=header("location:show_product.php");
}else{
    $_SESSION["Error"] = "<p> ชื่อหรือรหัสผ่านของคุณผิด </p>";
    $show=header("location:login.php");
}
echo $show;

?>