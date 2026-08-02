<?php
// index.php
// This page shows all categories and lets you add a new one

include "db_connect.php";

// check if the add form was submitted
if (isset($_POST['add'])) {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories (category_name, Created_at) VALUES ('$category_name', NOW())";
    mysqli_query($conn, $sql);

    // reload page after adding so form doesn't resubmit on refresh
    header("Location: index.php");
    exit;
}

// get all categories from database
$result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f2f2f2;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #4CAF50;
            color: white;
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
        input[type=submit]:hover {
            background: #45a049;
        }
        .edit-btn {
            color: blue;
        }
        .delete-btn {
            color: red;
        }
    </style>
</head>
<body>

    <h2>Category List</h2>

    <!-- add category form -->
    <form method="POST" action="index.php">
        <input type="text" name="category_name" placeholder="Enter category name" required>
        <input type="submit" name="add" value="Add Category">
    </form>

    <!-- table showing all categories -->
    <table>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['category_name']; ?></td>
            <td><?php echo $row['Created_at']; ?></td>
            <td><?php echo $row['Updated_at']; ?></td>
            <td>
                <a class="edit-btn" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                |
                <a class="delete-btn" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>
