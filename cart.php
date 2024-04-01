<?php
session_start();
include 'condb.php';

/*$id=$_GET['id'];
$sql = "SELECT * FROM product WHERE pro_id ='$id' ";
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_array($result);
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" ></script>


</head>
<body>
<?php include 'menu.php';?>
<br><br>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
    <div class="row">
        <div class="col-md-10">
        <div class="alert alert-warning h4" role="alert">
            การสั่งซื้อสินค้า
</div>
    <table class = "table table-hover">
    <tr>
        <th>ลําดับที่</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>จํานวน</th>
        <th>ราคารวม</th>
        <th>เพิ่ม - ลด</th>
        <th>ลบรายการ</th>
    </tr>
<?php
$Total = 0;
$sumPrice = 0;
$m = 1;
$sumTotal=0;

if(isset($_SESSION["intLine"])){   // ถ้าว่างไม่เป็นไม่เป็นให้ทำงานใน {}

for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
     if (($_SESSION["strProductID"][$i])!=""){
        $sql1="select * from product where pro_id = '".$_SESSION["strProductID"][$i] . "' " ;
        $result1 = mysqli_query($conn , $sql1);
        $row_pro = mysqli_fetch_array($result1);

         $_SESSION["price"] = $row_pro['price'];
         $Total = $_SESSION["strQty"][$i];
         $sum = $Total * $row_pro['price'];
         $sumPrice = $sumPrice + $sum;
         $_SESSION["sum_price"] = $sumPrice;
         $sumTotal=$sumTotal+ $Total;

         /*$sumPrice = numfmt_format($sumPrice);*/
  
     
?>
    <tr>
        <td><?=$m?></td>
        <td>
            <img src="img/<?=$row_pro['image']?>" width = "80" height = "100" class = "border">
        <? = $row_pro['pro_name']?>
        </td>
        <td><?= $row_pro['price']?></td>
        <td><?= $_SESSION["strQty"][$i]?></td>
        <td><?= $sum?></td>
        <td>
        <a href="order.php?id=<?= $row_pro['pro_id']?>" class="btn btn-secondary">+</a>
        <?php if( $_SESSION["strQty"][$i] > 1){   ?>
        <a href="order_del.php?id=<?= $row_pro['pro_id']?>" class="btn btn-secondary">-</a>
        <?php } ?>
     </td>

        <td><a href= "pro_delete.php?Line=<?=$i?>" ><img src= "img/delete.png" width= "30"></a></td>
    </tr>

<?php
$m=$m+1;
}
}
} 
?>

<tr>
<td class = "text-and" colspan = "4">ค่าใช้จ่ายรวม</td>
<td class = "text-and" ><?= $sumPrice?></td>
<td>บาท</td>
</tr>
</table> 
<p class="text-end">จำนวนสินค้า<?= $sumTotal ?> ชิ้น</p>



<div style="text-align:right">
<a href ="show_product.php" > <button type="button" class="btn btn-warning">เลือกสินค้า</button> </a>
<button type="submit" class="btn btn-outline-primary">ยืนยันการสั่งซื้อ</button>
</div>
</div>
<br>
    <div class="row"> 
        <div class="col-md-4">
        <div class="alert alert-success" role="alert">
    ข้อมูลสำหรับจัดส่งสินค้า
</div>
ชื่อ-นามสกุล:
<input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล ..."><br>
ที่อยู่จัดส่งสินค้า: 
<textarea class="form-control " required placeholder="ที่อยู่ ..." name="cus_add" rows="3"> </textarea><br>
เบอร์โทรศัพท์:
<input type="number" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์ ...">
<br><br><br>
        </div>
    </div>
</form>
</div>
<div class="row"> 
        <div class="col-md-4">
        <div class="alert alert-success" role="alert">
    ชำระเงิน
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  บัตรเครดิต
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
  ชำระเก็บปลายทาง
  </label>
  <br>
  <img src="./img/paypal.jpg" class="img-thumbnail" alt="...">
  <br><br>
  

ที่อยู่เรียกเก็บเงิน <br><br>

ชื่อบนบัตร:
  <input type="text" name="cus_name" class="form-control" required placeholder="John More Doe ..."><br>
หมายเลขบัตรเครดิต:
<input type="text" name="cus_name" class="form-control" required placeholder="1111-2222-3333-4444 ..."><br>
เดือนที่หมดอายุ:
<input type="text" name="cus_name" class="form-control" required placeholder="มกราคม ..."><br>
ประสบการณ์ปี:
<input type="text" name="cus_name" class="form-control" required placeholder="2018 ..."><br>
ซีวีวี:
<input type="text" name="cus_name" class="form-control" required placeholder="352 ..."><br>


</div>
</div>









</body>
</html>