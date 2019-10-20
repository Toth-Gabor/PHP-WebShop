<?php
// if access level was not 'Admin', redirect him to login page
if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
}

// if $require_login was set and value is 'true'
else if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['access_level'])){
        header("Location: {$home_url}logger/login.php?action=please_login");
    }
}
// if it was the 'login' or 'register' page but the customer was already logged in
else if(isset($page_title) && $page_title=="Login"){
    // if user not yet logged in, redirect to login page
    if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Customer"){
        header("Location: {$home_url}index.php?action=already_logged_in");
    }
}
