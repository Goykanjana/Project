<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index1.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index1.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">

   <!-- Bootstrap CSS -->
   <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" ></script>


</head>
<body>

<body style="background-color:silver;">
<br><br><br><br><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
        <div class="col-md-8 offset-md-5">
        <div class="col-md-4">
        <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-user fa-2x"></i>
        สมัครสมาชิก
    <br><br>
        <label for="username">Username</label>
        <input type="text" name="username"class="form-control" placeholder="Enter your username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
        <br>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" class="form-control" placeholder="Enter your firstname" required>
        <br>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" class="form-control" placeholder="Enter your lastname" required>
        <br>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    
    </form>

    <a href="index1.php">Go back to index</a>
    
</body>
</html>