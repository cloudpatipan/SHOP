<?php
include 'condb.php' ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto w-1/2">
    <div class="bg-black/75 text-center text-3xl p-4 my-4 rounded-lg text-white">
            ข้อมูลสินค้า
        </div>
        <a class="inline-block px-6 py-4 border-2 border-green-600 text-green-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out mb-4" href="fr_product.php" role="button">เพิ่มสินค้า+</a>
    <table class="w-full">
        <tr class="text-xl text-center uppercase bg-black/75 text-white">
            <th class="border border-slate-600">รหัสสินค้า</th>
            <th class="border border-slate-600">ชื่อสินค้า</th>
            <th class="border border-slate-600">ประเภท</th>
            <th class="border border-slate-600">ราคา</th>
            <th class="border border-slate-600">จำนวน</th>
            <th class="border border-slate-600">รูปภาพ</th>
            <th class="border border-slate-600">แก้ไข</th>
        </tr>
<?php
include 'condb.php';

//คำสั่งแบ่งหน้าเพจ

//คำสั่งแสดงข้อมูล
$sql="SELECT * FROM product ,type WHERE product.type_id =type.type_id ";
$hand = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
?>


<tr>
    <td class="border border-slate-700 text-center"><?=$row['pro_id']?></td>
    <td class="border border-slate-700 text-center"><?=$row['pro_name']?></td>
    <td class="border border-slate-700 text-center"><?=$row['type_name']?></td>
    <td class="border border-slate-700 text-center"><?=$row['price']?></td>
    <td class="border border-slate-700 text-center"><?=$row['amount']?></td>
    <td class="border border-slate-700"><img src="img/<?=$row['image']?>" width="80px" hieght="100px"></td>
    <td class="border border-slate-700 text-center"><a href="edit_product.php?id=<?=$row['pro_id']?>">แก้ไข</a></td>
</tr>

<?php
}
?>
    </table>
    </div>
</body>
</html>