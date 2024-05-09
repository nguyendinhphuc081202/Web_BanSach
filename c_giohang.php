<?php

// include 'config.php';

// session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }
$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `giohang` SET soluong = '$cart_quantity' WHERE ID = '$cart_id' ") or die('query failed');
   echo "<script>alert('Đã cập nhật lại số lượng sản phẩm!!'); window.location='c_giohang.php';</script>";
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `giohang` WHERE ID = '$delete_id'") or die('query failed');
   header('location:c_giohang.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `giohang` ") or die('query failed');
   header('location:c_giohang.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Giỏ hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="z_ChanvsMenu.css">
    <link rel="stylesheet" href="c_giohang.css">
   

</head>
<body>
   
<?php include 'z_menuUser.php'; ?>

<div class="heading">
   <h3>Chúc bạn mua hàng vui vẻ </h3>
 
   <p> <a href="8_homeUser.php">Trang chủ</a> / <a href="c_giohang.php" style="color: #CC00FF">Giỏ hàng</a> </p>
</div>

<section class="giohang">

   <h1 class="title">Sản phẩm trong giỏ hàng</h1>

   <div class="khungbieumau">
      <?php
         $grand_total = 0;
         $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
         $select_cart = mysqli_query($conn, "SELECT * FROM `giohang` ") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="hop">
         <a href="c_giohang.php?delete=<?php echo $fetch_cart['ID']; ?>" class="fas fa-times" onclick="return confirm('Xoá sản phẩm?');"></a>
         <img src="luu tru anh/<?php echo $fetch_cart['hinhanh']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="price"><?php echo $fetch_cart['gia']; ?> VND</div>
         <form class="fom" action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['ID']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['soluong']; ?>">
            <input type="submit" name="update_cart" value="Cập nhật" class="ubtn">
         </form>
         <div class="sub-total"> Tổng giá : <span><?php echo $sub_total = ($fetch_cart['soluong'] * $fetch_cart['gia']); ?> VND</span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">"Hổng" có gì cả</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="c_giohang.php?delete_all" class="dbtn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Bạn muốn xoá hết sản phẩm kho');">Xoá Hết</a>
   </div>

   <div class="cart-total">
      <p>Tổng cộng : <span><?php echo number_format($grand_total,0,',','.')  ?> VND</span></p>
      <div class="flex">
         <a href="9_tusach.php" class="dbtn">Tiếp tục mua sắm</a>
         <a href="d_dathang.php" class="btnn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Đặt hàng</a>
      </div>
   </div>

</section>








<?php include 'z_chantrang.php'; ?>

<!-- custom js file link  -->


</body>
</html>