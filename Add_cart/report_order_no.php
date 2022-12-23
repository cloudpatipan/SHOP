<?php include 'condb.php'; 
session_start();
if(!isset($_SESSION["username"]))
    header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin K-TOY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<?php include 'menu1.php' ?>
            <!-- Navbar End -->

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">แสดงข้อมูลการสั่งซื้อสินค้า (ยกเลิกการสั่งซื้อ)</h6>
                        <a href="">Show All</a>
    
                    </div>

                    <div class="table-responsive">
                    <div class="float-left py-2">
                    <a href="report_order_yes.php"><button type="button" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">ชำระเงินแล้ว</button></a>
                    <a href="report_order.php"><buttun type="button" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">ยังไม่ชำระเงิน</button></a>
                    <a href="report_order_no.php"><button type="button" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">ยกเลิกการสั่งซื้อ</button></a>

                    </div>
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <tr class="text-white">
                                    <th scope="col">เลขที่ใบสั่งซื้อ</th>
                                    <th scope="col">ลูกค้า</th>
                                    <th scope="col">ที่อยู่จัดส่งสินค้า</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">ราคารวมสุทธิ</th>
                                    <th scope="col">วันที่สั่งซื้อ</th>
                                    <th scope="col">สถานะการสั่งซื้อ</th>
                                    <th scope="col">ยกเลิกการสั่งซื้อ</th>
                                </tr>
<?php

$sql = "SELECT * FROM tb_order WHERE order_status='0' order by reg_date DESC";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
$status = $row['order_status'];

?>
                                <tr>
                                    <td><?=$row['orderID']?></td>
                                    <td><?=$row['cus_name']?></td>
                                    <td><?=$row['address']?></td>
                                    <td><?=$row['telephone']?></td>
                                    <td><?=$row['total_price']?></td>
                                    <td><?=$row['reg_date']?></td>
                                    <td>

                                        <?php
                                    if($status == 1 ){
                                        echo "ยังไม่ชำระเงิน";
                                    }else if($status == 2){
                                        echo "<b style='color:blue' >ชำระเงินแล้ว </b>";
                                    }else if($status == 0){
                                        echo "<b style='color:red' >ยกเลิกการสั่งซื้อ </b>";
                                    }
                                        ?>

                                    <td class="py-3"><a href="cancel_order.php?id=<?=$row['orderID']?>" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded"
                                    onclick="del(this.href); return false;">ยกเลิก</a></td>
                              
                                </tr>
<?php
}
mysqli_close($conn);
?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
            
        <?php include 'footer.php' ?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<script>
    function del(mypage){ 
        var agree=confirm('คุณต้องการยกเลิกการสั่งซื้อสินค้าหรือไม่');
        if(agree){
            window.location=mypage;
        }

    }
</script>