<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title="Index";


// include page header HTML
include_once 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
echo "<div class='col-md-12'>";
if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "Product was added to your cart!";
    echo "</div>";
}

if($action=='exists'){
    echo "<div class='alert alert-info'>";
        echo "Product already exists in your cart!";
    echo "</div>";
}
if($action=='purchased') {
    echo "<div class='alert alert-info'>";
        echo "Thank you for your purchase! You can lay down, your products will arrive soon!";
    echo "</div>";
    unset($_SESSION['cart']);
}
include_once "all_products_template.php";

echo "</div>";

// footer HTML and JavaScript codes
include 'layout_foot.php';
