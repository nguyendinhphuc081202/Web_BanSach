<?php

// include 'config.php';

// session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }
$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['stt'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'Số nhà: '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `giohang` ") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['soluong'].') ';
         $sub_total = ($cart_item['gia'] * $cart_item['soluong']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `dathang` WHERE name = '$name' AND stt = '$number' AND email = '$email' AND tinhTrangTT = '$method' AND diachi = '$address' AND TongSP = '$total_products' AND tongGia = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      
      echo "<script>alert('Giỏ hàng trống!!'); window.location='d_dathang.php';</script>";
   }else{
      if(mysqli_num_rows($order_query) > 0){
         echo "<script>alert('Đơn hàng đã được đặt rồi!!'); window.location='b_tinhtrangDH.php';</script>";
      }else{
         mysqli_query($conn, "INSERT INTO `dathang`(user_id, name, stt, email, phuongthuc, diachi, TongSP, tongGia, tinhTrangTT) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         echo "<script>alert('Đơn hàng đã được đặt thành công!!'); window.location='b_tinhtrangDH.php';</script>";
         mysqli_query($conn, "DELETE FROM `giohang` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đặt hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
    <link rel="stylesheet" href="z_ChanvsMenu.css">
    <link rel="stylesheet" href="d_dathang.css">
    
   

</head>
<body>
   
<?php include 'z_menuUser.php'; ?>

<div class="heading">
   <h3>Đặt hàng</h3>
    <p> <a href="8_homeUser.php">Trang chủ</a> / <a href="c_giohang.php" style="color:#CC00FF;">Giỏ hàng</a> </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `giohang` ") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['gia'] * $fetch_cart['soluong']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo $fetch_cart['soluong'].' x '. $fetch_cart['gia']. ' VND'; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Giỏ hàng trống</p>';
   }
   ?>
   <div class="grand-total"> Tổng giá : <span><?php echo $grand_total; ?> VND</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>THÔNG TIN GIAO HÀNG</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Tên của bạn:</span>
            <input type="text" name="name" required placeholder="Nhập họ và tên">
         </div>
         <div class="inputBox">
            <span>Số điện thoại :</span>
            <input type="number" name="stt" required placeholder="Nhập số điện thoại">
         </div>
         <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="email" required placeholder="Nhập email của bạn">
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán :</span>
            <select name="method">
               <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
               <option value="Chuyển khoản">Chuyển khoản</option>
              
            </select>
         </div>
         <div class="inputBox">
            <span>Số nhà - Tên đường</span>
            <input type="text"  name="flat" required placeholder="Địa chỉ">
         </div>
         <div class="inputBox">
            <span>Thành phố :</span>
            <input type="text" name="street" required placeholder="Thành phố">
         </div>
         <div class="inputBox">
            <span>Tỉnh:</span>
            <input type="text" name="city" required placeholder="Tỉnh">
         </div>
         <div class="inputBox">
            <span>Dân tộc :</span>
            <input type="text" name="state" required placeholder="Dân tộc">
         </div>
         <div class="inputBox">
            <span>Quê quán :</span>
            <input type="text" name="country" required placeholder="Quê quán">
         </div>
         <div class="inputBox">
            <span>Mã bưu điện :</span>
            <input type="number" min="0" name="pin_code" required placeholder="Mã bưu điện">
         </div>
      </div>
      <input type="submit" value="Đặt hàng" class="btnn" name="order_btn">
   </form>

</section>









<?php include 'z_chantrang.php'; ?>



</body>
</html>