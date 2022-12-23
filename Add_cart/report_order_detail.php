<?php include 'condb.php'; 
$ids=$_GET['id'];
session_start();
if(!isset($_SESSION["username"]))
    header("location:login.php");
?>

<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>

<body>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">แสดงรายการสินค้า</h6>
                        <a href="">Show All</a>
                    </div>

                    <div class="table-responsive">
                    <div class="float-left py-2">

                    <a href="report_order.php"><button type="button" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">กลับหน้าหลัก</button></a>
                </div>
                            
                <h5>เลขที่ใบสั่งซื้อ : <?=$ids?></h5>
                    
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                    

                                <tr class="text-white">
                                
                                    <th scope="col">รหัสสินค้า</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคารวม</th>
                                </tr>
<?php


$sql ="select * from order_detail d, product p,tb_order t where d.orderID=t.orderID
and d.pro_id=p.pro_id and d.orderID='$ids' order by d.pro_id ";
$result = mysqli_query($conn,$sql);
$sum_total=0;
while($row=mysqli_fetch_array($result)){ 
    $sum_total=$row['total_price'];

?>
                                <tr>
                                    <td><?=$row['pro_id']?></td>
                                    <td><?=$row['pro_name']?></td>
                                    <td><?=$row['orderPrice']?></td>
                                    <td><?=$row['orderQty']?></td>
                                    <td><?=$row['Total']?></td>
                                
                              
                                </tr>
<?php
}
mysqli_close($conn);
?>
                        </table>
                        <b class="float-left mt-4">ราคารวมสุทธิ <?=number_format($sum_total,2)?></b>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            <!-- Widgets End -->


            <!-- Footer Start -->
          <?php include 'footer.php'; ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


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
    </div>