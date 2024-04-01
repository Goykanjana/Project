<?php
include 'condb.php';
$proid=$_POST['pid'];
$proname=$_POST['pname'];
$detail=$_POST['detail'];
$typeid=$_POST['typeID'];
$price=$_POST['price'];
$amount=$_POST['num'];
$img=$_POST['txtimg'];

//อัปโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$img ";
    }

//คำสั่งแก้ไขข้อมูล
$sql="UPDATE product SET
pro_name='$proname',
detail='$detail',
type_id='$typeid',
price='$price',
amount='$amount',
image='$new_image_name'
WHERE pro_id='$proid'";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');  </script>" ;
    echo "<script> window.location='show_product2.php'; </script>" ;
  }else{
      echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้');  </script>" ;
  }
?>