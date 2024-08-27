<?php 
    session_start();
    if (isset($_SESSION['dangnhapthanhcong']) && isset($_SESSION['dangnhapthanhcong'])==true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/chatpgt.css">
    <link rel="stylesheet" href="C:\xampp\htdocs\ckeditor_4.25.0-lts_standard_easyimage.zip\ckeditor/contents.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admincp</title>
</head>
<body>
    <h3 class="tieude_trang">Chào mừng tới với Trang Quản Trị TTTK TAV </h3>
    <a href="logout.php" style="float:right">Đăng xuất </a>
    <div class="wrapper">
        <?php
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");  
            include("modules/main.php"); 
            include("modules/footer.php");      
        ?>
    </div>
</body>
</html>
<?php 
}else{
    $error = "Vui lòng đăng nhập tài khoản!";
    echo "<script type='text/javascript'>alert('$error');</script>";
    echo "<script type='text/javascript'>window.location.href='login.php';</script>";
    exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo    
}
?>