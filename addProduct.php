<?php
require 'dbcon.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container-fluid ">
    <div class="px-4">
        <h1 class="my-5">Inventory System</h1>
        <!-- Add Product Form -->
        
    <form action="code.php" method="POST">
        <?php include('fail.php'); ?>
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="productQty">Quantity</label>
                    <input type="number" class="form-control" id="productQty" name="quantity" required>
                </div>
            </div>
        </div>
        <div class="my-4">
            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
        </div>
    </form>
        <!-- Display Products -->
        <h2>Product List</h2>
        <table class="table table-striped table-bordered">
            <thead class>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM products";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $product)
                        {
                            // echo $product['name'];
                            ?>
                            <tr>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td class="text-center">
                                    <a class="p-1 text-success" href="##">Update</a> 
                                    <a class="p-1 text-danger" href="##">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<h5> No Records Found <h5>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
