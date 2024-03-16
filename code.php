<?php
session_start();
require 'dbcon.php';



// Update product code ==========================================================>

if(isset($_POST['updateProduct']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

    $query = "UPDATE products SET name= '$name', quantity='$quantity' 
                WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Updated Successfuly";
        header("Location: addProduct.php");
        exit(0);
    }
    else
    {
        $_SESSION['error'] = "Error updating";
        header("Location: addProduct.php");
        exit(0);

    }


}

// Update product end  ==========================================================>

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








?>