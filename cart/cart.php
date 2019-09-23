<?php
include_once "../config/core.php";

$page_title = "Cart";

include_once "../cart/layout_head.php";
if (!isset($_SESSION['cart']) || ($_SESSION['cart'] == 0)){?>
    <div class='col-md-12'>
        <div class='alert alert-danger'>No products found in your cart</div>
    </div>
    <?php
}
include '../layout_foot.php';
?>
