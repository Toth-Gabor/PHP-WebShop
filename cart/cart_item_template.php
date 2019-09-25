<?php
global $name;
global $price;
global $quantity;
?>
<div class='col-md-8'>
        <div class='product-name m-b-10px'>
            <h4><?= $name ?></h4>
        </div>
        <!--update quantity-->
        <form class='update-quantity-form'>
            <div class='product-id' style='display:none;'><?= $id?></div>
            <div class='input-group'>
                <input type='number' name='quantity' value='<?= $quantity?>' class='form-control cart-quantity' min='1' />
                <span class='input-group-btn'>
                    <button class='btn btn-primary' type='submit'>Update</button>
                </span>
                <span class='input-group-btn'>
                    <!--delete from cart-->
                    <a href='remove_from_cart.php?id=<?= $id?>' class='btn btn-danger'>Delete</a>
                </span>
            </div>
        </form>

    </div>
        <div class='col-md-4'>
            <?php echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>"; ?>
        </div>
