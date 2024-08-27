<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $tk=$_POST['username'];
        $mk=md5($_POST['password']);
        $sql= ("SELECT * FROM `admin` WHERE ten_admin='".$tk."' and mk_admin='".$mk."' ");
        $query_kt=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query_kt) > 0){
            // có thể lưu thông tin người dùng sau khi đăng nhập thành công bằng cách tạo $_sesion (VD lưu id người dùng: $_SESSION['id]= $row['id'])
            $_SESSION['dangnhapthanhcong']=true;
            $thongbao = "Đăng nhập thành công";
            echo "<script type='text/javascript'>alert('$thongbao');</script>";
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
            exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo
           
        }else{
            $error = "Tài khoản đăng nhập chưa có hoặc sai mật khẩu!";
            echo "<script type='text/javascript'>alert('$error');</script>";
            echo "<script type='text/javascript'>window.location.href='login.php';</script>";
            exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo    
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login TTTK TAV</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
</head>
<body>
    <div class="login">
        <h2>Admin Login TTTK TAV</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="dangnhap" value="Đăng nhập" class="submit-btn">Login</button>
        </form>
    </div>
</body>
</html>
