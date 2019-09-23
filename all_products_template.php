<?php

include "services/simpleServices/SimpleProductServices.php";

$SAPS = new SimpleProductServices();
$productsList = $SAPS->ReadAll();

?>
<div>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Brand</strong></th>
            <th><strong>Specification</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Price</strong></th>
            <th><strong>Stock</strong></th>
            <th><strong>Image Url</strong></th>
            <th><strong>Category</strong></th>
            <th><strong>Click?</strong></th>
        </tr>
        <?php foreach ($productsList as $product){
            ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getBrand() ?></td>
                <td><?= $product->getSpecification() ?></td>
                <td><?= $product->getDescription() ?></td>
                <td><?= $product->getQuantity() ?></td>
                <td><?= $product->getPrice() ?></td>
                <td><?= $product->getImage() ?></td>
                <td><?= $product->getCategory() ?></td>
                <td><?= "<a href='product.php?id={$product->getId()}' class='product-link'>Click me!</a></td>"?>
            </tr>
        <?php
        }
        ?>
    </table>
</div>




