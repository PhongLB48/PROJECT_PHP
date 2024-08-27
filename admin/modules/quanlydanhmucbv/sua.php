<?php
    $sql_sua_danhmucbv = "SELECT * FROM danhmucbv WHERE id_danhmucbv='$_GET[iddanhmucbv]' LIMIT 1";
    $query_sua_danhmucbv = mysqli_query($conn,$sql_sua_danhmucbv); 
?>
<p>Sửa danh mục bài viết </p>
<table border="1px;" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucbv/xuly.php?iddanhmucbv=<?php echo $_GET['iddanhmucbv'] ?>"> 
        <?php
            while ($dong = mysqli_fetch_array($query_sua_danhmucbv)){
        ?>
        <tr>
            <td>Tên danh mục bài viết</td>
            <td><input type="text" value="<?php echo $dong['tdm_baiviet']?>" name="tendanhmucbv"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
        </tr>
        <tr>

            <td colspan="2"><input type="submit" name="suadanhmucbv" value="Cập nhật danh mục bài viết"></td>
        </tr>
        <?php }
        ?>
    </form>
</table>