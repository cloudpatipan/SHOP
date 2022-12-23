<?php
include 'condb.php';
//รับค่าตัวแปรจากไฟล์ register
$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

//เข้ารหัสผ่าน password ด้วย sha512
$password=hash('sha512',$password);

//อัพโหลดรูปภาพ
if(is_uploaded_file($_FILES['fileupload']['tmp_name'])){
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['fileupload']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./img/".$new_image_name;
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$image";
    }


//คำสั่งเพิ่มข้อมูลลงตาราง member
$sql ="INSERT INTO member(name,lastname,telephone,username,password,image) 
VALUES('$name','$lastname','$phone','$username','$password','$new_image_name') ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script> " ;
    echo "<script> window.location='register.php'; </script> " ;
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทุกข้อมูลไมไ่ด้'); </script> " ;
}
mysqli_close($conn);


?>