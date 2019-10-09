<?php

global $home_url;
global $product_srv;
// get id from query string
$id = htmlspecialchars($_GET["id"]);

$product = $product_srv->ReadOne($id);

// check product stock
if ($product->getQuantity() == 0) {
    $block_add_to_cart = "disabled";
    $button_text = "Out of stock!";
} else {
    $block_add_to_cart = "";
    $button_text = "Add to cart";
}
?>
    <div class="product-card">
        <div class="img-fluid float-left">
            <!-- new card -->
            <div class="img-container">
                <img onerror="this.src='uploads/default.jpg'" src='<?= $product->getImage() ?>' style='width:300px;'/>
            </div>
        </div>
        <!-- Right Column -->
        <div class="pro">

            <!-- Product Description -->
            <div class="product-description">
                <span><?= $product->getCategory() ?></span>
                <h1><?= $product->getName() ?></h1>
                <p><?= $product->getDescription() ?></p>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>$<?= $product->getPrice() ?>.00</span>
                <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button"
                   class="<?= $block_add_to_cart ?> btn btn-labeled btn-success">
                    <span class="btn-label"></span><?= $button_text ?></a>
                <a href="index.php" type="button" class="btn btn-labeled btn-info">
                    <span class="btn-label"></span>Back</a>
            </div>
        </div>
        <div class="row width-80-percent">
            <p><strong>Description: </strong><?= $product->getDescription() ?></p>

        </div>
    </div>
    <div class="col-md-4">

        <ul>
            <li><strong> Id: </strong><?= $product->getId() ?></li>
            <li><strong> Name: </strong><?= $product->getName() ?></li>
            <li><strong>Brand: </strong><?= $product->getBrand() ?></li>
            <li><strong>Specification: </strong><?= $product->getSpecification() ?></li>
            <li><strong>Description: </strong><?= $product->getDescription() ?></li>
            <li><strong>In Stock: </strong><?= $product->getQuantity() ?></li>
            <li><strong>Price: </strong>$<?= $product->getPrice() ?>.00</li>
            <!--<li><?= $product->getImage() ?></li>-->
            <li><strong>Category: </strong><?= $product->getCategory() ?></li>

        </ul>

    </div>
    <div class="col-md-4">
        <img onerror="this.src='uploads/default.jpg'" src='<?= $product->getImage() ?>' style='width:300px;'/>
    </div>
    <div class="col-md-12">
        <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button"
           class="<?= $block_add_to_cart ?> btn btn-labeled btn-success">
            <span class="btn-label"></span><?= $button_text ?></a>
        <a href="index.php" type="button" class="btn btn-labeled btn-info">
            <span class="btn-label"></span>Back</a>
    </div>
<?php



