<?php

// include 'config.php';

// session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
$conn = mysqli_connect('localhost', 'root', '', 'shopbook') or die('Kết nối thất bại');
   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `giohang` WHERE name = '$product_name' ") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      echo "<script>alert('Đã có trong giỏ hàng!!'); window.location='9_tusach.php';</script>";
   }else{
      mysqli_query($conn, "INSERT INTO `giohang`( name, gia, soluong, hinhanh) VALUES( '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      echo "<script>alert('Sản phẩm đã thêm vào trong giỏ hàng!!'); window.location='9_tusach.php';</script>";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tủ sách</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   
   <!--  -->
    <link rel="stylesheet" href="z_ChanvsMenu.css">
     <link rel="stylesheet" href="9_tusach.css">
   

</head>
<body>
   
<?php include 'z_menuUser.php'; ?>

<div class="heading">
   <h3>Tủ sách</h3>
   <p> <a href="8_homeUser.php">Trang chủ</a> / <a href="9_tusach.php" style="color: #CC00FF">Cửa hàng</a> </p>
</div>

<section class="products">

   <h1 class="title">Tất cả sản phẩm</h1>

   <div class="khungbieumau">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `sanpham`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="hop">
     <a href="9_tusach.php?update=<?php echo $fetch_products['ID']; ?>"> <img class="image" src="luu tru anh/<?php echo $fetch_products['anh']; ?>" alt=""></a>
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price"><?php echo $fetch_products['gia']; ?> VND</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['gia']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['anh']; ?>">
      <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btnn">
     <!--  <a href="them.php?update=<?php echo $fetch_products['ID']; ?>" class="btnn">Chỉnh sửa</a> -->
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Chưa có sản phẩm được thêm vào!</p>';
      }
      ?>
   </div>

</section>

<section class="in4SP">

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
      <p> Tên tác phẩm: <span><?php echo $fetch_update['name']; ?></span> </p>
         <p> Tên tác giả : <span><?php echo $fetch_update['tacgia']; ?></span> </p>
         <p> Giá sản phẩm : <span><?php echo $fetch_update['gia']; ?> VND</span> </p>
         
         <p> Nội dung sách : <span><?php echo $fetch_update['thongtin']; ?></span> </p>
     <input type="reset" value="Thoát" id="close-update" class="obtn">
      
      <script type="">
         document.querySelector('#close-update').onclick = () =>
               {
                        document.querySelector('.in4SP').style.display = 'none';
                           window.location.href = '9_tusach.php';
               }
      </script>

   </form>
   
   <?php
    
         }
      }

      }else{
         echo '<script>document.querySelector(".in4SP").style.display = "none";</script>';

      }
   ?>

</section>






<?php include 'z_chantrang.php'; ?>



</body>
</html>