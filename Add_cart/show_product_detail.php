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
    <div class="container mx-auto my-2">
    <div class="grid grid-cols-2">
    <?php
        $proid=$_GET['id'];
        $sql = "SELECT * FROM product, type WHERE product.type_id= type.type_id and product.pro_id='$proid' ";
        $hand = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array( $hand );
        $price = $row['price'];
    ?>
     <div class="m-auto">
     <img class="rounded-xl border-4 border-black w-80" src="img/<?=$row['image']?>">
</div>

     <div class="mr-auto my-auto mx-4">

        <h2 class="font-bold text-xl">ID : <?=$row['pro_id']?></h2>
        <h2 class="text-l font-bold"><?=$row['pro_name']?></h2>
        <h2 class="text-l font-bold">ประเภทสินค้า : <?=$row['type_name']?></h2>
        <p class="text-l font-bold">รายละเอียด : <?=$row['detail']?></p>
        <span class="text-l font-bold">
        ราคา <b class="text-rose-600"> <?=number_format($price,2)?> </b> บาท
        </span>
        <div class="mt-4">
         <a href="order.php?id=<?=$row['pro_id']?>" class="bg-rose-600 px-2 py-2 hover:bg-gray-600 rounded-md text-xs text-white cursor-pointer">เพิ่มลงตะกร้า</a>
        </div>
        </div>
    </div>
</div>

<?php include 'footer.php'  ?>

</body>
</html>