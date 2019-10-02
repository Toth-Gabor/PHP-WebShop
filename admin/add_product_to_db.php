<?php
include_once "../services/simpleServices/SimpleProductServices.php";
include_once "../libs/php/utils.php";
$ulils = new Utils();

$product_srv = new SimpleProductServices();
// get info from post
$name = $_POST['name'];
$brand = $_POST['brand'];
$specification = $_POST['specification'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['stock'];
$image=!empty($_FILES["image"]["name"])
    ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
$message = $ulils->uploadPhoto($image);

$category = $_POST['category'];

if ($message == ""){
    // add to database
    $imagePath = $_SESSION['filepath'];
    $product_srv->CreateProduct($name, $brand, $specification, $description, $price, $quantity, $imagePath, $category);

    header('Location: ../admin/index.php?action=added');
} else {
    header('Location: ../admin/create_product.php?message=' . $message);
}


