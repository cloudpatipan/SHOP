<?php include 'condb.php'; 
session_start();
if(!isset($_SESSION["username"]))
    header("location:login.php");
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
     <div class="m-4 bg-black text-white object-fill w-64 min-h-[5-rem] border-4 border-black shadow-lg rounded-xl overflow-hidden transition ease-in-out delay-150 bg-black hover:-translate-x-1 hover:scale-105 duration-300">
     <img class="bg-rose-500 hover:bg-rose-400 text-white font-bold py-2 px-4 border-b-4 border-rose-700 hover:border-rose-500 rounded" src="img/<?=$row['image']?>">
     <h2 class="font-bold text-xl text-center">ID : <?=$row['pro_id']?></h2>
</div>
</div>

     <div class="mr-auto my-auto mx-4">
        <h2 class="text-l font-bold"><?=$row['pro_name']?></h2>
        <h2 class="text-l font-bold">ประเภทสินค้า : <?=$row['type_name']?></h2>
        <p class="text-l font-bold">รายละเอียด : <?=$row['detail']?></p>
        <span class="text-l font-bold">
        ราคา <b class="text-rose-600"> <?=number_format($price,2)?> </b> บาท
        </span>
        <div class="mt-4">
         <a href="order.php?id=<?=$row['pro_id']?>" class="bg-rose-500 hover:bg-rose-400 text-white font-bold py-2 px-4 border-b-4 border-rose-700 hover:border-rose-500 rounded">เพิ่มลงตะกร้า</a>
        </div>
        </div>
    </div>
</div>

<?php include 'footer.php'  ?>

</body>
</html>