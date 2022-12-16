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
        <div class="grid grid-cols-4 mx-40 mt-4 ">
            <?php
            include 'condb.php';
          //คำสั่งแบ่งหน้าเพจ
          $perpage = 8;
          if(isset($_GET['page'])){
            $page = $_GET['page'];

          }else{
            $page = 1;
          }
          $start = ($page -1) * $perpage;

            //คำสั่งเแสงข้อมูล
            $sql = "SELECT * FROM product ORDER BY pro_id limit {$start}, {$perpage} ";
            $hand = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array( $hand )){
            $price = $row['price'];

            ?>

<div class="mb-4 bg-black text-white object-fill w-64 min-h-[5-rem] shadow-lg rounded-md overflow-hidden transition ease-in-out delay-150 bg-black hover:-translate-x-1 hover:scale-105 duration-300 ">
      <img class="w-64 h-60 object-cover" src="img/<?=$row['image']?>" alt="">

      <div class="p-5 flex-col gap3">
        <span class="badge px-3 py-1 rounded-full text-xs bg-rose-600">มีสินค้า</span>
        <span class="badge px-3 py-1 rounded-full text-xs bg-rose-600">สินค้าตรง</span>

            <h2 class=" product-title font-bold text-2xl overflow-ellipsis whitespace-nowrap">
          <?=$row['pro_id']?>
          </h2>
          <h2 class="product-title font-bold text-xl overflow-ellipsis whitespace-nowrap">
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

        <?php
        $sql1 ="SELECT * FROM product ";
        $query1= mysqli_query($conn,$sql1);
        $total_record = mysqli_num_rows($query1);
        $total_page = ceil($total_record / $perpage );
        ?>

        <nav aria-lable="Page navigation example">
          <ul class="pagition">
              <li class="page-item"><a class="page-link" href="show_product">Previous</a></li>
              <?php for($i=1;$i<=$total_page;$i++) {?>
              <li class="page-item"><a class="page-link" href="show_product.php?page=<?=$i?>"><?=$i?></a></li>
              <?php } ?>
              <li class="page-item"><a class="page-link" href="show_product.php?page=<?=$total_page?>">Next</a></li>
          </ul>

        </nav>

        <?php mysqli_close($conn); ?>

    </div>

    <?php include 'footer.php'; ?>
    
</body>
</html>