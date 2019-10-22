<?php
include_once "config/core.php";
include_once "services/simpleServices/SimpleUserServices.php";

$user_srv = new SimpleUserServices();
var_dump($_SESSION['user_id']);
$user_id = $_GET['id'];
// get info from post
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$address = $_POST['address'];

$user_srv->UpdateUserDetails($user_id, $firstName, $lastName, $email, $contactNumber, $address);
header("Location: logger/login.php?action=updated");

session_destroy();

