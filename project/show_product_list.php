<?php include 'condb.php'; ?>
<?php
session_start();
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
    <script src="sweetalert2/sweetalert2@11.js"></script>
    <title>Product List</title>
</head>
<body>
    <div class="container mx-auto">
    <div class="bg-black text-center text-3xl p-4 my-4 rounded-lg text-white">
            ข้อมูลสินค้า
        </div>
        <a class="inline-block px-6 py-4 border-2 border-black text-black font-bold text-3xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out mb-4" href="fr_product.php" role="button">เพิ่มสินค้า+</a>
    <table class="w-full">
        <tr class="text-2xl text-center uppercase bg-black text-white ">
            <th class="border border-slate-600">รหัสสินค้า</th>
            <th class="border border-slate-600">ชื่อสินค้า</th>
            <th class="border border-slate-600">ประเภท</th>
            <th class="border border-slate-600">รายละเอียด</th>
            <th class="border border-slate-600">ราคา</th>
            <th class="border border-slate-600">จำนวน</th>
            <th class="border border-slate-600">รูปภาพ</th>
            <th class="border border-slate-600 px-2">แก้ไข</th>
            <th class="border border-slate-600 px-2">ลบ</th>
        </tr>
<?php
include 'condb.php';

//คำสั่งแบ่งหน้าเพจ

//คำสั่งแสดงข้อมูล
$sql="SELECT * FROM product ,type WHERE product.type_id =type.type_id ";
$hand = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
?>


<tr >
    <td class="border border-slate-600 text-center"><?=$row['pro_id']?></td>
    <td class="border border-slate-600 text-center"><?=$row['pro_name']?></td>
    <td class="border border-slate-600 text-center"><?=$row['type_name']?></td>
    <td class="border border-slate-600"><?=$row['detail']?></td>
    <td class="border border-slate-600 text-center"><?=$row['price']?></td>
    <td class="border border-slate-600 text-center"><?=$row['amount']?></td>
    <td class="border border-slate-600 text-center"><img src="img/<?=$row['image']?>" width="80px" hieght="100px"></td>
    <td class="border border-slate-600 text-center"><a href="edit_product.php?id=<?=$row['pro_id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="orange" class="mx-auto" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</svg>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
    <td class="border border-slate-600 text-center"><a href="delete_product.php?id=<?=$row['pro_id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="mx-auto" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
</svg></a> </td>
</tr>

<?php
}
mysqli_close($conn);
?>
    </table>
    </div>
</body>
</html>

<?php
// ป็อปอัพ ลบข้อมูล
if(isset($_SESSION['success'])){ ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'ลบข้อมูลสำเร็จ',
  text: '<?=$_SESSION['success']?>',
})
</script>
<?php
unset($_SESSION['success']);
}
?>

<?php
if(isset($_SESSION['error'])){ ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'บันทึกข้อมูลไม่สำเร็จ',
  text: '<?=$_SESSION['error']?>',
})
</script>
<?php
unset($_SESSION['error']);
}
?>

<?php
if(isset($_SESSION['success'])){ ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'ลบข้อมูลสำเร็จ',
  text: '<?=$_SESSION['success']?>',
})
</script>
<?php
unset($_SESSION['success']);
}
?>

<?php
if(isset($_SESSION['error'])){ ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'บันทึกข้อมูลไม่สำเร็จ',
  text: '<?=$_SESSION['error']?>',
})
</script>
<?php
unset($_SESSION['error']);
}
?>

<?php
// ป็อปอัพ แก้ไขข้อมูล
if(isset($_SESSION['success_edit'])){ ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'แก้ไขข้อมูลสำเร็จ',
  text: '<?=$_SESSION['success_edit']?>',
})
</script>
<?php
unset($_SESSION['success_edit']);
}
?>

<?php
if(isset($_SESSION['error_edit'])){ ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'แก้ไขข้อมูลไม่สำเร็จ',
  text: '<?=$_SESSION['error_edit']?>',
})
</script>
<?php
unset($_SESSION['error_edit']);
}
?>