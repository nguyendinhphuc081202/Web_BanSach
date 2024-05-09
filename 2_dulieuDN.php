<?php


session_start();
	
	if(isset($_POST['submit'])){
$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối ko thành công');
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));
   

   $luachon_ngDung = mysqli_query($conn, "SELECT * FROM `dangky` WHERE email = '$email' AND password = '$pass'") or die('Truy vấn không thành công');

   if(mysqli_num_rows($luachon_ngDung) > 0)

   {
     $row = mysqli_fetch_assoc($luachon_ngDung);
     // Hàm mysqli_fetch_assoc() được sử dụng để trả về một mảng kết hợp chứa dữ liệu từ dòng kết quả hiện tại của truy vấn.

      if($row['user_type'] == 'admin')
      {

         $_SESSION['admin_name'] = $row['name'];     
         // _SESSION để sử dụng cho các trang khác
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['ID'];
         header('location:3_homeAdmin.php');

      }
      else if($row['user_type'] == 'user')
      {

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['ID'];
         header('location:8_homeUser.php');
      }
   }


   else
   {
       echo "<script>alert('Email hoặc mật khẩu không chính xác!'); window.location='Dangnhap.php';</script>";
   }

}


?>