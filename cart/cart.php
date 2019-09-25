<?php
include_once "../config/core.php";

$page_title = "Cart";

include_once __DIR__ . "/../cart/layout_head.php";
include_once __DIR__ . "/../services/simpleServices/SimpleProductServices.php";
$service = new SimpleProductServices();

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo "<div class='col-md-12'>";
        if($action=='removed'){
            echo "<div class='alert alert-info'>";
                echo "Product was removed from your cart!";
            echo "</div>";
        }

        else if($action=='quantity_updated'){
            echo "<div class='alert alert-info'>";
                echo "Product quantity was updated!";
            echo "</div>";
        }
echo "</div>";

if (!isset($_SESSION['cart']) || ($_SESSION['cart'] == 0)){?>
    <div class='col-md-12'>
        <div class='alert alert-danger'>No products found in your cart</div>
    </div>
    <?php
} else {
    $ids = array();
    $total=0;
    $item_count=0;
    foreach($_SESSION['cart'] as $id=>$value){
        echo "<div class='cart-row'>";
        $quantity=$_SESSION['cart'][$id]['quantity'];

        $cart_product = $service->ReadOne($id);
        $name = $cart_product->getName();
        $price = $cart_product->getPrice();

        $sub_total=$price*$quantity;
        // include one cart item template
        include "cart_item_template.php";
        $item_count += $quantity;
        echo "</div>";
        $total += $sub_total;



    }
    echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-4'>";
        echo "<div class='cart-row'>";
            echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
            echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='../index.php?action=purchased' class='btn btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout";
            echo "</a>";
    echo "</div>";
    echo "</div>";
}
include '../layout_foot.php';
?>
