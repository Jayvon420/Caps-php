<?php include("includes/header.php")?>
<?php include("includes/navBar.php")?>
<?php include("includes/sideNav.php")?>


    <div class="px-4">
        <h1 class="my-5">Inventory System</h1>
        <!-- Add Product Form -->
        
    <form action="code.php" method="POST">
        <?php include('alerts/fail.php'); ?>
        <?php include('alerts/message.php'); ?>
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
        <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
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
                                <td><?= $product['id']?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm " href="updateProduct.php?id=<?= $product['id']?>">Update</a> 
                                    <a class="btn btn-danger btn-sm " href="##">Delete</a>
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
 

<?php include("includes/footer.php")?>