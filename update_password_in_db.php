<?php
include_once "services/simpleServices/SimpleUserServices.php";

$user_srv = new SimpleUserServices();

if ($_POST){
    $user_id = $_POST['id'];
    $new_pw = $_POST['new_pw'];
    $confirm_pw = $_POST['confirm_pw'];

    if ($new_pw !== $confirm_pw){
        header("Location: change_password.php?action=pw_not_match");
    } else{
        $user_srv->UpdateUserPassword($user_id, $new_pw);
        header("Location: profile.php?action=pw_updated");
    }
}

echo "No post!";
