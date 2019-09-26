<?php
include_once "../config/core.php";

$page_title = "Cart";

include_once __DIR__ . "/../cart/layout_head.php";
include_once __DIR__ . "/../services/simpleServices/SimpleProductServices.php";
$service = new SimpleProductServices();

// c
if (!isset($_SESSION['access_level'])){
    $block_checkout = "disabled";
    $checkout_text = "Please login first!";
} else{
    $block_checkout = "";
    $checkout_text = "Proceed to Checkout";
}


$action = isset($_GET['action']) ? $_GET['action'] : "";
//$id = isset($_GET['id']) ? $_GET['id'] : "";

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
    $total = 0;
    $item_count = 0;
    $row_count = 0;
    ?>
    <div class="width-50-percent" >
        <table class='table table-hover table-responsive '>
            <tr>
                <th><h4><strong>#</strong></h4></th>
                <th><h4><strong>Name</strong></h4></th>
                <th><h4><strong>Update</strong></h4></th>
                <th><h4><strong>Delete</strong></h4></th>
                <th><h4><strong>Price</strong></h4></th>
            </tr>

            <?php foreach($_SESSION['cart'] as $id=>$value){
                    $quantity=$_SESSION['cart'][$id]['quantity'];
                    $row_count += 1;
                    $cart_product = $service->ReadOne($id);
                    $name = $cart_product->getName();
                    $price = $cart_product->getPrice();
                    $sub_total=$price*$quantity;

                    // include one cart item template
                    include "cart_item_template.php";

                    $item_count += $quantity;
                    $total += $sub_total;
            }
            echo "</table>";
            // Show total price and checkout button
            echo "<div class='col-md-8'></div>";
                echo "<div class='pull-right'>";
                    echo "<div class='float-right'>";
                        echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
                        echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
                        echo "<a href='../index.php?action=purchased' class='{$block_checkout} btn btn-success m-b-10px' >";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> {$checkout_text}";
                        echo "</a>";
                echo "</div>";
            echo "</div>";
    echo "</div>";
}
include '../layout_foot.php';
?>
