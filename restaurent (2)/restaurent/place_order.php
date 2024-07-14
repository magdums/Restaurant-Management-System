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

    // Get cart items from AJAX POST data
    $cart = $_POST['cart'];

    // Convert cart items to a string
    $order_details = json_encode($cart);

    // Calculate total amount
    $total_amount = 0;
    foreach ($cart as $item) {
        $total_amount += $item['price'];
    }

    // Prepare and execute SQL to insert order into the orders table
    $sql = "INSERT INTO orders (customer_id, username, order_details, order_date, total_amount, status) 
    VALUES ('$customer_id', '$username', '$order_details', NOW(), '$total_amount', 'Pending')";

    // echo $sql;
    // Execute the statement
    if(mysqli_query($link,$sql)){
        echo 'Order placed successfully!';
    } else{
        // echo mysqli_error($link);
        echo 'Error placing order!';
    }
    
} else {
    echo 'Please log in to place an order!';
}
?>
