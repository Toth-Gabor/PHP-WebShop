<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title="Index";


// include page header HTML
include_once 'layout_head.php';

include_once "all_products_template.php";
echo "</div>";

// footer HTML and JavaScript codes
include 'layout_foot.php';
