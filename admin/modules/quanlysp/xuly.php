<?php
include('../../config/config.php');
    if(isset($_POST['themsanpham'] )||(isset($_POST['suasanpham']))){
        $tensanpham= $_POST['tensanpham'];
        $giasp= $_POST['giasp'];
        $soluong= $_POST['soluong'];
        // xu ly hinh anh
        $hinhanh= $_FILES['hinhanh']['name'];
        $hinhanh_tmp= $_FILES['hinhanh']['tmp_name'];
        $tomtat= $_POST['tomtat'];
        $noidung= $_POST['noidung'];
        $id_danhmuc= $_POST['danhmuc'];
        if(isset($_POST['themsanpham'] )){
            $masp= $_POST['masp'];
            $sql_Kt= "SELECT * from sanpham where tensanpham='".$tensanpham."' or masp='".$masp."' "; // KT bên trong sql đã có tên và mã sp chưa
            $query=mysqli_query($conn,$sql_Kt);
            if(mysqli_num_rows($query) > 0){ // trường hợp đã có , trả về số lượng hàng kết quả từ truy vấn $query.
                $error = "Tên hoặc mã sản phẩm đã tồn tại!";
                echo "<script type='text/javascript'>alert('$error');</script>";
                echo "<script type='text/javascript'>window.location.href='../../index.php?action=quanlidanhmucsanpham&query=them';</script>";
                exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo
            }else{ // không có thì thực hiện thêm
                $hinhanh= time().'_'.$hinhanh;
                $sql_them = "INSERT INTO sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
                VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."',1,'".$id_danhmuc."')";
                mysqli_query($conn,$sql_them);
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            }
           
        }else{
            $id = $_GET['idsanpham'];
            $sql_Kt1= "SELECT * from sanpham where tensanpham='".$tensanpham."' "; // KT bên trong sql trùng tên 
            $query1=mysqli_query($conn,$sql_Kt1); 
            $sql_Kt2= "SELECT * FROM `sanpham` WHERE tensanpham='".$tensanpham."' and id_sanpham='".$id."' "; // KT bên trong sql trùng id
            $query2=mysqli_query($conn,$sql_Kt2);
            if(mysqli_num_rows($query1) > 0 && mysqli_num_rows($query2)==0){ // trường hợp đã có 
                $error = "Tên sản phẩm đã tồn tại!";
                echo "<script type='text/javascript'>alert('$error');</script>";
                echo "<script type='text/javascript'>window.location.href='../../index.php?action=quanlidanhmucsanpham&query=them';</script>";
                exit(); // Kết thúc xử lý để tránh chạy lệnh header tiếp theo
            }else{ // các trường hợp đưuọc sửa (không trùng tên, trùng tên trùng id)
                $tinhtrang= $_POST['tinhtrang'];
                $sql = "SELECT * FROM sanpham WHERE id_sanpham= '$_GET[idsanpham]' LIMIT 1";
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
            $sql_update = "UPDATE sanpham SET 
            tensanpham= '".$tensanpham."' ,giasp='".$giasp."'
            ,soluong='".$soluong."',noidung='".$noidung."', hinhanh='".$hinhanh."',tinhtrang='".$tinhtrang."' ,id_danhmuc='".$id_danhmuc."' WHERE id_sanpham='$_GET[idsanpham]' ";
            mysqli_query($conn,$sql_update);
            if($hinhanh_tmp!=''){
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            }
        }
            }
           
    }else{
        $id = $_GET['idsanpham']; 
        $sql = "SELECT * FROM sanpham WHERE id_sanpham= '$id' LIMIT 1";
        $query= mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
            if($row['hinhanh']!=''){
                unlink('uploads/'.$row['hinhanh']);
            }
        }
        $sql_xoa = "DELETE FROM sanpham WHERE id_sanpham='".$id."' ";
        mysqli_query($conn,$sql_xoa);
    }          
    header('Location:../../index.php?action=quanlisanpham&query=them')

?>