<?php
$search = @$_GET['search'];

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pcstoreproject";

        $connections = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($connections->connect_error) {
            die("Connection failed: " . $connections->connect_error);
        }

$rows = $connections -> query('SELECT * FROM products LEFT JOIN category ON products.categoryID = category.categoryID;');
// $categories = $connections -> query('SELECT * FROM products LEFT JOIN categories ON products.categoryID = categories.categoryID');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="admin.css?<?php echo time(); ?>">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <title>Admin Page</title>
</head>

<body > <!--- style="background-color: #2C3E50;->
<! Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>




<table>
    <tr>
        <th>Products</th>
    </tr>
        <?php
        foreach($rows as $row){
            ?>
            <tr >
                <td><?= $row['productID']?></td>
                <td><?= $row['category_name']?></td>
                <td><?= $row['name']?></td>
                <td><?= $row['price']?></td>
                <td><?= $row['quantity']?></td>
                <td><?= $row['manufacturer']?></td>
                <td><?= $row['model']?></td>
                <td><img src="<?= $row['img_src']?>" style="width: 200px"</td>
                <td><a href="edit.php?id=<?= $row['productID']?>">Edit</a></td>
                <td><a href="deleteProduct.php?id=<?= $row['productID']?>">Delete</a></td>
            </tr><br>
            <?php
        }
        ?>
    <tr>
        <th><a href="addProduct.php">ADD</a></th>
    </tr>
</table>
</body>