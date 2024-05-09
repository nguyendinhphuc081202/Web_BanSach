<?php





// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }

if(isset($_POST['send'])){
$conn = mysqli_connect('localhost', 'root', '', 'shopbook') or die('Kết nối thất bại');
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['loiNhan']);

   $select_message = mysqli_query($conn, "SELECT * FROM `phanhoi` WHERE name = '$name' AND email = '$email' AND number = '$number' AND loiNhan = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      echo "<script>alert('Tin nhắn đã gửi đi rồi  !!'); window.location='a_lienhe.php';</script>";
   }else{
      mysqli_query($conn, "INSERT INTO `phanhoi`(user_id, name, email, number, loiNhan) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      echo "<script>alert('Tin nhắn đã được gửi!!'); window.location='a_lienhe.php';</script>";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Phản hồi</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="z_ChanvsMenu.css">
    <link rel="stylesheet" href="a_lienhe.css">
   

</head>
<body>
   
<?php include 'z_menuUser.php'; ?>

<div class="heading">
   <h3>Liên hệ với chúng tôi</h3>
   <p> <a href="8_homeUser.php">Trang chủ</a> / <a href="a_lienhe.php" style="color:#CC00FF;">Liên hệ</a> </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="Nhập vào tên của bạn" class="hop">
      <input type="email" name="email" required placeholder="Nhập vào Email của bạn" class="hop">
      <input type="number" name="number" required placeholder="Nhập vào số điện thoại của bạn" class="hop">
      <textarea name="loiNhan" class="hop" placeholder="Phản hồi với chúng tôi :)" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Gửi đi" name="send" class="btnn">
   </form>

</section>








<?php include 'z_chantrang.php'; ?>

<!-- custom js file link  -->


</body>
</html>