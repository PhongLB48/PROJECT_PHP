<?php
    $sql_lietke_sp = "SELECT * FROM sanpham,danhmuc where sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($conn,$sql_lietke_sp); 
?>
<p>Liệt Kê Danh Mục Sản Phẩm</p>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình ảnh</th>
                <th>Mã SP</th>
                <th>Giá SP</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Tóm tắt</th>
                <th>Tình trạng</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sp)){
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tensanpham'] ?></td>
                <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="Hình ảnh sản phẩm"></td>
                <td><?php echo $row['masp'] ?></td>
                <td><?php echo number_format($row['giasp'], 0, ',', '.') ?> VNĐ</td>
                <td><?php echo $row['soluong'] ?></td>
                <td><?php echo $row['ten_dm'] ?></td>
                <td><?php echo $row['tomtat'] ?></td>
                <td>
                    <?php echo $row['tinhtrang'] == 1 ? 'Kích hoạt' : 'Ẩn'; ?>
                </td>
                <td>
                    <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" class="icon-delete" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </a>
                    <a href="?action=quanlisanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>" class="icon-edit" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            <?php 
            } 
            ?>
        </tbody>
    </table>
</div>
