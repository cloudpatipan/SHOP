<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../path/to/flowbite/dist/flowbite.js"></script>
  <title>PRODUCT</title>
</head>
<body>
  <?php include 'menu.php'; ?>
  <div class="container mx-auto">
  <div class="grid grid-cols-4 mx-48">
      <?php
      include 'condb.php'; 

      //คำสั่งแบ่งหน้า
      $perpage = 8;
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = 1;
      }
      $start = ($page -1) * $perpage;

      //คำสั่งแสดงข้อมูล
      $key_word = @$_POST['keyword'];
      if($key_word !=""){
      $sql = "SELECT * FROM product WHERE pro_id='$key_word' or pro_name like '%$key_word%' or price <= '$key_word'
      ORDER BY pro_id limit {$start}, {$perpage} ";
      }else{
      $sql = "SELECT * FROM product ORDER BY pro_id limit {$start}, {$perpage} ";
      }


      $hand = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array( $hand )){
      $price = $row['price'];
      ?>


        <div class="m-4 bg-black text-white object-fill w-64 min-h-[5-rem] shadow-lg rounded-lg overflow-hidden transition ease-in-out delay-150 bg-black hover:-translate-x-1 hover:scale-105 duration-300 overflow-visible">
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

                  <div class="button mt-4 ">
                    <a href="show_product_detail.php?id=<?=$row['pro_id']?>" class="bg-rose-600 px-2 py-2 hover:bg-gray-600 rounded-md text-xs text-white cursor-pointer">รายละเอียด</a>
                  </div>
            </div>
          </div>
    
    <?php
     }
     //mysqli_close($conn);
    ?>
 </div> <!-- จบตาราง -->
 <?php
 $sql1 ="SELECT * FROM product ";
 $query1 = mysqli_query($conn,$sql1);
 $total_record = mysqli_num_rows($query1);
 $total_page = ceil($total_record / $perpage );
 ?>

<!-- Previous Button -->

<nav aria-label="Page navigation example">
  <ul class="flex justify-center m-4 text-white">
    <li><a href="show_product.php?page=1" class="px-3 py-2 bg-black rounded-l-full hover:bg-rose-600 dark:hover:text-white">หน้าแรก</a></li>
     <?php for($i=1;$i<=$total_page;$i++) {?>
    <li><a href="show_product.php?page=<?=$i?>" class="px-3 py-2 bg-black hover:bg-rose-600 dark:hover:text-white"><?=$i?></a></li>
    <?php } ?>
    <li><a href="show_product.php?page=<?=$total_page?>" class="px-3 py-2 rounded-r-full  bg-black hover:bg-rose-600 dark:hover:text-white">หน้าหลัง</a></li>
  </ul>
</nav>


<?php mysqli_close($conn); ?>

  </div>  <!-- จบเนื้อหา -->

<?php include 'footer.php' ?>
</body>
</html>