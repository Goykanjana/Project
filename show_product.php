<?php include 'condb.php' ?>

<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansiree</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" ></script>


    <style>
body {
  background-color: l#d1d1e0;
}
</style>


</head>
<body>
  
     <?php  include 'menu.php';?>
     <?php  include 'header.php';?>

<div class="container">
<br><br>
  <div class="row">
  <?php
$sql ="SELECT * FROM product WHERE amount > 0  ORDER BY pro_id";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  ?>
    <div class="col-sm-3">
       <div class="text-center"> 
      <img src="img/<?=$row['image']?>" width="200px" height="200"  class="mt-5 p-1 my-2 border"  > <br>
    <!--  ID: <?=$row['pro_id']?> <br>-->
      <h5 class="text-btn btn-dark"> <?=$row['pro_name']?> </h5>
      ราคา <b class="text-danger"> <?=$row['price']?> </b> บาท <br>
      <a class="btn btn-outline-success mt-3" href="sh_product_betail.php?id=<?=$row['pro_id']?>" > รายละเอียด </a> 
      </div>
    <br>
    </div>
   <?php
   }
   mysqli_close($conn);
   ?>

  </div>
</div>




</body>
</html>