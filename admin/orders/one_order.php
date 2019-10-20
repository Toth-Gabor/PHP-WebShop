<?php
include_once "../../config/core.php";
// must be logged in as admin!
$require_login = true;

include "../../logger/login_checker.php";


$page_title="Read order details";

include_once "../admin_layout_head.php";

$order_id = $_GET['id'];

include_once "one_order_template.php";

include_once "../../layout_foot.php";