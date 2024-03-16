
<?php include("includes/header.php")?>
<?php include("includes/navBar.php")?>
<?php include("includes/sideNav.php")?>

            <!-- main content -->
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Goods</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="addProduct.php">Add Product</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Documents</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Upload Document</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    
                </div>
                
                
                <div class="card mb-4">
                    <div class="card-header">
                    <h2>Product List</h2>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-responsive-sm" id="myTable">
                        <thead class="thead-light">
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
                </div>  
            </main>
            <!-- main content -->

<?php include("includes/footer.php")?>