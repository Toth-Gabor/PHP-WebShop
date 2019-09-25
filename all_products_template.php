<?php

include "services/simpleServices/SimpleProductServices.php";

$SAPS = new SimpleProductServices();

$productsList = $SAPS->ReadAll();


?>

<div"> <!-- col-md-4 m-b-20px -->
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
            <th><strong>Select</strong></th>
            <th><strong>Add to Cart</strong></th>
        </tr>
        <?php foreach ($productsList as $product){
            ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getBrand() ?></td>
                <td><?= $product->getSpecification() ?></td>
                <td><?= $product->getDescription() ?></td>
                <td>$<?= $product->getPrice() ?></td>
                <td><?= $product->getQuantity() ?></td>
                <td><?= $product->getImage() ?></td>
                <td><?= $product->getCategory() ?></td>
                <td><?= "<a href='product.php?id={$product->getId()}' class='btn btn-labeled btn-success'>Select</a></td>"?>
                <td><a href="cart/add_to_cart.php?id=<?= $product->getId() ?>" type="button" class="btn btn-labeled btn-success">
                    <span class="btn-label"></span>Add to cart</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>




