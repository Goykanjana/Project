<?php
include 'condb.php';
$ids=$_POST['pid'];
$nums=$_POST['pnum'];

$sql= "UPDATE product set amount= amount + $nums WHERE pro_id='$ids' ";
$hand=mysqli_query($conn,$sql);
if($hand){
     echo "<script> alert('อัพเดทจำนวนสินค้าเรียบร้อย');   </script>" ;
     echo "<script> window.location='index.php';   </script>" ;
}else{
    echo "<script> alert('ไม่สามารถอัพเดทสินค้าได้');   </script>" ;
}
mysqli_close($conn);




?>