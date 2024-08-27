<?php
    $sql_lietke_bv = "SELECT * FROM baiviet ORDER BY id_baiviet DESC";
    $query_lietke_bv = mysqli_query($conn,$sql_lietke_bv); 
?>
<h2 class="page-title">Liệt kê bài viết</h2>
    <table class="post-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên bài viết</th>
                <th>Hình ảnh</th>
                <th>Nội dung</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 0;
                while ($row = mysqli_fetch_array($query_lietke_bv)){
                    $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['ten_baiviet'] ?></td>
                <td><img src="modules/quanlybv/uploads/<?php echo $row['hinhanh'] ?>" class="post-image"></td>
                <td><?php echo $row['nd_baiviet'] ?></td>
                <td class="action-icons">
                    <a href="modules/quanlybv/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>" class="icon-delete" title="Xóa">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a href="?action=quanlibaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>" class="icon-edit" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            <?php 
            } 
            ?>
        </tbody>
    </table>