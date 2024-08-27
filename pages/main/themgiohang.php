<?php  
    session_start();
    include('../../admin/config/config.php');
    //them soluong
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!= $id){
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> $cart_item['soluong'],
                        'giasp'=> $cart_item['giasp'],
                        'hinhanh'=>$cart_item['hinhanh'],
                        'tongtien'=> $cart_item['giasp'],
                        'masp'=> $cart_item['masp']);
                $_SESSION['cart']=$product;
            }else{
                $tangsoluong = $cart_item['soluong'] + 1;
                $thanhtien = $cart_item['giasp']*$tangsoluong;
                if($cart_item['soluong']< 10){
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> $tangsoluong,
                        'giasp'=> $cart_item['giasp'],
                        'hinhanh'=>$cart_item['hinhanh'],
                        'tongtien'=> $thanhtien,
                        'masp'=> $cart_item['masp']);
                }else{
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> $cart_item['soluong'],
                        'giasp'=> $cart_item['giasp'],
                        'hinhanh'=>$cart_item['hinhanh'],
                        'tongtien'=> $thanhtien,
                        'masp'=> $cart_item['masp']);
                }
                $_SESSION['cart']=$product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //tru sl
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!= $id){
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> 1,
                        'giasp'=> $cart_item['giasp'],
                        'hinhanh'=>$cart_item['hinhanh'],
                        'tongtien'=> $cart_item['giasp'],
                        'masp'=> $cart_item['masp']);
                $_SESSION['cart']=$product;
            }else{
                $giamsoluong = $cart_item['soluong'] - 1;
                $thanhtien = $cart_item['giasp']*$giamsoluong;
                if($cart_item['soluong']>= 2){
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> $giamsoluong,
                        'giasp'=> $cart_item['giasp'],
                        'hinhanh'=>$cart_item['hinhanh'],
                        'tongtien'=> $thanhtien,
                        'masp'=> $cart_item['masp']);
                }else{
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> $cart_item['soluong'],
                        'giasp'=> $cart_item['giasp'],
                        'hinhanh'=>$cart_item['hinhanh'],
                        'tongtien'=> $cart_item['giasp'],
                        'masp'=> $cart_item['masp']);
                }
                $_SESSION['cart']=$product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    // xóa từng sp
    if(isset($_SESSION['cart']) && $_GET['xoa']){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart']as $cart_item){
            if($cart_item['id']!= $id){
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                                    'id'=>$cart_item['id'],
                                    'soluong'=> $cart_item['soluong'],
                                    'giasp'=> $cart_item['giasp'],
                                    'tongtien'=> $cart_item['tongtien']-$thanhtien,
                                    'hinhanh'=>$cart_item['hinhanh'],
                                    'masp'=> $cart_item['masp']);
            }
            $_SESSION['cart']=$product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    //xoa all sanpham
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    //them sp vào giohang
    if(isset($_POST['themgiohang'])){
        $id=$_GET['idsanpham'];
        $soluong=1;
        $sql= " SELECT * from sanpham where id_sanpham='".$id."' LIMIT 1";
        $query= mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('tensanpham'=> $row['tensanpham'],
            'id'=>$id,
            'soluong'=> $soluong,
            'giasp'=> $row['giasp'],
            'tongtien'=> $row['giasp'],
            'hinhanh'=> $row['hinhanh'],
            'masp'=> $row['masp']));
            
            if(isset($_SESSION['cart'])){
                $found=false;
                foreach($_SESSION['cart'] as $cart_item){
                    //neu du lieu trng
                    if($cart_item['id']==$id){  //sl +1
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                                    'id'=>$cart_item['id'],
                                    'soluong'=> $cart_item['soluong']+1,
                                    'giasp'=> $cart_item['giasp'],
                                    'tongtien'=> $cart_item['giasp']*$cart_item['soluong'],
                                    'hinhanh'=>$cart_item['hinhanh'],
                                    'masp'=> $cart_item['masp']);
                        $found=true;
                    }else{ // neu không trùng thì tạo ra bảng dữ liệu giỏ hàng mới
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],
                        'soluong'=> $soluong,
                        'giasp'=> $cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'tongtien'=> $cart_item['giasp'],
                        'masp'=> $cart_item['masp']);
                    }
                }
                if($found==false){
                    $_SESSION['cart']=array_merge($product,$new_product); 
                }else{
                    $_SESSION['cart']=$product;
                }
            }else{
                $_SESSION['cart']= $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>

<?php /* <?php  
    session_start();
    include('../../admin/config/config.php');
    //thêm sản phẩm vào giỏ hàng
    if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1;
        // Thực hiện truy vấn
        $sql = "SELECT * FROM sanpham WHERE id_sanpham='".$id."' LIMIT 1";
        $query = mysqli_query($conn, $sql); // Thực hiện truy vấn và lưu kết quả vào $query
        
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_array($query); // Lấy hàng kết quả từ kết quả truy vấn
            if($row){
                $new_product = array(array(
                    'tensanpham' => $row['tensanpham'],
                    'id' => $id,
                    'soluong' => $soluong,
                    'giasp' => $row['giasp'],
                    'hinhanh' => $row['hinhanh'],
                    'masp' => $row['masp']
                ));

                if(isset($_SESSION['cart'])){
                    $found = false;
                    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
                    foreach($_SESSION['cart'] as $key => $product){
                        if($product['id'] == $id){
                            $_SESSION['cart'][$key]['soluong'] += $soluong;
                            $found = true;
                            break;
                        }
                    }
                    // Nếu sản phẩm chưa có trong giỏ hàng thì thêm mới
                    if($found == false){
                        $_SESSION['cart'] = array_merge($_SESSION['cart'], $new_product);
                    }
                } else {
                    $_SESSION['cart'] = $new_product;
                }
            }
        }
    }
?>
*/?>