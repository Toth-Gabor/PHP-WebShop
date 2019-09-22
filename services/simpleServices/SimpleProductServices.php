<?php

include_once "services/ProductServices.php";
include_once "Database/Dao/DatabaseProductDao.php";

class SimpleProductServices implements ProductServices {

    private $productDao;

    public function __construct()
    {
        $this->productDao = new DatabaseProductDao();
    }


    public function ReadAll()
    {
        return $this->productDao->GetAll();
    }

    public function ReadOne($product_id)
    {
        return $this->productDao->GetOneById($product_id);
    }
}