<?php include 'condb.php' ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Product Detail</title>
</head>
<body>
    <?php include 'menu.php' ?>
    <div class="container mx-auto">
    <div class="grid grid-cols-2 border-4">
    <?php
        $proid=$_GET['id'];
        $sql = "SELECT * FROM product, type WHERE product.type_id= type.type_id and product.pro_id='$proid' ";
        $hand = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array( $hand );
    ?>
     <div class="m-auto">
     <img class="rounded-xl border-4 border-black" src="img/<?=$row['image']?>" width="400" height="450">
</div>

     <div class="my-auto mx-4">

        <h2>ID : <?=$row['pro_id']?></h2>
        <h2><?=$row['pro_name']?></h2>
        <h2>ปนเภทสินค้า : <?=$row['type_name']?></h2>
        <h2>รายละเอียด : <?=$row['detail']?></h2>
        <h2>ราคา <?=$row['price']?> บาท</h2>
        <div class="mt-4">
         <a href="show_product_detail.php?id=<?=$row['pro_id']?>" class="bg-rose-600 px-2 py-2 hover:bg-gray-600 rounded-md text-xs text-white cursor-pointer">เพิ่มลงตะกร้า</a>
        </div>
        </div>
    </div>
</div>

<?php include 'footer.php'  ?>

</body>
</html>