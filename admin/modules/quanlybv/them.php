<h2 class="page-title">Thêm bài viết</h2>
    <div class="form-container">
        <form method="POST" action="modules/quanlybv/xuly.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenbv">Tên bài viết</label>
                <input type="text" id="tenbv" name="tenbv" required>
            </div>
            <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" required>
            </div>
            <div class="form-group">
                <label for="noidung">Nội dung</label>
                <textarea id="noidung" name="noidung" rows="5" required></textarea>
            </div>
            <button type="submit" name="thembaiviet" class="submit-button">Thêm bài viết</button>
        </form>
    </div>