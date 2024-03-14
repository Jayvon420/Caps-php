<?php
session_start();
require 'dbcon.php';

// adding product code ==========================================================>
if(isset($_POST['add_product'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

    $checkQuery = "SELECT * FROM products WHERE name = '$name'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['error'] = "Product Already exist";
        header("Location: addProduct.php");
        exit(0);
    } 
    else 
    {

        $query = "INSERT INTO products (name, quantity) VALUES ('$name','$quantity')";

        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Product Added Successfuly";
            header("Location: addProduct.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Error !!";
            header("Location: addProduct.php");
            exit(0);
        }

    }

}
// adding product code end =======================================================>



// Update product code ==========================================================>




// Update product end  ==========================================================>





?>