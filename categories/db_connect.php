<?php
// db_connect.php
// This file connects to our MySQL database
// Change these 4 things to match your own database

$host = "localhost";
$username = "root";       // your MySQL username
$password = "";           // your MySQL password
$database = "kroyghor-supershop"; // change this to your database name

// connect to mysql
$conn = mysqli_connect($host, $username, $password, $database);

// check if connection failed
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
