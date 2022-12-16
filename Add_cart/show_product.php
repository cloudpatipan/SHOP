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
    <?php include 'menu.php'; ?>
    <div class="container mx-auto">
        <div class="grid grid-cols-4 mx-48 mt-4 mb-4">
            <?php
            include 'condb.php';

            //คำสั่งเแสดงข้อมูล
            $sql = "SELECT * FROM product ";
            $hand = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array( $hand )){
            $price = $row['price'];

            ?>

<div class="mb-4 bg-black text-white object-fill w-64 min-h-[5-rem] shadow-lg rounded-lg overflow-hidden transition ease-in-out delay-150 bg-black hover:-translate-x-1 hover:scale-105 duration-300 overflow-visible">
      <img class="w-64 h-60 object-cover rounded-lg" src="img/<?=$row['image']?>" alt="">

      <div class="p-5 flex-col gap3">
        <span class="badge px-3 py-1 rounded-full text-xs bg-rose-600">มีสินค้า</span>
        <span class="badge px-3 py-1 rounded-full text-xs bg-rose-600">สินค้าตรง</span>

            <h2 class=" product-title font-bold text-2xl overflow-ellipsis whitespace-nowrap">
          <?=$row['pro_id']?>
          </h2>
          <h2 class="product-title uppercase font-bold text-xl overflow-hidden">
          <?=$row['pro_name']?>
          </h2>
            
        
            <span class="text-l font-bold">
              ราคา <b class="text-rose-600"> <?=number_format($price,2)?> </b> บาท
            </span>

            <div class="button">
              <button class="bg-rose-600 px-2 mt-2 py-2 hover:bg-gray-600 rounded-md text-xs text-white cursor-pointer">Add Cart</button>
              </div>
            </div>

            </div>
            <?php

            }
            mysqli_close($conn);

            ?>
        </div>

    </div>

    <?php include 'footer.php'; ?>
    
</body>
</html>