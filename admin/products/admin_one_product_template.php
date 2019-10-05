<?php

include "../../services/simpleServices/SimpleProductServices.php";
global $home_url;
$services = new SimpleProductServices();
// get id from query string
$id = htmlspecialchars($_GET["id"]);

$product = $services->ReadOne($id);

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
        <li><strong>Image Path: </strong><?= $product->getImage() ?></li>
        <li><strong>Category: </strong><?= $product->getCategory() ?></li>
    </ul>
    <div class="col-md-12">
        <a href="edit_product.php?id=<?= $id ?>" type="button" class=" btn btn-labeled btn-success">
            <span class="btn-label"></span>Edit properties</a>
    </div>
</div>

    <div class="col-md-4">
        <img onerror="this.src='../../uploads/default.jpg'" src='../../<?= $product->getImage() ?>' style='width:300px;' />
    </div>

<?php


