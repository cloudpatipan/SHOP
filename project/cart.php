<?php
session_start();
include 'condb.php';
/*
$id=$_GET['id'];
$sql = "SELECT * FROM product WHERE pro_id ='$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cart</title>
</head>
<body>
<?php include 'menu.php' ?>
    
<div class="container mx-auto">
<div class="p-4 mb-4 text-sm bg-green-500 text-white font-bold py-2 px-4 border-b-4 border-green-700" role="alert">
  <span class="font-bold text-xl">สั่งซื้อสินค้า
</div>
        <form id="form1" method="POST" action="insert_cart.php">
        <table class= "w-full text-sm text-left text-white">
        <thead class="text-xs uppercase bg-rose-500 text-white font-bold py-2 px-4 border-b-4 border-rose-700">
            <tr class="text-xl">
                <th class="px-6 py-2">ลำดับที่</th>
                <th class="py-2">ชื่อสินค้า</th>
                <th class="py-2">ราคา</th>
                <th class="py-2">จำนวน</th>
                <th class="py-2">ราคารวม</th>
                <th class="py-2">เพิ่ม - ลด</th>
                <th class="py-2">ลบ</th>
            </tr>
            </thead>
<?php
$total = 0;
$sumprice = 0;
$m = 1;
for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if($_SESSION["strProductID"][$i] != ""){
        $sql1="SELECT * from product where pro_id = '" . $_SESSION["strProductID"][$i] . "' " ;
        $result1 = mysqli_query($conn, $sql1);
        $row_pro = mysqli_fetch_array($result1);

    $_SESSION["price"] = $row_pro['price'];
     $total = $_SESSION["strQty"][$i];
     $sum = $total * $row_pro['price'];
     $sumprice = $sumprice + $sum;
     $_SESSION["sum_price"] = $sumprice;

?>
            <tr class="bg-black hover:bg-black/95 text-white font-bold py-2 px-4 hover:border-black rounded">
                <td class="px-6"><?=$m?></td>
                <td class="flex items-center"><img class="mx-2 m-2" src="img/<?=$row_pro['image']?>" width="80" height="100" alt=""><?=$row_pro['pro_name']?></td>
                <td><?=$row_pro['price']?></td>
                <td><?=$_SESSION["strQty"][$i]?></td>
                <td><?=$sum?></td>
                <td>
                <a href="order.php?id=<?=$row_pro['pro_id']?>" type="button" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">+</a>
                <a href="order_del.php?id=<?=$row_pro['pro_id']?>" type="button" class="bg-rose-500 hover:bg-rose-400 text-white font-bold py-2 px-4 border-b-4 border-rose-700 hover:border-rose-500 rounded">-</a>
                </td>
                <td><a href="pro_delete.php?Line=<?=$i?>" class="bg-rose-500 hover:bg-rose-400 text-white font-bold py-2 px-4 border-b-4 border-rose-700 hover:border-rose-500 rounded-full">X</a></td>
            </tr>
<?php
$m=$m+1;
}
}
?>

<tr class="bg-blue-500 text-white text-lg font-bold py-2 px-4 border-b-4 border-blue-700">
    <td class="text-end" colspan="5">รวมเป็นเงิน</td>
    <td class="text-center"><?=$sumprice?></td>
    <td>บาท</td>
</tr>
        </table>
 
        <div class="text-right mt-6 space-x-2">
        <a href="show_product.php" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
          เลือกซื้อสินค้า
        </a>
           <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
          ยืนยันการสั่งซื้อ
            </button>
        </div>

        <div class="row w-96">
        <div class="p-4 mb-4 bg-green-500 text-white font-bold py-2 px-4 border-b-4 border-green-700" role="alert">
        <span class="font-bold text-xl">ข้อมูลสำหรับจัดส่งสินค้า
        </div>

        
        <label class="block text-sm font-bold">ชื่อ-นามสกุล : </label>
        <input type="text" name="cus_name" class="from-control rounded-lg my-2 w-full" placeholder="ชื่อ-นามสกุล..."></input>
        <label class="block text-sm font-bold">ที่อยู่จัดส่งสินค้า</label>
        <textarea type="text" name="cus_add" class="from-control rounded-lg my-2 w-full" placeholder="ที่อยู่..." required></textarea>
        <label class="block text-sm font-bold">เบอร์โทรศัพท์ :</label>
        <input type="number" name="cus_tel" class="from-control rounded-lg my-2 w-full" placeholder="เบอร์โทรศัพท์..." required>
        </div>

        </div>
        </form>
</div>

</body>
</html>