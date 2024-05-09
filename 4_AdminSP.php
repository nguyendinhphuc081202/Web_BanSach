<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sản phẩm</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <link rel="stylesheet" href="3_homeAdmin.css">
   
     <link rel="stylesheet" href="4_AdminSP.css">
</head>
<body>

	<?php 
			include 'z_menuAdmin.php';
			include '4_dulieuSP.php';
	?>

		<section class="themSP">

	   		<h1 class="title">Cửa hàng sản phẩm</h1>

	   	<form action="" method="post" enctype="multipart/form-data">

	      	<h3>Thêm sản phẩm</h3>

	      	<input type="text" name="name" class="hop" placeholder="Nhập tên sản phẩm" required>

            <input type="text" name="tacgia" class="hop" placeholder="Nhập tên tác giả" required>

	      	<input type="number" min="0" name="gia" class="hop" placeholder="Nhập giá sản phẩm (VND)" required>
	      	
            <textarea name="thongtin" class="hop" placeholder="Nhập thông tin sách" id="" cols="30" rows="10"></textarea>

	     	   <input type="file" name="anh" accept="image/jpg, image/jpeg, image/png" class="hop" required>

	      	<input type="submit" value="Thêm sản phẩm" name="themSP" class="btnn">

	   	</form>

	</section>

<!-- ================================================================================================================================ -->
<!-- ================================================================================================================================ -->
<!-- ================================================================================================================================ -->

<section class="showSP">

   <div class="bangdieukhien">

      <?php
      $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');

         $select_products = mysqli_query($conn, "SELECT * FROM `sanpham`") or die('Kết nối thất bại');

         if(mysqli_num_rows($select_products) > 0)
         {
            while($fetch_products = mysqli_fetch_assoc($select_products))
            {
      ?>
      <div class="hop">
         <img  src="luu tru anh/<?php echo $fetch_products['anh']; ?>" alt="">

         <div class="name"><?php echo $fetch_products['name']; ?></div>

         <div class="gia"><?php echo $fetch_products['gia']; ?> VND</div>

         <a href="4_AdminSP.php?update=<?php echo $fetch_products['ID']; ?>" class="btnn">Chỉnh sửa</a>

         <a href="4_AdminSP.php?delete=<?php echo $fetch_products['ID']; ?>" class="dbtn" 
            onclick="return confirm('Xoá sản phẩm này');">Xoá</a>
      </div>

      <?php

            }
         }  

         else
               {
                      echo '<p class="empty">Chưa có sản phẩm nào được thêm vào!</p>';
               }

			



      ?>
   </div>

</section>



<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
      	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE ID = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['ID']; ?>">

      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['anh']; ?>">

      <img src="luu tru anh/<?php echo $fetch_update['anh']; ?>" alt="">

      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" 
      class="hop"  required placeholder="Nhập tên sản phẩm">


      <input type="text" name="update_TG" value="<?php echo $fetch_update['tacgia']; ?>" 
      class="hop" required placeholder="Nhập tên tác giả">


      <textarea name="update_info" value="<?php echo $fetch_update['thongtin']; ?>" 
      class="hop"  placeholder="Nhập thông tin sách" id="" ></textarea>


      <input type="number" name="update_price" value="<?php echo $fetch_update['gia']; ?>" 
      min="0" class="hop" required placeholder="Nhập giá sản phẩm">


      <input type="file" class="hop" name="update_image" accept="image/jpg, image/jpeg, image/png">

      <input type="submit" value="Hoàn thành" name="update_product" class="btnn">

      <input type="reset" value="Thoát" id="close-update" class="dbtn">

      <script type="">
         document.querySelector('#close-update').onclick = () =>
               {
                        document.querySelector('.edit-product-form').style.display = 'none';
                           window.location.href = '4_AdminSP.php';
               }
      </script>

   </form>
   <?php
    
         }
      }

      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';

      }
   ?>

</section>





	
</body>
</html>