<?php
if(isset($_POST['timkiem'])){ 
    $tukhoa= $_POST['tukhoa'];
    
    // Chuẩn bị câu lệnh SQL an toàn với SQL Injection
    $sql_pro = $conn->prepare("SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc and sanpham.tensanpham LIKE ?");
    
    // Thêm ký tự % vào từ khóa tìm kiếm để tìm kiếm theo chuỗi
    $timkiem = "%".$tukhoa."%";
    
    // Liên kết tham số
    $sql_pro->bind_param("s", $timkiem);
    
    // Thực thi câu lệnh
    $sql_pro->execute();
    
    // Nhận kết quả truy vấn
    $query_pro = $sql_pro->get_result();
}
?>
<h3>Từ khóa tìm kiếm: <?php echo htmlspecialchars($_POST['tukhoa'], ENT_QUOTES, 'UTF-8') ?> </h3>
<div id="main">
    <ul class="list_sanpham">
        <?php 
            while($row = $query_pro->fetch_assoc()){ 
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>"> 
                <img src="admin/modules/quanlysp/uploads/<?php echo htmlspecialchars($row['hinhanh'], ENT_QUOTES, 'UTF-8') ?>" >
                <p class="title_sanpham"><?php echo htmlspecialchars($row['tensanpham'], ENT_QUOTES, 'UTF-8') ?> </p>
                <p class="title_gia">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
                <p>Danh mục: <?php echo htmlspecialchars($row['ten_dm'], ENT_QUOTES, 'UTF-8') ?> </p>
            </a>
        </li>
        <?php 
            }
        ?>
    </ul>
</div>
