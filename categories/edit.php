<?php
// edit.php
// This page lets you edit a category

include "db_connect.php";

// get the id from the link (like edit.php?id=3)
$id = $_GET['id'];

// if update form was submitted
if (isset($_POST['update'])) {
    $category_name = $_POST['category_name'];

    $sql = "UPDATE categories SET category_name='$category_name', Updated_at=NOW() WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}

// get the current category info to fill the form
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f2f2f2;
        }
        input[type=text] {
            padding: 8px;
            width: 250px;
        }
        input[type=submit] {
            padding: 8px 15px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        a {
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h2>Edit Category</h2>

    <form method="POST" action="edit.php?id=<?php echo $id; ?>">
        <input type="text" name="category_name" value="<?php echo $row['category_name']; ?>" required>
        <input type="submit" name="update" value="Update">
    </form>

    <a href="index.php">Back to category list</a>

</body>
</html>
