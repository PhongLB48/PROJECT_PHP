<?php
    $sql_sua_danhmucsp = "SELECT * FROM danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($conn,$sql_sua_danhmucsp); 
?>
<p class="form-title">Sửa danh mục sản phẩm</p>
<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" class="form-container"> 
    <?php while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) { ?>
        <div class="form-group">
            <label for="tendanhmuc">Tên danh mục</label>
            <input type="text" id="tendanhmuc" value="<?php echo $dong['ten_dm']?>" name="tendanhmuc">
        </div>
        <div class="form-group">
            <label for="thutu">Thứ tự</label>
            <input type="text" id="thutu" value="<?php echo $dong['stt']?>" name="thutu">
        </div>
        <div class="form-group">
            <button type="submit" name="suadanhmuc" class="btn-submit">
                <i class="fas fa-save"></i> Sửa danh mục sản phẩm
            </button>
        </div>
    <?php } ?>
</form>
