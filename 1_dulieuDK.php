<?php
	$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối ko thành công');
   // Kết nối đến cơ sở dữ liệu MySQL trên máy chủ localhost


	// if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);  
   // làm cho các chuỗi dữ liệu an toàn khi chúng được chèn vào các truy vấn SQL
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, ($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `dangky` WHERE email = '$email' AND password = '$pass'") or die('Truy vấn không thành công');
// là một hàm trong PHP được sử dụng để thực hiện các truy vấn SQL đến cơ sở dữ liệu MySQL.
   if(mysqli_num_rows($select_users) > 0){
     echo "<script>alert('Trùng tên người dùng!!!'); window.location='1_dangky.php';</script>";
      // mysqli_num_rows hàm trả về
   }else{
      if($pass != $cpass){
         echo "<script>alert('Mật khẩu không khớp!!!'); window.location='1_dangky.php';</script>";
         // alert() để cảnh báo
      }else{
	         mysqli_query($conn, "INSERT INTO `dangky`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')")
            // INSERT INTO chèn dữ liệu vào bảng

	          or die('Truy vấn không thành công');

	         echo "<script>alert('Đăng ký thành công'); window.location='1_dangky.php';</script>";
	        
      }
   }

// }


?>