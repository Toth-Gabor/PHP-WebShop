<?php

include __DIR__ . "/../../services/simpleServices/SimpleProductServices.php";

$services = new SimpleProductServices();

$hide_delete_button = "";
$hide_add_button = "";

// show/hide buttons depend on access level
if(!isset($_SESSION['access_level']) || $_SESSION['access_level']!="Admin"){
    $hide_delete_button = "hidden";
}
if (isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    $hide_add_button = "hidden";
}
// get all products
$productsList = $services->ReadAll();
?>

<div"> <!-- col-md-4 m-b-20px -->
    <table class='table table-hover table-responsive '>
        <thead>
            <tr>
                <th><strong>#</strong></th>
                <th><strong>Name</strong></th>
                <!--<th><strong>Brand</strong></th>-->
                <!--<th><strong>Specification</strong></th>-->
                <!--<th><strong>Description</strong></th>-->
                <th><strong><span class="pull-right">Price</span></strong></th>
                <th><strong><span class="pull-right">Stock</span></strong></th>
                <!--<th><strong>Image Url</strong></th>-->
                <th><strong>Category</strong></th>
                <th><strong>Actions</strong></th>
                <!--<th><strong>Add to Cart</strong></th>-->
            </tr>
        </thead>
        <?php foreach ($productsList as $product){
            // check product stock
            if ($product->getQuantity() == 0){
                $block_checkout = "disabled";
                $button_text = "Out of stock!";
            } else{
                $block_checkout = "";
                $button_text = "Add to cart";
            }
            ?>
            <tr>
                <td><span class="margin-1em-zero"><?= $product->getId() ?></span></td>
                <td><span class="margin-1em-zero"><?= $product->getName() ?></span></td>
                <!--<td><?= $product->getBrand() ?></td>-->
                <!--<td><?= $product->getSpecification() ?></td>-->
                <!--<td><?= $product->getDescription() ?></td>-->
                <td><span class="pull-right">$<?= $product->getPrice() ?></span></td>
                <td><span class="pull-right"><?= $product->getQuantity() ?></span></td>
                <!--<td><?= $product->getImage() ?></td>-->
                <td><?= $product->getCategory() ?></td>
                <td>
                    <?= "<a href='products/admin_product.php?id={$product->getId()}' class='btn btn-labeled btn-info btn-sm m-0'>Details</a>"?>
                         <a href=products/delete_product.php?id=<?= $product->getId() ?>" type="button" class="<?= $hide_delete_button?> btn btn-labeled btn-danger btn-sm m-0">
                            <span class="btn-label"></span>Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>




