<?php
// core configuration
include_once "../config/core.php";
// set page title
$page_title="Admin Index";

$require_login = true;

// include page header HTML
include 'admin_layout_head.php';

echo "<div class='col-md-12'>";

    // get parameter values, and to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // tell the user he's already logged in
    if($action=='already_logged_in'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You</strong> are already logged in.";
        echo "</div>";
    }
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product has been <strong>Added</strong> to database.";
        echo "</div>";
    }

    else if($action=='logged_in_as_admin'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You</strong> are logged in as admin.";
        echo "</div>";
    }
    echo "<div class='alert alert-info'>";
        echo "Welcome back admin " . $_SESSION['firstname'];
    echo "</div>";


echo "</div>";

// include page footer HTML
include_once '../layout_foot.php';
