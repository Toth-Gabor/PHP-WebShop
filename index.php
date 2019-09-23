<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title="Index";


// include page header HTML
include_once 'layout_head.php';

echo "<div class='col-md-12'>";
    // content once logged in
    echo "<div class='alert alert-info'>";
        echo "Content when logged in will be here. For example, your premium products or services.";
    echo "</div>";
include_once "all_products_template.php";
echo "</div>";

// footer HTML and JavaScript codes
include 'layout_foot.php';
