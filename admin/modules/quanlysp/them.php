<p>Thêm sản phẩm</p>
<div class="form-container">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tensanpham">Tên sản phẩm</label>
            <input type="text" id="tensanpham" name="tensanpham" required>
        </div>
        <div class="form-group">
            <label for="masp">Mã sản phẩm</label>
            <input type="text" id="masp" name="masp" required>
        </div>
        <div class="form-group">
            <label for="giasp">Giá sản phẩm</label>
            <input type="text" id="giasp" name="giasp" required>
        </div>
        <div class="form-group">
            <label for="soluong">Số lượng</label>
            <input type="text" id="soluong" name="soluong" required>
        </div>
        <div class="form-group">
            <label for="hinhanh">Hình sản phẩm</label>
            <input type="file" id="hinhanh" name="hinhanh" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="tomtat">Tóm tắt</label>
            <textarea id="tomtat" name="tomtat" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="noidung">Nội dung</label>
            <textarea id="noidung" name="noidung" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <select name= "danhmuc">
            <?php   
                $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($conn,$sql_danhmuc); 
                while($row_danhmuc= mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['ten_dm']?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="submit-btn">
        </div>
    </form>
</div>

