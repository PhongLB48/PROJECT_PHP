<?php
    $sql_sua_sp = "SELECT * FROM sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($conn,$sql_sua_sp); 
?>
<p class="form-title">Sửa sản phẩm</p>
<div class="form-container">
    <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
        <?php
            while ($dong = mysqli_fetch_array($query_sua_sp)){
        ?>
        <div class="form-group">
            <label for="tensanpham">Tên sản phẩm</label>
            <input type="text" id="tensanpham" name="tensanpham" value="<?php echo $dong['tensanpham']?>" required>
        </div>
        <div class="form-group">
            <label for="masp">Mã sản phẩm</label>
            <input type="text" id="masp" name="masp" value="<?php echo $dong['masp']?>" disabled>
        </div>
        <div class="form-group">
            <label for="giasp">Giá sản phẩm</label>
            <input type="text" id="giasp" name="giasp" value="<?php echo $dong['giasp']?>" required>
        </div>
        <div class="form-group">
            <label for="soluong">Số lượng</label>
            <input type="text" id="soluong" name="soluong" value="<?php echo $dong['soluong']?>" required>
        </div>
        <div class="form-group">
            <label for="hinhanh">Hình sản phẩm</label>
            <div class="image-upload">
                <img src="modules/quanlysp/uploads/<?php echo $dong['hinhanh'] ?>" alt="Product Image" />
                <input type="file" id="hinhanh" name="hinhanh" accept="image/*">
            </div>
        </div>
        <div class="form-group">
            <label for="tomtat">Tóm tắt</label>
            <textarea id="tomtat" name="tomtat" rows="5" required><?php echo $dong['tomtat']?></textarea>
        </div>
        <div class="form-group">
            <label for="noidung">Nội dung</label>
            <textarea id="noidung" name="noidung" rows="5" required><?php echo $dong['noidung']?></textarea>
        </div>
        <div class="form-group">
            <select name= "danhmuc">
            <?php   
                $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($conn,$sql_danhmuc); 
                while($row_danhmuc= mysqli_fetch_array($query_danhmuc)){
                    if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"> <?php echo $row_danhmuc['ten_dm'] ?>
            </option>
            <?php 
                }else{
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['ten_dm']?></option>
            <?php 
                }
            } 
            ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tình trạng</label>
            <div class="radio-group">
                <input type="radio" id="kichhoat" name="tinhtrang" value="1" <?php echo $dong['tinhtrang'] == 1 ? 'checked' : ''; ?>>
                <label for="kichhoat">Kích hoạt</label>
                <input type="radio" id="an" name="tinhtrang" value="0" <?php echo $dong['tinhtrang'] == 0 ? 'checked' : ''; ?>>
                <label for="an">Ẩn</label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="suasanpham" value="Sửa sản phẩm" class="submit-btn">
        </div>
        <?php
            }
        ?>
    </form>
</div>


