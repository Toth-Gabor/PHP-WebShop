<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <!-- set the page title, for seo purposes too -->
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Store Front"; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />

    <!-- admin custom CSS -->
    <link href="<?php echo $home_url . "libs/css/customer.css" ?>" rel="stylesheet" />

</head>
<body>

<!-- include the navigation bar -->
<?php include_once 'navigation.php'; ?>


    <?php
    // if given page title is 'Login', do not display the title
    if($page_title == "Index"){
        include_once "carousel.php";
    }
    ?>
<!-- container -->
<div class="container">
