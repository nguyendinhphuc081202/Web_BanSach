<?php


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $conn = mysqli_connect('localhost', 'root', '', 'shopbook') or die('Kết nối thất bại');



   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `giohang` WHERE name = '$product_name' ") or die('query failed');



   if(mysqli_num_rows($check_cart_numbers) > 0){
      echo "<script>alert('Đã có trong giỏ hàng!!'); window.location='8_homeUser.php';</script>";
   }else{
      mysqli_query($conn, "INSERT INTO `giohang`(user_id, name, gia, soluong, hinhanh) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      echo "<script>alert('Sản phẩm đã thêm vào trong giỏ hàng!!'); window.location='8_homeUser.php';</script>";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang chủ</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
    <link rel="stylesheet" href="8_homeUser.css">
    <link rel="stylesheet" href="z_ChanvsMenu.css">

</head>
<body>
   
<?php include 'z_menuUser.php'; 
      
?>

<section class="home">

<a href="9_tusach.php?update=69"><img src="0_trôi.jpg" alt=""></a>

</section>
 <div class="content">
     
    
      <!-- <a href="about.php" class="wbtn">Thêm thông tin</a> -->
      
   </div>
<section class="products">

   <h1 class="title">Sản phẩm nổi bật</h1>

   <div class="khungbieumau">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `sanpham` LIMIT 9") or die('query failed');
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
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Chưa có sản phẩm nội bật được thêm</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="them.php" class="obtn">Xem thêm</a>
   </div>

</section>

<!-- <section class="edit-product-form">

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
                        document.querySelector('.edit-product-form').style.display = 'none';
                           window.location.href = 'home.php';
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

</section> -->


<!-- <section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>
 -->




<?php include 'z_chantrang.php'; ?>

<!-- custom js file link  -->


</body>
</html>