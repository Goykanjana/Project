<?php 

    $conn = mysqli_connect("localhost", "root", "", "Product data warehouse");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>

