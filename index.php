<?php
// core configuration
include_once "config/core.php";
// TODO: add category filter

// set page title
$page_title="Index";
// include page header HTML

include_once "layout_head.php";

$category = isset($_GET['category']) ? ($_GET['category']) : "";

$action = isset($_GET['action']) ? $_GET['action'] : "";
echo "<div class='col-md-12'>";

// alert if item added to cart
if($action=='added'){?>
    <script type="text/javascript">
        swal({title:'Success', text:'This item has been added to Cart!', type:'success', timer:1700});
    </script> <?php
}

// alert if item already added to cart
if($action=='exists'){?>
    <script type="text/javascript">
        swal({title:'Warning', text:'This item already exists in your Cart!', type:'warning', timer:1700});
    </script> <?php
}

// alert if items purchased
if($action=='purchased') {?>
    <script type="text/javascript">
        swal({title:'Success', text:'Thank you for your purchase! You can lay down, your products will arrive soon!', type:'success', timer:3000});
    </script> <?php

}
include_once "new_all_products.php";
echo "</div>";

//include_once "all_products_template.php";


// footer HTML and JavaScript codes
include 'layout_foot.php';
