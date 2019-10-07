<?php
include_once "services/simpleServices/SimpleProductServices.php";

$product_srv = new SimpleProductServices();

$categories = $product_srv->ReadAllCategories();
?>

<!-- navbar -->
<div class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation"
     style="background-color: -moz-mac-accentdarkshadow; margin-bottom: 0">
    <div class="container-fluid">

        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $home_url; ?>">DSLR Shop</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo $home_url; ?>" role="button"><span class="glyphicon glyphicon-home"></span> Home</a>
                </li>
                <li>
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-list"></span> Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <!-- create categories drop down menu-->
                        <?php foreach ($categories as $category){?>
                          <li><a href='index.php?category=<?= $category['category']?>'><?= $category['category']?></a></li>
                        <?php }?>
                        <li><a href='index.php?category='>All</a></li>
                    </ul>
                </li>
            </ul>

            <?php

            // check if users / customer was logged in
            // if user was logged in, show "Edit Profile", "Orders" and "Logout" options
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['access_level'] == 'Customer') {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo $home_url; ?>cart/cart.php">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                        </a>
                    </li>

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                            &nbsp;&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo $home_url; ?>logger/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
            } elseif (false) {

            } // if user was not logged in, show the "login" and "register" options
            else {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo $home_url; ?>cart/cart.php">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $home_url; ?>logger/login.php">
                            <span class="glyphicon glyphicon-log-in"></span> Log In
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo $home_url; ?>logger/register.php">
                            <span class="glyphicon glyphicon-check"></span> Register
                        </a>
                    </li>
                </ul>
                <?php
            }
            ?>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- /navbar -->
