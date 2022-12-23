<?php
session_start();
include 'condb.php' ;
$p_name = $_POST['pname'];
$TypeID = $_POST['TypeID'];
$Detail = $_POST['detail'];
$price = $_POST['price'];
$num = $_POST['num'];

if(is_uploaded_file($_FILES['fileupload']['tmp_name'])){
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['fileupload']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./img/".$new_image_name;
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

    //คำสั่งเพิ่มข้อมูลในตาราง Product
$sql="INSERT INTO product(pro_name,type_id,detail,price,amount,image) 
VALUES('$p_name','$TypeID','$Detail','$price','$num','$new_image_name')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> window.location='fr_product.php' </script>" ;
    $_SESSION['success']= "บันทึกข้อมูลสำเร็จ";
}else{
    $_SESSION['error']= "บันทึกข้อมูลไม่สำเร็จ";
    
}

mysqli_close($conn);
?>