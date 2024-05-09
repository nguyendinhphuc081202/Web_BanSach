<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bảng quản trị</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="3_homeAdmin.css">
  

</head>
<body>
	
		<?php include 'z_menuAdmin.php'; ?>


		<section class="bangdieukhien"> <!-- chia các phần trong web -->
			<h1 class="title">Bảng Thông Báo</h1>
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->

				<div class="khunghop">
					
					<div class="hop">
						<?php
						$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
						$donchoxuly = 0;
            			$luachonXL = mysqli_query($conn , "SELECT tongGia FROM `dathang` WHERE tinhTrangTT = 'Chưa giao hàng'") or die('Truy vấn không thành công'); 
            			if(mysqli_num_rows($luachonXL) > 0)
            			{
            			while($tim = mysqli_fetch_assoc($luachonXL))// Lấy dữ liệu từ tập kết quả và hiển thị
            			    {
			                  $tongGia = $tim['tongGia'];
			                  $donchoxuly += $tongGia;
			                };
			            };
						?>
						<h3><?php echo $donchoxuly; ?> VND </h3>
         				<p><a href="5_AdminDH.php">Đơn chờ xử lý</p></a>
         				
					</div>
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->

				
					<div class="hop">
						<?php
						$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
						$donhoanthanh = 0;
            			$luachonHT = mysqli_query($conn , "SELECT tongGia FROM `dathang` WHERE tinhTrangTT = 'Đã giao hàng'") or die('Truy vấn không thành công'); 
            			if(mysqli_num_rows($luachonHT) > 0)
            			{
            			while($tim = mysqli_fetch_assoc($luachonHT))// Lấy dữ liệu từ tập kết quả và hiển thị
            			    {
			                  $tongGia = $tim['tongGia'];
			                  $donhoanthanh += $tongGia;
			                };
			            };
						?>
						<h3><?php echo $donhoanthanh; ?> VND </h3>
         				<p><a href="5_AdminDH.php">Thanh toán hoàn thành</p></a>
				</div>
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->

				
					<div class="hop">
				         <?php 
				         	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
				            $chonSP = mysqli_query($conn, "SELECT * FROM `sanpham`") or die('Truy vấn không thành công');
				            $SLsanpham = mysqli_num_rows($chonSP);
				         ?>
				         <h3><?php echo $SLsanpham; ?></h3>
				         <p><a href="4_AdminSP.php">Sản phẩm được thêm vào</p></a>
				</div>	
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
			<div class="hop">
					         <?php 
					         	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
					            $chonDH = mysqli_query($conn, "SELECT * FROM `dathang`") or die('Truy vấn không thành công');
					            $slDH = mysqli_num_rows($chonDH);
					         ?>
					         <h3><?php echo $slDH; ?></h3>
					         <p>Đã đặt hàng</p>
				</div>
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->

			      <!-- <div class="hop">
			         <?php 
			         	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
			            $chonND = mysqli_query($conn, "SELECT * FROM `dangky` WHERE user_type = 'user'") or die('Truy vấn không thành công');        //chon người dùng
			            $SLnguoidung = mysqli_num_rows($chonND);
			         ?>
			         <h3><?php echo $SLnguoidung; ?></h3>
			         <p>Người dùng</p>
			      </div>  -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->

			       <div class="hop">
			         <?php 
			            $chonAD = mysqli_query($conn, "SELECT * FROM `dangky` WHERE user_type = 'admin'") or die('Truy vấn không thành công'); //chọn người bán hàng
			            $SLnguoiban = mysqli_num_rows($chonAD);
			         ?>
			         <h3><?php echo $SLnguoiban; ?></h3>
			         <p>Người bán hàng</p>
			      </div> 

<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
      <!-- <div class="box">
         <?php 
         	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
            $chonTK = mysqli_query($conn, "SELECT * FROM `dangky`") or die('Truy vấn không thành công');
            $SLtaikhoan = mysqli_num_rows($chonTK);
         ?>
         <h3><?php echo $SLtaikhoan; ?></h3>
         <p>Tổng tài khoản</p>
      </div> -->

<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
      <div class="hop">
         <?php 
         	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
            $chonMESS = mysqli_query($conn, "SELECT * FROM `phanhoi`") or die('Truy vấn không thành công');//chọn tin nhắn phản hồi
            $SLmess = mysqli_num_rows($chonMESS);
         ?>
         <h3><?php echo $SLmess; ?></h3>
         <p><a href="7_PhanHoi.php">Tin nhắn</p></a>
      </div>

<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->
<!-- =============================================================================================================================== -->


				</div>


		</section>




</body>
</html>