<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
</head>

<body>
<?php include 'menu1.php' ?>


 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">แสดงข้อมูลการสั่งซื้อสินค้า (ยังไม่ได้ชำระเงิน)</h6>
                        <a href="">Show All</a>
                    </div>
                    
<form name="form1" method="POST" action="report_order.php">
<div class="row">
    <div class="col-sm-2 "> 
    <input type="date" name="dt1" class="form-control">
</div>

<div class="col-sm-2">
    <input type="date" name="dt2" class="form-control">
</div>

<div class="col-sm-1">
<button type="submit" class="btn btn-outline-success">ค้นหา</button>
</div>
</div>
</form>

                    <div class="table-responsive">
              
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <tr class="text-white">
                                    <th scope="col">เลขที่ใบสั่งซื้อ</th>
                                    <th scope="col">ลูกค้า</th>
                                    <th scope="col">ที่อยู่จัดส่งสินค้า</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">ราคารวมสุทธิ</th>
                                    <th scope="col">วันที่สั่งซื้อ</th>
                                    <th scope="col">สถานะการสั่งซื้อ</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">ปรับสถานะการชำระเงิน</th>
                                    <th scope="col">ยกเลิกการสั่งซื้อ</th>
                                </tr>
<?php
$ddt1=@$_POST['dt1'];
$ddt2=@$_POST['dt2'];
$add_date= date('Y/m/d', strtotime($ddt2 . "+1 days"));

if(($ddt1 != "") & ($ddt2 != "")){
   echo "ค้าหาจากวันที่ $ddt1 ถึง $ddt2 " ;
   $sql ="SELECT * FROM tb_order WHERE order_status='1' and reg_date BETWEEN '$ddt1' and '$add_date'
   order by reg_date DESC";
}else{
    $sql ="SELECT * FROM tb_order WHERE order_status='1' order by reg_date DESC";
}

$sql = "SELECT * FROM tb_order WHERE order_status='1' order by reg_date DESC";
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

                                    </td>
                                    <td><a href="report_order_detail.php?id=<?=$row['orderID']?>" class="btn btn-success m-2"
                                    return false;>รายละเอียด</a></td>

                                    <td><a href="pay_order.php?id=<?=$row['orderID']?>" class="btn btn-warning m-2"
                                    onclick="del1(this.href); return false;">ปรับสถานะ</a></td>

                                    <td><a href="cancel_order.php?id=<?=$row['orderID']?>" class="btn btn-primary m-2"
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



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
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

</html>