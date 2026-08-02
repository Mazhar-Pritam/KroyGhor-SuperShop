<?php
// delete.php
// This page deletes a category

include "db_connect.php";

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE id=$id";
mysqli_query($conn, $sql);

// after deleting, go back to the list
header("Location: index.php");
exit;
?>
