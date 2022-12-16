<?php
include 'condb.php';
$proid = $_POST['proid'];
$proname = $_POST['pname'];
$typeid = $_POST['TypeID'];
$price = $_POST['price'];
$num = $_POST['num'];
$image = $_POST['textimg'];

//อัพโหลดรูปภาพ
if(is_uploaded_file($_FILES['fileupload']['tmp_name'])){
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['fileupload']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./img/".$new_image_name;
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$image";
    }

//คำสั่งอัพเดท
$sql="UPDATE product SET
pro_name = '$proname',
type_id = '$typeid',
price = '$price',
amount = '$num',
image = '$new_image_name'
WHERE pro_id='$proid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แกไข้ข้อมูลเรียบร้อย'); </script>" ;
    echo "<script> window.loaction='show_product_list.php' </script>" ;
}else{
    echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>" ;
}

?>