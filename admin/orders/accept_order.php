<?php

include_once "../../services/simpleServices/SimpleOrderServices.php";
include_once "../../services/simpleServices/SimpleUserServices.php";
$order_srv = new SimpleOrderServices();
$user_srv = new SimpleUserServices();

$order_id = $_GET['id'];

$order = $order_srv->ReadOneById($order_id);

$user_id = $order->getUserId();

$user = $user_srv->ReadUserById($user_id);

// send email to customer
$to      = $user->getEmail();
$subject = 'Your order has shipped!';
$message = 'Hi ' . $user->getFirstname() . "\r\n" . 'Your order has shipped!' . "\r\n" .
            'The ordered items should arrive to your shipping address within 3 business days.' . "\r\n" .
            'Thanks for shopping on DSLR Shop!\r\n' . 'XOXO\n' . 'DSLR Shop Team';
$headers = 'From: DSLR Shop';

mail($to, $subject, $message, $headers);

// update order status
$order_srv->UpdateOrderStatus($order_id, "processed");
$action = isset($_GET['action']) ? $_GET['action'] : "";

header('Location: orders.php?action=processed');
