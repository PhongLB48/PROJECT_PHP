<?php
    $sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($conn,$sql_pro);

    // get ten dm
    $sql_cate = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc = '$_GET[id]' limit 1";
    $query_cate = mysqli_query($conn,$sql_cate);
    $row_title= mysqli_fetch_array($query_cate);
?>

<h3> Danh sách sản phẩm: <?php echo $row_title['ten_dm'] ?></h3>
<ul class="list_sanpham">
        <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){ 
        ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
        <img src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" >
        <p class="title_sanpham"> <?php echo $row_pro['tensanpham']?> </p>
        <p class= "title_gia">Giá: <?php echo number_format($row_pro['giasp'],0,',','.').'vnđ'?></p>
        </a>
    </li> 
    <?php } ?>    
</ul>