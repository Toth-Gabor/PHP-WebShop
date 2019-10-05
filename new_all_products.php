<?php

global $product_srv;
global $category;

$hide_add_button = "";

if ($category != ""){
    // get category filtered products
    $productsList = $product_srv->ReadAllByCategory($category);
} else {
    // get all products
    $productsList = $product_srv->ReadAll();
}

echo "<div class='container-fluid'>";

foreach ($productsList as $product) {
    // hide add button if quantity is 0
    if ($product->getQuantity() == 0) {
        $hide_add_button = "disabled";
    }
    ?>
    <div class="col-sm-3" style="border: royalblue">
        <div class="thumb-wrapper">
            <div class="img-box mx-auto">
                <img onerror="this.src='uploads/default.jpg'" src='<?= $product->getImage() ?>'
                     class="img-responsive img-fluid" alt=""/>
            </div>
            <div class="thumb-content">
                <h4><?= $product->getName() ?></h4>
                <p class="item-price"><span>Price: $<?= $product->getPrice() ?>.00</span></p>
            </div>
            <div>
                <a href='product.php?id=<?= $product->getId() ?>' class='btn btn-labeled btn-info btn-sm m-0'>Details</a>
                <a href="cart/add_to_cart.php?id=<?= $product->getId() ?>" type="button"
                   class="<?= $hide_add_button ?>  btn btn-labeled btn-success btn-sm m-0">
                    <span class="btn-label"></span>Add to Cart</a>
            </div>
        </div>
    </div>

    <?php
}

