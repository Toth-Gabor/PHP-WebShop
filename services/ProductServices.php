<?php

interface ProductServices{

    public function ReadAll();
    public function ReadOne($product_id);
    public function ReadAllByIds($productIdList);
}