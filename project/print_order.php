<?php
session_start();
include 'condb.php';
$sql = "SELECT * FROM tb_order WHERE  orderID= '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['total_price']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Receipt</title>
</head>
<body>
    <div class="container mx-auto">
            <div class="p-4 mb-4 mt-4 text-xl text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                <span class="font-medium">การสั่งซื้อเสร็จสมบูรณ์
            </div>
            เลขที่การสั่งซื้อ : <?=$rs['orderID']?> <br>
            ชื่อ - นามสกุล (ลูกค้า) : <?=$rs['cus_name']?> <br>
            ที่อยู่การจัดส่ง: <?=$rs['address']?> <br>
            เบอร์โทรศัพท์: <?=$rs['telephone']?> <br>
            <br>

            
<div class="card-body border-2">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-white border-b-2 text-black text-l border-black">
            <tr>
                <th class="px-2">
                    รหัสสินค้า
                </th>
                <th>
                    ชื่อสินค้า
                </th>
                <th>
                    ราคา
                </th>
                <th>
                    จำนวน
                </th>
                <th>
                    ราคารวม
                </th>
            </tr>
        </thead>
<?php

$sql1="select * from order_detail d,product p where d.pro_id=p.pro_id and d.orderID= '" . $_SESSION["order_id"] . "' ";
$result1 = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result1)){

?>
        <tbody>

        <tr class="bg-white border-b-2 text-black border-black">
                <td class="py-2 px-2 font-medium text-gray-900 whitespace-nowrap text-black"><?=$row['pro_id']?></td>
                <td class="py-2"><?=$row['pro_name']?></td>
                <td class="py-2"><?=$row['orderPrice']?></td>
                <td class="py-2"><?=$row['orderQty']?></td>
                <td class="py-2"><?=$row['Total']?></td>
            </tr>
<?php
}
?>
    </table>
<h6 class="text-end py-2">รวมเป็นเงิน <?=number_format($total_price,2)?> บาท</h6>

</div>
<div class="mt-4">
***กรุณาโอนเงินภายใน 7 วัน หลังจากทำการสั่งซื้อ โอนเงินผ่านธนาคาร กรุงไทย ชื่อบัญชี นายปฏิภาณ ทริสุข ประเภทออมทรัพย์ เลขที่บัญชี 245-0-33195-6
</div>

<div class="text-center mt-4">
<a href="show_product.php" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</a>
<button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" onclick="window.print()">Print</button>
        </div>

        </div>
    </div>
</body>
</html>