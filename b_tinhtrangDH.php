

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kiểm tra đơn hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="z_ChanvsMenu.css">
    <link rel="stylesheet" href="b_tinhtrangDH.css">

   

</head>
<body>
   
<?php include 'z_menuUser.php'; ?>

<div class="heading">
   <h3>Kiểm tra đơn hàng</h3>
   <p> <a href="8_homeUser.php">Trang chủ</a> / <a href="giohang.php" style="color:#CC00FF;">Giỏ hàng</a> </p>
</div>

<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="khungbieumau">

      <?php
      $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
         $order_query = mysqli_query($conn, "SELECT * FROM `dathang` ") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="hop">
      
         <p> Tên : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Số điện thoại : <span><?php echo $fetch_orders['stt']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Địa chỉ : <span><?php echo $fetch_orders['diachi']; ?></span> </p>
         <p> Phương thức : <span><?php echo $fetch_orders['phuongthuc']; ?></span> </p>
         <p> Đơn hàng : <span><?php echo $fetch_orders['TongSP']; ?></span> </p>
         <p> Tổng giá : <span><?php echo $fetch_orders['tongGia']; ?> VND</span> </p>
         <p> Tình trạng : <span style="color:<?php if($fetch_orders['tinhTrangTT'] == 'Chưa giao hàng'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['tinhTrangTT']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">Chưa có đơn nào được đặt!</p>';
      }
      ?>
   </div>

</section>








<?php include 'z_chantrang.php'; ?>



</body>
</html>