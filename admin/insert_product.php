<?php
include 'condb.php' ;
$p_id = $_POST['pid'];
$p_name = $_POST['pname'];
$detail = $_POST['detail'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$num = $_POST['num'];

//เช็คค่ารหัสนี้อยู่ในฐานตารางโปรดัก
$check ="select * from product where pro_id ='$p_id' ";
$hand= mysqli_query($conn,$check);
$num=mysqli_num_rows($hand);
if($num > 0){
    echo "<script> alert('รหัสสินค้ามีอยู่แล้ว');  </script>" ;
    echo "<script> window.location='add_product.php'; </script>" ;
}

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

//คำสั่งเพิ่มข้อมูลตาราง product
$sql="INSERT INTO product(pro_id,pro_name,detail,type_id,price,amount,image)
VALUES('$p_id','$p_name','$detail','$typeID','$price','$num','$new_image_name')";
$result=mysqli_query($conn,$sql);

if($result){
  echo "<script> alert('บันทึกข้อมูลเรียบร้อย');  </script>" ;
  echo "<script> window.location='add_product.php'; </script>" ;
}else{
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้');  </script>" ;
}


?>