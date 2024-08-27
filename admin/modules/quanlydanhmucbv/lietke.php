<?php
    $sql_lietke_danhmucbv = "SELECT * FROM danhmucbv ORDER BY thutu DESC";
    $query_lietke_danhmucbv = mysqli_query($conn,$sql_lietke_danhmucbv); 
?>
<p>Liệt kê danh mục bài viết</p>
<div class="table-container">
    <table>
        <tr>
            <th>Id</th>
            <th>Tên danh mục bài viết</th>
            <th>Quản lý</th>
        </tr>
        <?php 
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucbv)){
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tdm_baiviet'] ?></td>
            <td>
                <a href="?action=quanlidanhmucbaiviet&query=sua&iddanhmucbv=<?php echo $row['id_danhmucbv'] ?>" title="Sửa" class="icon-edit">
                    <i class="fas fa-edit"></i>
                </a> |
                <a href="modules/quanlydanhmucbv/xuly.php?iddanhmucbv=<?php echo $row['id_danhmucbv'] ?>" title="Xóa" class="icon-delete">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php 
        } 
        ?>
    </table>
</div>
