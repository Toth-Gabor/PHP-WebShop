<?php
session_start();

include_once "../services/simpleServices/SimpleOrderServices.php";

$orderServices = new SimpleOrderServices();

$user_id = $_SESSION['user_id'];
$order = json_encode($_SESSION['cart']);
// add oder to database
$orderServices->AddOrder($user_id, $order);

//var_dump($order);
unset($_SESSION['cart']);

// redirect to product list and thank the user for the order
header('Location: ../index.php?action=purchased');
