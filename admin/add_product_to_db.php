<?php
include_once "../services/simpleServices/SimpleProductServices.php";
$product_srv = new SimpleProductServices();
// get info from post
$name = $_POST['name'];
$brand = $_POST['brand'];
$specification = $_POST['specification'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['stock'];
$image = $_POST['image'];
$category = $_POST['category'];

// add to database
$product_srv->CreateProduct($name, $brand, $specification, $description, $price, $quantity, $image, $category);

header('Location: ../admin/index.php?action=added');