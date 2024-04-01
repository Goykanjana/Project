<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product data warehouse";


//Createe  connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//Createe  connection
if (!$conn){
    die("Connection failed: ". mysqli_connerct_error());
}
//echo "Connected successfully";
?>