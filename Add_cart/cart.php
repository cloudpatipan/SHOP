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
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
  <span class="font-bold text-xl">สั่งซื้อสินค้า
</div>
        <form id="form1" method="POST" action="">
        <table class= "w-full text-sm text-left text-white">
        <thead class="text-l bg-black uppercase">
            <tr class="text-xl">
                <th class="px-6 py-2">ลำดับที่</th>
                <th class="py-2">ชื่อสินค้า</th>
                <th class="py-2">ราคา</th>
                <th class="py-2">จำนวน</th>
                <th class="py-2">ราคารวม</th>
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

?>
            <tr class="bg-white border-b dark:bg-black dark:border-black">
                <td class="px-6"><?=$m?></td>
                <td class="flex items-center"><img class="mx-2 m-2" src="img/<?=$row_pro['image']?>" width="80" height="100" alt=""><?=$row_pro['pro_name']?></td>
                <td><?=$row_pro['price']?></td>
                <td><?=$_SESSION["strQty"][$i]?></td>
                <td><?=$sum?></td>
                <td><a href="pro_delete.php?Line=<?=$i?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg></a></td>
            </tr>
<?php
$m=$m+1;
}
}
?>

<tr class="bg-white border-b dark:bg-black dark:border-black">
    <td class="text-end" colspan="4">รวมเป็นเงิน</td>
    <td class="text-center"><?=$sumprice?></td>
    <td>บาท</td>
</tr>
        </table>
        <div class="text-right mt-6 space-x-2">
        <a href="show_product.php" class="bg-white hover:bg-blue-100 text-blue-800 font-semibold py-2 px-4 border border-blue-400 rounded">
          เลือกซื้อสินค้า
        </a>

           <a href="" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
          ยืนยันการสั่งซื้อ
            </a>

            </div>

        </div>
        </form>
</div>

</body>
</html>