<?php
include 'condb.php';
session_start();

$idpro = $_GET['id'];
$sql1 = "SELECT * FROM product WHERE pro_id='$idpro' ";
$result = mysqli_query($conn,$sql1);
$rs = mysqli_fetch_array($result);
$p_typeID=$rs['type_id']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Product</title>
</head>
<body>

    <div class="container mx-auto grid h-screen place-items-center">
        <div class="row bg-black rounded-lg p-20 w-6/12 drop-shadow-2xl">
        <div class="text-center text-3xl rounded-lg text-white font-bold mb-6">
            แกไขข้อมูลสินค้า
        </div>
                <form name="form1" method="post" action="update_product.php" enctype="multipart/form-data">
                    <label class="block text-white text-l font-bold m-2">รหัสสินค้า :</label>
                    <input type="text" name="proid" class="from-control rounded-lg w-full" readonly value=<?=$rs['fname']?> required>
                    <label class="block text-white text-l font-bold m-2">ชื่อสินค้า :</label>
                    <input name="pname" class="from-control rounded-lg w-full py-2 px-2" value=<?=$rs['lname']?> required>
                    <label class="block text-white text-l font-bold m-2">ประเภทสินค้า :</label>

                    <select class="form-select w-full rounded-lg py-2 px-2"  name="TypeIDf">
                    <?php
                    $sql="SELECT * FROM type ORDER BY type_name";
                    $hand=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($hand)){
                    $ttypeID = $row['type_id'];
                    ?>
                    <option value="<?=$row['type_id']?>" <?php if($p_typeID==$ttypeID){echo "selected=selecter";} ?> class="rounded_lg">
                    <?=$row['type_name']?></option>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>

                    </select>
                    <br>
                    <label class="block text-white text-sm font-bold m-2">รายละเอียด : </label>
                    <textarea type="text" name="detail" class="from-control rounded-lg w-full" value=<?=$rs['detail']?> ></textarea>
                    <label class="block text-white text-sm font-bold m-2">ราคา :</label>
                    <input type="text" name="price" class="from-control rounded-lg w-full" value=<?=$rs['price']?> >
                    <label class="block text-white text-sm font-bold m-2">จำนวน :</label>
                    <input type="text" name="num" class="from-control rounded-lg w-full" value=<?=$rs['amount']?> >
                    <label class="block text-white text-sm font-bold m-2">รูปภาพ :</label>
                    <img src="img/<?=$rs['image']?>" width="120">
                    <input class="rounded-lg border-2 bg-white w-full mt-2 bg-black" type="file" name="fileupload" >
                    <input type="hidden" name="textimg" class="from-control rounded-lg w-full" value=<?=$rs['image']?> >


                    <div class="pt-4">
                    <button type="submit" class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-3xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">อัพเดต</button>
                    <a class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-3xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" href="show_product_list.php" role="button">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>

</body>
</html>


