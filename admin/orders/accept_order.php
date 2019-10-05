<?php

include_once "../../services/simpleServices/SimpleOrderServices.php";
$order_srv = new SimpleOrderServices();

$order_id = $_GET['id'];
$order_srv->UpdateOrderStatus($order_id, "processed");
$action = isset($_GET['action']) ? $_GET['action'] : "";

header('Location: ../../admin/orders.php?action=processed');
