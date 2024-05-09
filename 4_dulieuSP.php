<?php

	if(isset($_POST['themSP']))
   {
      $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $tacgia = mysqli_real_escape_string($conn, $_POST['tacgia']);
      $thongtin = mysqli_real_escape_string($conn, $_POST['thongtin']);
      $gia = $_POST['gia'];
      $anh = $_FILES['anh']['name'];
      $image_size = $_FILES['anh']['size'];
      $image_tmp_name = $_FILES['anh']['tmp_name'];
      $image_folder = 'luu tru anh/'.$anh;
      

// Thay đổi kích thước ảnh


// Lưu ảnh mới vào một tệp

   	
      $select_product_name = mysqli_query($conn, "SELECT name FROM `sanpham` WHERE name = '$name'") or die('query failed');

      if(mysqli_num_rows($select_product_name) > 0)
      {
         
         echo "<script>alert('Tên sản phẩm đã được thêm vào!'); window.location='4_AdminSP.php';</script>";
      }
      else
      {

         $add_product_query = mysqli_query($conn, "INSERT INTO `sanpham`(name,tacgia, gia, thongtin,anh) VALUES('$name', '$tacgia', '$gia' , '$thongtin' , '$anh')") or die('query failed');


         if($add_product_query)
         {
            if($image_size > 2000000){
               
               echo "<script>alert('Kích thước ảnh quá lớn!'); window.location='4_AdminSP.php';</script>";
            }

            else
            {
               move_uploaded_file($image_tmp_name, $image_folder);
               
               echo "<script>alert('Sản phẩm đã được thêm vào thành công!!'); window.location='4_AdminSP.php';</script>";
            }
         }

         else
         {
            
            echo "<script>alert('Không thể thêm sản phẩm!!!'); window.location='4_AdminSP.php';</script>";
         }
      }
   }

   if(isset($_GET['delete']))
         {
            $conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
            $delete_id = $_GET['delete'];
            $delete_image_query = mysqli_query($conn, "SELECT anh FROM `sanpham` WHERE id = '$delete_id'") or die('query failed');
            $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
            unlink('luu tru anh/'.$fetch_delete_image['anh']);
            mysqli_query($conn, "DELETE FROM `sanpham` WHERE id = '$delete_id'") or die('query failed');
            header('location:4_AdminSP.php');
         }


         if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];
   $update_TG = $_POST['update_TG'];
   $update_info = $_POST['update_info'];
$conn = mysqli_connect('localhost','root','','shopbook') or die('Kết nối thất bại');
   mysqli_query($conn, "UPDATE `sanpham` SET name = '$update_name', gia = '$update_price', tacgia ='$update_TG', thongtin='$update_info' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'luu tru anh/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000)
      {
         
      }
      else
      {

         mysqli_query($conn, "UPDATE `sanpham` SET anh = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('luu tru anh/'.$update_old_image);
      }
   }
   header('location:4_AdminSP.php');

}

?>




