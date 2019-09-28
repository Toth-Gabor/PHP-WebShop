<?php
session_start();

$user_id = $_SESSION['user_id'];
$order = json_encode($_SESSION['cart']);
//var_dump($order);
unset($_SESSION['cart']);

// redirect to product list and thank the user for the order
header('Location: ../index.php?action=purchased');
