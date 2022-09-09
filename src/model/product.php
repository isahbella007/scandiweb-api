<?php
namespace src\Model; 
class Product
{
    public $SKU;
    public $name;
    public $price;
    public $product_type;
    public $product_detail;

    public function __construct($SKU, $name, $price, $product_type, $product_detail)
    {
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = $price;
        $this->product_type = $product_type;
        $this->product_detail = $product_detail;
    }

    public function getSKU(){ 
        return $this->SKU; 
    }

    public function getName(){ 
        return $this->name; 
    }

    public function getPrice(){ 
        return $this->price; 
    }

    public function getProductType(){ 
        return $this->product_type; 
    }

    public function getProductDetail(){ 
        return $this->product_detail; 
    }

    // setter  methods 
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
    }

    public function setProductDetail($product_detail)
    {
        $this->product_detail = $product_detail;
    }
}
