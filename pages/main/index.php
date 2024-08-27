<?php
    $sql_pro = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc =danhmuc.id_danhmuc ORDER BY sanpham.id_sanpham DESC LIMIT 25";
    $query_pro = mysqli_query($conn,$sql_pro);
?>
<h3> Mẫu Vest thịnh hành</h3>
<div id="main">
    <ul class="list_sanpham">
        <?php 
            while($row= mysqli_fetch_array($query_pro)){ 
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>"> 
                <img src="admin/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" >
                <p class="title_sanpham"><?php echo $row['tensanpham']?> </p>
                <p class= "title_gia">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
                <p><?php echo $row['ten_dm'] ?> </p>
            </a>
        </li>
        <?php 
            }
        ?>

    </ul>
</div>