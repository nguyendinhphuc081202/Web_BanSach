<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập</title>

 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


   <link rel="stylesheet" href="2_dangnhap.css">

</head>
<body>
<div class="khungbieumau">

   <form action="2_dulieuDN.php" method="post">
      <h3>Đăng nhâp</h3>
      <input type="email" name="email" placeholder="Nhập email của bạn" required class="box">
      <input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required class="box">
      <input type="submit" name="submit" value="Đăng nhập" class="btnn">
      <p>Không có tài khoản? <a href="1_dangky.php"> Đăng ký ngay bây giờ</a></p>
   </form>

</div>

</body>
</html>