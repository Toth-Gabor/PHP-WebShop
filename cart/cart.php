<?php
include_once "../config/core.php";

$page_title = "Cart";
include_once __DIR__ . "/../cart/layout_head.php";
include_once __DIR__ . "/../services/simpleServices/SimpleProductServices.php";
$service = new SimpleProductServices();


// block checkout button if user not logged in
if (!isset($_SESSION['access_level'])){
    $block_checkout = "disabled";
    $checkout_text = "Please login first!";
} else{
    $block_checkout = "";
    $checkout_text = "Proceed to Checkout";
}
$action = isset($_GET['action']) ? $_GET['action'] : "";

if($action=='removed'){?>
    <script type="text/javascript">
        swal({title:'Info', text:'The selected item has been removed from your Cart!', type:'info', timer:1800});
    </script> <?php
}else if($action=='quantity_updated'){?>
    <script type="text/javascript">
        swal({title:'Info', text:'The quantity of selected item has been Updated!', type:'info', timer:1800});
    </script> <?php
}
// alert if cart is empty
if (!isset($_SESSION['cart']) || ($_SESSION['cart'] == 0)){?>
    <script type="text/javascript">
        swal('Info', 'Your cart is <b style="color:deepskyblue;">Empty!</b>', 'info');
    </script>
    <?php
} else {
    $total = 0;
    $item_count = 0;
    $row_count = 0;
    ?>
    <div class="width-50-percent" >
        <table class='table table-striped table-responsive-md btn-table table-hover'>
            <!--create headers-->
            <thead>
                <tr>
                    <th><h4><strong>#</strong></h4></th>
                    <th><h4><strong>Name</strong></h4></th>
                    <th><h4><strong>Update</strong></h4></th>
                    <th><h4><strong>Delete</strong></h4></th>
                    <th><h4><strong>Price</strong></h4></th>
                </tr>
            </thead>
            <!--create cart items-->
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
            echo "<hr class='style1'>";
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
