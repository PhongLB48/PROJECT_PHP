<?php
    $sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY stt DESC";
    $query_lietke_danhmucsp = mysqli_query($conn,$sql_lietke_danhmucsp); 
?>
<p>Liệt Kê Danh Mục Sản Phẩm</p>
<table>
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php 
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ten_dm'] ?></td>
        <td>
            <a href="?action=quanlidanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>" title="Sửa" class="icon-edit">
                <i class="fas fa-edit"></i>
            </a> |
            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>" title="Xóa" class="icon-delete">
                <i class="fas fa-trash"></i>
            </a>
        </td>
    </tr>
    <?php 
    } 
    ?>
</table>


