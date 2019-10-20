<?php
// core configuration
include_once "../../config/core.php";

include_once "../../services/simpleServices/SimpleUserServices.php";

$user_srv = new SimpleUserServices();

// set page title
$page_title = "Users";

// must be logged in as admin!
$require_login = true;

include "../../logger/login_checker.php";

// include page header HTML
include_once "../admin_layout_head.php";

echo "<div class='col-md-12'>";

// read all users from the database
$usersList = $user_srv->ReadUsersBetween($from_record_num, $records_per_page);

// count retrieved users
$num = count($usersList);

// to identify page for paging
$page_url="read_users.php?";

// include products table HTML template
include_once "read_users_template.php";

echo "</div>";

// include page footer HTML
include_once "../../layout_foot.php";
