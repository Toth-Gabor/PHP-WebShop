<?php
// core configuration
include_once "config/core.php";
// TODO: add category filter

// set page title
$page_title="Index";
// include page header HTML
include_once 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
echo "<div class='col-md-12'>";

if($action=='added'){?>
    <script type="text/javascript">
        swal('Success', 'This item has been added to <b style="color:green;">Cart!</b>', 'success');
    </script> <?php
}

if($action=='exists'){?>
    <script type="text/javascript">
        swal('Warning', 'This item already exists in your <b style="color:coral;">Cart!</b>', 'warning');
    </script> <?php
}
if($action=='purchased') {?>
    <script type="text/javascript">
        swal('Success', '<b style="color:green;">Thank you for your purchase! You can lay down, your products will arrive soon!!</b>', 'success');
    </script> <?php

    $order = json_encode($_SESSION['cart']);
    var_dump($order);
    unset($_SESSION['cart']);
}
include_once "all_products_template.php";

echo "</div>";

// footer HTML and JavaScript codes
include 'layout_foot.php';
