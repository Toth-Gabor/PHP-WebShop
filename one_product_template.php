<?php

include "services/simpleServices/SimpleProductServices.php";
global $home_url;
$services = new SimpleProductServices();
// get id from query string
$id = htmlspecialchars($_GET["id"]);
// TODO: az id nem lehet null!!
$product = $services->ReadOne($id);

// check product stock
if ($product->getQuantity() == 0){
    $block_add_to_cart = "disabled";
    $button_text = "Out of stock!";
} else{
    $block_add_to_cart = "";
    $button_text = "Add to cart";
}
?>
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
        <img onerror="this.src='uploads/default.jpg'" src='<?= $product->getImage() ?>' style='width:300px;' />
    </div>
    <div class="col-md-12">
        <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button" class="<?= $block_add_to_cart?> btn btn-labeled btn-success">
            <span class="btn-label"></span><?= $button_text?></a>
    </div>
<?php



