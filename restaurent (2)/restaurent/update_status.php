<?php
// Start session to retrieve customer data
session_start();

// Check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Include database connection file
    require_once "db.php";

    // Get customer id and username from session
    $customer_id = $_SESSION["id"];
    $username = $_SESSION["username"];

    // Prepare and execute SQL to insert order into the orders table
    $sql = "UPDATE orders SET status='Done' WHERE customer_id=$customer_id AND username='$username'";

    // echo $sql;
    // Execute the statement
    if(mysqli_query($link,$sql)){
        echo 'Order Updated successfully!';
    } else{
        // echo mysqli_error($link);
        echo 'Error Updating order!';
    }
    
} else {
    echo 'Please log in to place an order!';
}
?>
