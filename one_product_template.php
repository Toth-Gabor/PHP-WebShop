<?php

include "services/simpleServices/SimpleProductServices.php";

$services = new SimpleProductServices();
// get id from query string
$id = htmlspecialchars($_GET["id"]);
// TODO: az id nem lehet null!!
$product = $services->ReadOne($id);

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
        <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button" class="btn btn-labeled btn-success">
            <span class="btn-label"></span>Add to cart</a>
    </div>
<?php



