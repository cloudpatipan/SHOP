<?php
session_start();
include 'condb.php';
$cusname=$_POST['cus_name'];
$cusaddress=$_POST['cus_add'];
$custel=$_POST['cus_tel'];

$sql= "INSERT INTO  tb_order(cus_name,address,telephone,total_price,order_status)
VALUES('$cusname','$cusaddress','$custel','" . $_SESSION["sum_price"] . "','1')";
mysqli_query($conn,$sql);

$orderID = mysqli_insert_id($conn);
$_SESSION["order_id"] = $orderID ;   

for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if($_SESSION["strProductID"][$i] != ""){
        
    // ดึงข้อมูลสินค้า
    $sql1 = "SELECT * FROM product WHERE pro_id = '" . $_SESSION["strProductID"][$i] . "' ";
    $result1 =mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);
    $price = $row1['price'];
    $total = $_SESSION["strQty"][$i] * $price;

    $sql2 = "INSERT INTO order_detail(orderiD,pro_id,orderPrice,orderQty,Total)
    VALUES('$orderID','" . $_SESSION["strProductID"][$i] . "','$price',
    '" . $_SESSION["strQty"][$i] . "','$total')";
    if(mysqli_query($conn,$sql2)){
        //ตัดสต็อกสินค้า
        $sql3 = "UPDATE product set amount= amount - '" . $_SESSION["strProductID"][$i] . "' 
        WHERE pro_id='" . $_SESSION["strProductID"][$i] . "'" ;
        mysqli_query($conn,$sql3);
        //echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>" ;
        echo "<script> window.location='print_order.php'; </script>" ;
    }

    }

}
mysqli_close($conn);

unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]);

?>