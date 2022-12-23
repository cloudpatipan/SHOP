<?php
session_start();
include 'condb.php';
$idpro=$_GET['id'];
$sql1="DELETE FROM product WHERE pro_id='$idpro' ";
if(mysqli_query($conn,$sql1)){
    echo "<script> window.location='show_product_list.php' </script>" ;
    $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
}else{
    $_SESSION['error'] = "ลบข้อมูลไม่สำเร็จ";
    echo "Error : " .$sql1 . "<br>" . mysqli_error($conn);
}
    mysqli_close($conn);
?>