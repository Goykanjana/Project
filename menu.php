<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffb3e6;" >
  <div class="container">
    <a class="navbar-brand" href="#">ATTRACTIUK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show_product.php">สินค้ารวม</a>
        </li>
          </a>
        </li>
        <li class="nav-item">
          <a href="index1.php" class="nav-link ">สมัครสมาชิก</a> 
        </li>
        
        <li class="nav-item">
        <a href="logout.php" class="nav-link " >ออกจากระบบ</a> 
        </li>


        <li class="nav-item">
        <a href="cart.php" class="nav-link ">ตะกร้าสินค้า</a> 
        </li>

<?php
if(isset($_SESSION["user"])){
?>
        <li class="nav-item">
        <b class="nav-link ">ยินดีต้อนรับคุณ:<?=$_SESSION["user"]?> </b> 
        </li>
<?php
}
?>        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="ค้นหาสินค้า" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">ค้นหา</button>
      </form>
    </div>
  </div>
</nav>
