<p>Chi tiết sản phẩm </p>
<?php
    $sql_chitiet = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc =danhmuc.id_danhmuc 
    and sanpham.id_sanpham='$_GET[id]'
    ORDER BY sanpham.id_sanpham LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
?>
<?php
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class = "wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img width="50%"  src="admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
        <div class="chitiet_sanpham">
            <p>Tên Sản Phẩm: <?php echo $row_chitiet['tensanpham'] ?></p>
            <p>Mã SP: <?php echo $row_chitiet['masp'] ?></p>
            <p>Giá: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ'?></p>
            <p>Số Lượng: <?php echo $row_chitiet['soluong'] ?></p>
            <p>Danh Mục: <?php echo $row_chitiet['ten_dm'] ?></p>
            <p><input class="themgiohang"type="submit" name="themgiohang" value="Thêm vào giỏ hàng"></p>
        </div>
    </form>
</div>
<?php 
    }
?>
