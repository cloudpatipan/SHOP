<?php include 'condb.php'; 
session_start();
if(!isset($_SESSION["username"]))
    header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Admin</title>
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include 'menu1.php' ?>
    
    <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>K-TOY</h3>
                            </a>
                            <h3>สมัครสมาชิก</h3>
                        </div>
                        <form name="form1" method="post" action="insert_register.php" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                        <input type="text" name="firstname" class="form-control" id="floatingText" placeholder="ชื่อ"  required>
                            <label for="floatingText">ชื่อ</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" name="lastname" class="form-control" id="floatingText" placeholder="นามสกุล"  required>
                            <label for="floatingInput">นามสกุล</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="number" name="phone" class="form-control" id="floatingText" placeholder="เบอร์โทรศัพท์"  required>
                            <label for="floatingInput">เบอร์โทรศัพท์</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="floatingText" placeholder="Username"  required>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="floatingText" placeholder="Password"  required>
                            <label for="floatingPassword">รหัสผ่าน</label>
                            
                        <div class="mb-4 mt-3">
                        <div>
                        <label for="floatingImage">รูปภาพ</label>
                        </div>
                        <input type="file" name="fileupload" class="form-control" id="floatingText" placeholder="Password"  required>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">เช็คตัวตน</label>
                            </div>
                            <a href="">ลืมรหัสผ่าน</a>
                        </div>
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 mb-2 border-b-4 border-red-700 hover:border-red-500 rounded">ลงทะเบียน</button>
                        <p class="text-center mb-0">คุณมีบัญชีอยู่แล้วใช่หรือไม่? <a href="login.php" class="text-red-500">เข้าสู่ระบบ</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sign Up End -->
            <?php include 'footer.php' ?>

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