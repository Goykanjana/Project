<?php 

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>    

   <!-- Bootstrap CSS -->
   <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" ></script>


    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<body style="background-color:silver;">

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>


    <form action="login.php" method="post">




    <br><br>
        <div class="row">
        <div class="col-md-8 offset-md-5">
        <div class="col-md-4">
        <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-user fa-2x"></i>
        เข้าสู่ระบบ
    <br><br>
        <label for="username">ชื่อผู้ใช้</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <label for="password">รหัสผ่าน</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <br>
        <input type="submit" name="submit" class="btn btn-primary" value="Login">

    </form>

    <a href="register.php">Go to register</a>
    
</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>