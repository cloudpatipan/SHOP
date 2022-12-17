<?php
include 'condb.php';
$idpro=$_GET['id'];
$sql1="DELETE FROM product WHERE pro_id='$idpro' ";
if(mysqli_query($conn,$sql1)){
    echo "<script> alert('ลบข้อมูลเรียบร้อย'); </script>" ;
    echo "<script> window.loaction='show_product_list.php' </script>" ;
}else{
    echo "Error : " .$sql1 . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');<script>";
}
    mysqli_close($conn);
?>