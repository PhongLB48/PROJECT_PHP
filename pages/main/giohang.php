<?php 
    session_start();
?>
<?php 
    if(isset($_SESSION['cart'])){
    }
?>
<div class="cart-container">
  <h3>Giỏ hàng</h3>

  <table  class="cart-table">
    <tr>
      <th>Id</th>
      <th>Mã sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Hình ảnh </th>    
      <th>Số lượng</th>
      <th>Giá sản phẩm</th>
      <th>Tổng tiền</th>
      <th>Quản lý</th>
    </tr>
  <?php 
      
      if(isset($_SESSION['cart'])){
        $i=0;
        $thanhtien=0;
          foreach($_SESSION['cart'] as $cart_item){
              $thanhtien+=$cart_item['tongtien'];
              $i++;
              
  ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $cart_item['masp']; ?></td>
      <td><?php echo $cart_item['tensanpham']; ?></td>
      <td><img src="././admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>"></td>
      <td>
          <div class="quantity-container">
             <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><button class="quantity-btn" >-</button></a>
              <input type="text" value="<?php echo $cart_item['soluong']; ?>" class="quantity-input" readonly>
              <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"> 
                <button class="quantity-btn">+</button></a>
          </div>
      </td>
      <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
      <td><?php echo number_format($cart_item['tongtien'],0,',','.').'vnđ'; ?></td>
      <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>" class="icon-delete" title="Xóa">
                        <i class="fas fa-trash"></i>
          </a>
        </td>
  </tr>
  <?php 
    }
  ?>
  <tr> 
      <td colspan="6" ><p>Tổng tiền hiện tại: <?php echo number_format($thanhtien,0,',','.').'vnđ'; ?> </p></td>
      <td colspan="2"><a href="pages/main/themgiohang.php?xoatatca=1" class="icon-delete" title="Xóa">
                        <i class="fas fa-trash"></i>Xóa tất cả
                      </a></td>
  </tr>
  <?php 
      }else{
  ?>
  <tr> 
      <td colspan="6"><p>Giỏ hàng hiện tại trống </p></td>
  </tr>
  <?php 
      }
  ?>
  </table>
</div>
