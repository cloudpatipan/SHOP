<?php
include 'condb.php' ;
$p_name = $_POST['pname'];
$TypeID = $_POST['TypeID'];
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
$sql="INSERT INTO product(pro_name,type_id,price,amount,image) 
VALUES('$p_name','$TypeID','$price','$num','$new_image_name')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>" ;
    echo "<script> window.loaction='fr_product.php' </script>" ;
}else{
    echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>" ;
}
?>