<?php
session_start();
?>

<header class="tieude">

   <div class="flex">

      <a href="3_homeAdmin.php" class="logo">Quản <span> Trị Viên</span></a>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
        
      </div>

      <nav class="thanhDH">
         <a href="3_homeAdmin.php">Trang chủ</a>
         <a href="4_AdminSP.php">Sản phẩm</a>
         <a href="5_AdminDH.php">Đơn hàng</a>
         <a href="6_TTsach.php">Thông tin sách</a>
         <a href="7_PhanHoi.php">Tin nhắn</a>
      </nav>

      

      <div class="taikhoan">
         <p>Tên tài khoản : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         
         <div><a href="2_dangnhap.php">Đăng xuất</a> | <a href="1_dangky.php">Đăng ký</a></div>
      </div>

     <!--  <div class="taikhoan">
   <?php if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_email'])): ?>
      <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
      <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
      <a href="logout.php" class="delete-btn">Đăng xuất</a>
   <?php else: ?>
      <p>username : <span>Không xác định</span></p>
      <p>email : <span>Không xác định</span></p>
   <?php endif; ?>
   <div><a href="Dangnhap.php">Đăng nhập khác</a> | <a href="dangKy.php">Đăng ký</a></div>
</div> -->

   </div>

</header>