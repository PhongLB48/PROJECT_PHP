<?php
session_start();
if (isset($_SESSION['dangnhapthanhcong']) && isset($_SESSION['dangnhapthanhcong'])==true) {
include('../../config/config.php');
    if(isset($_POST['thembaiviet'] )||(isset($_POST['suabaiviet']))){
        $tenbaiviet= $_POST['tenbv'];
        // xu ly hinh anh
        $hinhanh= $_FILES['hinhanh']['name'];
        $hinhanh_tmp= $_FILES['hinhanh']['tmp_name'];
        $noidung= $_POST['noidung'];
        if(isset($_POST['thembaiviet'] )){
        $sql_them = "INSERT INTO baiviet(ten_baiviet,hinhanh,nd_baiviet) 
        VALUE('".$tenbaiviet."','".$hinhanh."','".$noidung."')";
        mysqli_query($conn,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        }else{
            $sql = "SELECT * FROM baiviet WHERE id_baiviet= '$_GET[idbaiviet]' LIMIT 1";
            $query= mysqli_query($conn,$sql);
            if($hinhanh!=''){
                while($row = mysqli_fetch_array($query)){
                    if($row['hinhanh']!=''){
                        unlink('uploads/'.$row['hinhanh']);
                    }
                }
            $hinhanh= time().'_'.$hinhanh;
            }else{
                while($row = mysqli_fetch_array($query)){
                    if($row['hinhanh']!=''){
                        $hinhanh = $row['hinhanh'];
                    }
                }
            }
            $sql_update = "UPDATE baiviet SET 
            ten_baiviet= '".$tenbaiviet."', hinhanh='".$hinhanh."', noidung='".$noidung."'  WHERE id_baiviet='$_GET[idbaiviet]' ";
            mysqli_query($conn,$sql_update);
            if($hinhanh_tmp!=''){
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            }
        }
    }else{
        $id = $_GET['idbaiviet']; 
        $sql = "SELECT * FROM baiviet WHERE id_baiviet= '$id' LIMIT 1";
        $query= mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
            if($row['hinhanh']!=''){
                unlink('uploads/'.$row['hinhanh']);
            }
        }
        $sql_xoa = "DELETE FROM baiviet WHERE id_baiviet='".$id."' ";
        mysqli_query($conn,$sql_xoa);
    }          
    header('Location:../../index.php?action=quanlibaiviet&query=them')
}else{
    $error = "Vui lòng đăng nhập tài khoản!";
    echo "<script type='text/javascript'>alert('$error');</script>";
    echo "<script type='text/javascript'>window.location.href='login.php';</script>";
    exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo    
}
?>