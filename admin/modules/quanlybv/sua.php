<?php
    $sql_sua_bv = "SELECT * FROM baiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_bv = mysqli_query($conn,$sql_sua_bv); 
?>
<p class="form-title">Sửa bài viết</p>
<div class="form-container">
    <form method="POST" action="modules/quanlybv/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" enctype="multipart/form-data">
        <?php
            while ($dong = mysqli_fetch_array($query_sua_bv)){
        ?>
        <div class="form-group">
            <label for="tenbv">Tên bài viết</label>
            <input type="text" id="tenbv" name="tenbv" value="<?php echo $dong['ten_baiviet']?>" required>
        </div>
        <div class="form-group">
            <label for="hinhanh">Hình bài viết</label>
            <div class="image-upload">
                <img src="modules/quanlybv/uploads/<?php echo $dong['hinhanh'] ?>" alt="Article Image" />
                <input type="file" id="hinhanh" name="hinhanh" accept="image/*">
            </div>
        </div>
        <div class="form-group">
            <label for="noidung">Nội dung</label>
            <textarea id="noidung" name="noidung" rows="5" required><?php echo $dong['nd_baiviet']?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="suabaiviet" value="Cập nhật bài viết" class="submit-btn">
        </div>
        <?php
            }
        ?>
    </form>
</div>

