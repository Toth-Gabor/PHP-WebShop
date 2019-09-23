<?php

include "services/simpleServices/SimpleProductServices.php";

$SAPS = new SimpleProductServices();

$productsList = $SAPS->ReadAll();
echo "<div>";
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<th><bold>ID</bold></th>";
        echo "<th><bold>Name</bold></th>";
        echo "<th><bold>Brand</bold></th>";
        echo "<th><bold>Specification</bold></th>";
        echo "<th><bold>Description</bold></th>";
        echo "<th><bold>Price</bold></th>";
        echo "<th><bold>Stock</bold></th>";
        echo "<th><bold>Image Url</bold></th>";
        echo "<th><bold>Category</bold></th>";
        foreach ($productsList as $product) {

            echo "<div class='product-id display-none'>{$product->getId()}</div>";
                echo "<a href='product_template.php?id={$product->getId()}' class='product-link'>";
                echo "<tr>";
                        echo "<td>{$product->getId()}</td>";
                        echo "<td>{$product->getName()}</td>";
                        echo "<td>{$product->getBrand()}</td>";
                        echo "<td>{$product->getSpecification()}</td>";
                        echo "<td>{$product->getDescription()}</td>";
                        echo "<td>{$product->getQuantity()}</td>";
                        echo "<td>{$product->getPrice()}</td>";
                        echo "<td>{$product->getImage()}</td>";
                        echo "<td>{$product->getCategory()}</td>";
                    echo "</tr>";
            echo "</div>";
        }
    echo "</table>";

echo "</div>";




