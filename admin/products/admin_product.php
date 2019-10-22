<?php
// core configuration
include_once "../../config/core.php";

// set page title
$page_title="Product";

// must be logged in as admin!
$require_login = true;

//include "../../logger/login_checker.php";

include_once "../admin_layout_head.php";

include_once "admin_one_product_template.php";

include_once "../../layout_foot.php";