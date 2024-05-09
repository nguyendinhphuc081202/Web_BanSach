
<?php
session_start();
// $user_id = $_SESSION['user_id'];
?>


<header class="tieude">

   

   <div class="tieude-2">
      <div class="flex">
        
          <!-- <a href="Trangbanhang.php" class="logo">Hiệu sách<span> Ký ức</span></a> -->
          <a href="8_homeUser.php"><img src="0_gop-y-vn.png" alt="Góp Ý"></a>


         <nav class="thanhDH">
            <a href="8_homeUser.php">Trang chủ</a>
          <!--   <a href="about.php">Thông tin</a> -->
            <a href="9_tusach.php">Tủ sách</a>
            <a href="a_lienhe.php">Liên hệ</a>
            <a href="b_tinhtrangDH.php">Đơn hàng</a>
         </nav>

         <div class="icons">
            <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
            <a href="search_page.php" class="fas fa-search"></a>
            <!-- <div id="user-btn" class="fas fa-user"></div> -->

          <!--   <?php

               $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');

               $select_cart_number = mysqli_query($conn, "SELECT * FROM `giohang` ") or die('query failed');
               
               $cart_rows_number = mysqli_num_rows($select_cart_number); 

            
            ?> -->
            <a href="c_giohang.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a> 
         </div>

         <div class="taikhoan">
         <p>Tên tài khoản : <span><?php echo $_SESSION['user_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
         
         <div><a href="2_dangnhap.php">Đăng xuất</a> | <a href="1_dangky.php">Đăng ký</a></div>
      </div>
      
   
   
      </div> 
   </div>


</header>