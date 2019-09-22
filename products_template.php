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
        echo "<th><bold>Quantity</bold></th>";
        echo "<th><bold>Price</bold></th>";
        echo "<th><bold>Image Url</bold></th>";
        echo "<th><bold>Category</bold></th>";
        foreach ($productsList as $product) {
            $id = $product->getId();
            $name = $product->getName();
            $brand = $product->getBrand();
            $specification = $product->getSpecification();
            $description = $product->getDescription();
            $quantity = $product->getQuantity();
            $price = $product->getPrice();
            $image = $product->getImage();
            $category = $product->getCategory();

            echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$brand</td>";
                echo "<td>$specification</td>";
                echo "<td>$description</td>";
                echo "<td>$quantity</td>";
                echo "<td>$price</td>";
                echo "<td>$image</td>";
                echo "<td>$category</td>";
            echo "</tr>";
        }
    echo "</table>";

echo "</div>";




