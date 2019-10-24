<?php
if (strpos($_SERVER['REQUEST_URI'], '?') !== false){
    $uri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
} else {
    $uri = $_SERVER['REQUEST_URI'];
}


$adminPages = array("{$context_path}admin/index.php",
               "{$context_path}admin/orders/orders.php",
               "{$context_path}admin/orders/one_order.php",
               "{$context_path}admin/users/read_users.php",
               "{$context_path}admin/products/admin_product.php",
               "{$context_path}admin/products/create_product.php",
               "{$context_path}admin/products/edit_product.php",
               "{$context_path}auth/login.php");

$customerPages = array("{$context_path}",
                       "{$context_path}profile.php",
                       "{$context_path}index.php",
                       "{$context_path}product.php",
                       "{$context_path}cart.php",
                       "{$context_path}auth/login.php",
                       "{$context_path}auth/register.php");

$guestPages = array("{$context_path}",
                    "{$context_path}index.php",
                    "{$context_path}product.php",
                    "{$context_path}cart.php",
                    "{$context_path}auth/login.php",
                    "{$context_path}auth/register.php");
//var_dump($uri);
//var_dump(checkArrayContains($adminPages, $uri));
//var_dump(checkArrayContains($customerPages, $uri));
//var_dump(checkArrayContains($guestPages, $uri));

if (isset($_SESSION['access_level'])) {
    if ($_SESSION['access_level'] == "Customer") {

        if (checkArrayContains($customerPages, $uri)) {
            return;
        }
        //header("Location: {$home_url}index.php");

    } else if ($_SESSION['access_level'] == "Admin") {
        if (checkArrayContains($adminPages, $uri)) {
            return;
        }
        //header("Location: {$home_url}admin/index.php");
    } else {
        die("Unknown access level: {$_SESSION['access_level']}");
    }
} else if (checkArrayContains($guestPages, $uri)) {
    //header("Location: {$home_url}auth/login.php?action=incorrect");
    return;
} else {
    header("Location: {$home_url}auth/login.php?action=incorrect");
}


function checkArrayContains($urlArr, $url)
{
    return in_array($url, $urlArr) ? true : false;

}