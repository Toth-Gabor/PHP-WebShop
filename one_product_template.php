<?php

include "services/simpleServices/SimpleProductServices.php";

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
<div>
    <ul>
        <li><?= $product->getId() ?></li>
        <li><?= $product->getName() ?></li>
        <li><?= $product->getBrand() ?></li>
        <li><?= $product->getSpecification() ?></li>
        <li><?= $product->getDescription() ?></li>
        <li><?= $product->getQuantity() ?></li>
        <li><?= $product->getPrice() ?></li>
        <li><?= $product->getImage() ?></li>
        <li><?= $product->getCategory() ?></li>
    </ul>
</div>
    <div class="col-md-12">
        <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button" class="<?= $block_add_to_cart?> btn btn-labeled btn-success">
            <span class="btn-label"></span><?= $button_text?></a>
    </div>
<?php



