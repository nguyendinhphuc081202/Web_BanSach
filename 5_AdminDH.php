
<?php


$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `dathang` SET tinhTrangTT = '$update_payment' WHERE ID = '$order_update_id'") or die('Kết nối thất bại');
   
   echo "<script>alert('Trạng thái thanh toán đã được cập nhật!!'); window.location='5_AdminDH.php';</script>";

}



            if(isset($_GET['delete']))
            {
                $delete_id = $_GET['delete'];
                       if(mysqli_query($conn, "DELETE FROM `dathang` WHERE ID = '$delete_id'")) 
                          {
                            header('location:5_AdminDH.php');
                          } 

                        else 
                         {
                            echo "Lỗi: " . mysqli_error($conn);
                         }

            }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đơn hàng</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   

    <link rel="stylesheet" href="5_AdminDH.css">
    <link rel="stylesheet" href="3_homeAdmin.css">
    
</head>
<body>

	<?php include 'z_menuAdmin.php'; ?>


	<section class="orders">

   <h1 class="title">Đơn hàng</h1>

   <div class="bangdieukhien">
      <?php
      $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
      $select_orders = mysqli_query($conn, "SELECT * FROM `dathang`") or die('Kết nối thất bại');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="hop">
         
         
         <p> Tên người dùng: 			     <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Số điện thoại: 			     <span><?php echo $fetch_orders['stt']; ?></span> </p>
         <p> Email: 					         <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Địa chỉ: 					       <span><?php echo $fetch_orders['diachi']; ?></span> </p>
         <p> Tổng sản phẩm: 			     <span><?php echo $fetch_orders['TongSP']; ?></span> </p>
         <p> Tổng giá: 					       <span><?php echo $fetch_orders['tongGia']; ?> VND</span></p>
         <p> Phương thức thanh toán: 	 <span><?php echo $fetch_orders['phuongthuc']; ?></span></p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['ID']; ?>">
            <select name="update_payment">
               <option value="" selected disabled>	<?php echo $fetch_orders['tinhTrangTT']; ?></option>
               <option value="Chưa giao hàng">Chưa giao hàng</option>
               <option value="Đã giao hàng">Đã giao hàng</option>
            </select>
            <input type="submit" value="Duyệt" name="update_order" class="btnn">
            <a href="5_AdminDH.php?delete=<?php echo $fetch_orders['ID']; ?>" onclick="return confirm('Xoá đơn đặt hàng này?');" 
            	class="dbtn">Xoá</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Chưa có đơn hàng nào được đặt!</p>';
      }
      ?>
   </div>

</section>








	
</body>
</html>