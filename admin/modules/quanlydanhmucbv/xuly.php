<?php
include('../../config/config.php');
    
    if(isset($_POST['themdanhmucbv']) || (isset($_POST['suadanhmucbv']))){
        $tendm_bv= $_POST['tendanhmucbv'];
        $thutu= $_POST['thutu'];
        if(isset($_POST['themdanhmucbv'])){
            $sql_Kt= "SELECT * FROM danhmucbv WHERE tdm_baiviet='".$tendm_bv."' ";
            $query=mysqli_query($conn,$sql_Kt);
            if(mysqli_num_rows($query)>0){
                $error = "Tên danh mục bài viết đã tồn tại!";
                echo "<script type='text/javascript'>alert('$error');</script>";
                echo "<script type='text/javascript'>window.location.href='../../index.php?action=quanlidanhmucsanpham&query=them';</script>";
                exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo
            }else{
            $sql_them = "INSERT INTO danhmucbv(tdm_baiviet,thutu) VALUE('".$tendm_bv."','".$thutu."')";
            mysqli_query($conn,$sql_them);
            }  
        }
        else{
            $id = $_GET['iddanhmucbv'];
            $sql_Kt= "SELECT * FROM `danhmucbv` WHERE tdm_baiviet='".$tendm_bv."' ";
            $query=mysqli_query($conn,$sql_Kt);
            $sql_Kt1= "SELECT * FROM `danhmucbv` WHERE tdm_baiviet='".$tendm_bv."' and id_danhmucbv='".$id."' ";
            $query1=mysqli_query($conn,$sql_Kt1);
            if(mysqli_num_rows($query)> 0 && mysqli_num_rows($query1)==0){
                $error = "Tên danh mục bài viết đã tồn tại!";
                echo "<script type='text/javascript'>alert('$error');</script>";
                echo "<script type='text/javascript'>window.location.href='../../index.php?action=quanlidanhmucsanpham&query=them';</script>";
                exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo
            }else{
            $sql_update = "UPDATE danhmucbv SET tdm_baiviet= '".$tendm_bv."' ,thutu='".$thutu."' WHERE id_danhmucbv='$_GET[iddanhmucbv]' ";
            mysqli_query($conn,$sql_update);
            }
        }
        
    }else{
        $id = $_GET['iddanhmucbv']; 
        $sql_xoa = "DELETE FROM danhmucbv WHERE id_danhmucbv='".$id."'";
        mysqli_query($conn,$sql_xoa);
    }
    header('Location:../../index.php?action=quanlidanhmucbaiviet&query=them');
?>