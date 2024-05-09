<?php


$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `phanhoi` WHERE ID = '$delete_id'") or die('Lỗi!!!');
   header('location:7_PhanHoi.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Phản hồi</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="3_homeAdmin.css">
  <link rel="stylesheet" href="7_PhanHoi.css">
    
  </head>



<body>
		<?php include 'z_menuAdmin.php'; ?>




		<section class="messages">

   <h1 class="title"> Phản hồi </h1>

   <div class="bangdieukhien">
   <?php
      $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
      $select_message = mysqli_query($conn, "SELECT * FROM `phanhoi`") or die('Kết nối thất bại');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="hop">
     
      <p> Tên người dùng : 						<span><?php echo $fetch_message['name']; ?></span> </p>
      <p> Số điện thoại : 						<span><?php echo $fetch_message['number']; ?></span> </p>
      <p> Email : 								    <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> Lời nhắn : 							    <span><?php echo $fetch_message['loiNhan']; ?></span> </p>
      <a href="7_PhanHoi.php?delete=<?php echo $fetch_message['ID']; ?>" onclick="return confirm('Bạn muốn xoá lời nhắn này!!!');" class="dbtn">Xoá</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">Bạn không có lời phản hồi nào!!</p>';
   }
   ?>
   </div>

</section>






	
</body>
</html>