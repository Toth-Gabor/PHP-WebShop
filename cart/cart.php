<?php
include_once "../config/core.php";

$page_title = "Cart";

include_once __DIR__ . "/../cart/layout_head.php";
include_once __DIR__ . "/../services/simpleServices/SimpleProductServices.php";

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
} else{
    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value ){
        array_push($ids, $id);
    }
    var_dump($ids);
    var_dump($_SESSION['cart']);

    $quantity=$_SESSION['cart'][1]['quantity'];
    //$sub_total=$price*$quantity;

}
include '../layout_foot.php';
?>
