<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thông tin sản phẩm</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

       <link rel="stylesheet" href="6_TTsach.css">
       <link rel="stylesheet" href="3_homeAdmin.css">




</head>
<body>

	<?php 
			include 'z_menuAdmin.php';
			
	?>
<!-- <div class="heading">
   <h3>Kiểm tra đơn hàng</h3>
   <p> <a href="home.php">Trang chủ</a> / <a href="giohang.php" style="color:#CC00FF;">Giỏ hàng</a> </p>
</div> -->

<section class="in4">

   <h1 class="title">Thông tin sản phẩm</h1>

   <div class="khungbieumau">

      <?php
      $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
         $showinfo = mysqli_query($conn, "SELECT * FROM `sanpham` ") or die('query failed');
         if(mysqli_num_rows($showinfo) > 0){
            while($laytt = mysqli_fetch_assoc($showinfo)){
      ?>
      <div class="hop">
      <img  src="luu tru anh/<?php echo $laytt['anh']; ?>" alt="">
         <p> Tên tác phẩm: <span><?php echo $laytt['name']; ?></span> </p>
         <p> Tên tác giả : <span><?php echo $laytt['tacgia']; ?></span> </p>
         <p> Giá sản phẩm : <span><?php echo $laytt['gia']; ?> VND</span> </p>
         
         <p> Thông tin sản phẩm : <span><?php echo $laytt['thongtin']; ?></span> </p>
         
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">Chưa có sản phẩm!</p>';
      }
      ?>
   </div>

</section>
		


	
</body>
</html>