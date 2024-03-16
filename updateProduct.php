
<?php include("includes/header.php")?>
<?php include("includes/navBar.php")?>
<?php include("includes/sideNav.php")?>

            <div class="container-fluid d-flex justify-content-center min-vh-100 align-items-center">
     
                    <?php
                if(isset($_GET['id']))
                {

                //    echo  $product_id = $_GET['id'];
                    $product_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM products WHERE id='$product_id'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run)> 0)
                    {
                        $product = mysqli_fetch_array($query_run);

                        ?>
            <!-- form inside the php  -->
                    <form action="code.php" method="POST">

                    <?php include('alerts/fail.php'); ?>
                    <?php include('alerts/message.php'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="productID"></label>
                                    <input type="hidden" name="product_id" value="<?= $product_id?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="name" value="<?=$product['name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productQty">Quantity</label>
                                    <input type="number" class="form-control" id="productQty" name="quantity" value="<?=$product['quantity'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <button type="submit" name="updateProduct" class="btn btn-success">Update</button>
                        </div>
                    </form>

            <!-- form inside the php end -->

                    <?php
                        
                        // print_r($product);
                    }
                    else
                    {
                        echo "<h3> No such ID found </h3>";
                    }

                }

                ?>

            </div>
                    

<?php include("includes/footer.php")?>