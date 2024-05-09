<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="1_dangky.css">
</head>
<body>
	<div class="khungbieumau">

         <form action="1_dulieuDK.php" method="post">
		      <h3>Đăng ký ngay bây giờ</h3>
		      <input type="text"     name="name" placeholder="Nhập tên của bạn" required class="box">
		      <input type="email"    name="email" placeholder="Nhập email của bạn" required class="box">
		      <input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required class="box">
		      <input type="password" name="cpassword" placeholder="Xác nhận mật khẩu" required class="box">
		      <select name="user_type" class="box">
		         <option value="user">Người dùng</option>
		         <option value="admin">Người bán hàng</option>
		      </select>
		      <input type="submit" name="submit" value="Đăng ký" class="btnn">
		      <p>Bạn đã có sẵn tài khoản? <a href="2_dangnhap.php"> Đăng nhập ngay bây giờ</a></p>
     	</form>
    </div>
</body>
</html>


