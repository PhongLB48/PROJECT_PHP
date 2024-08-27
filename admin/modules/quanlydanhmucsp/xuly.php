<?php
include('../../config/config.php');

if(isset($_POST['themdanhmuc']) || (isset($_POST['suadanhmuc']))){
    $ten_loaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    
    if(isset($_POST['themdanhmuc'])){
        $sql_Kt = "SELECT * FROM `danhmuc` WHERE ten_dm='".$ten_loaisp."' "; // Tìm tên danh mục
        $query = mysqli_query($conn, $sql_Kt);
        
        if(mysqli_num_rows($query) > 0){ // Đã có tên danh mục, hiển thị lỗi
            $error = "Tên danh mục sản phẩm đã tồn tại!";
            echo "<script type='text/javascript'>alert('$error');</script>";
            echo "<script type='text/javascript'>window.location.href='../../index.php?action=quanlidanhmucsanpham&query=them';</script>";
            exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo
        } else { // Thực hiện thêm vào csdl
            $sql_them = "INSERT INTO danhmuc(ten_dm, stt) VALUE('".$ten_loaisp."', '".$thutu."')";
            mysqli_query($conn, $sql_them);
        }
    } else {
        $id = $_GET['iddanhmuc'];
        $sql_Kt = "SELECT * FROM `danhmuc` WHERE ten_dm='".$ten_loaisp."' ";
        $query = mysqli_query($conn, $sql_Kt);
        $sql_Kt1 = "SELECT * FROM `danhmuc` WHERE ten_dm='".$ten_loaisp."' and id_danhmuc='".$id."' ";
        $query1 = mysqli_query($conn, $sql_Kt1);
        
        if(mysqli_num_rows($query) > 0 && mysqli_num_rows($query1) == 0){
            $error = "Tên danh mục sản phẩm đã tồn tại!";
            echo "<script type='text/javascript'>alert('$error');</script>";
            echo "<script type='text/javascript'>window.location.href='../../index.php?action=quanlidanhmucsanpham&query=them';</script>";
            exit();
        } else {
            $sql_update = "UPDATE danhmuc SET ten_dm= '".$ten_loaisp."' ,stt='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]' ";
            mysqli_query($conn, $sql_update);
        }
    }
} else {
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($conn, $sql_xoa);
}

header('Location: ../../index.php?action=quanlidanhmucsanpham&query=them');
exit();
?>
