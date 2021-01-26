<?php
    session_start();
    include('config/dbconn.php');

    if( $_SESSION['loginstatus']=="false"){
      header('location:log_in.php'); }
?>

<?php

$user_id = $_SESSION['user_id'];
$order_id=$_GET['order_id'];

$result = mysqli_query($dbconn, "DELETE FROM order_details WHERE order_details_id=$order_id");

header('location: user_cart.php');
?>

