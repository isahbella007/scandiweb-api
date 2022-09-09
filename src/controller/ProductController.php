<?php

namespace src\Controller;

use Exception;
use src\Model\Product;
use src\Services\ProductService as ProductService;

class ProductController
{

    public $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    public function processRequest($method): void
    {
        $this->processCollectionRequest($method);
    }

    private function processCollectionRequest($method)
    {
        if (strtolower($method) == 'get') {
            echo json_encode($this->service->getAll());
        }
        if (strtolower($method) == 'post') {
            $data = json_decode(file_get_contents("php://input"), true);
            $productObject = new Product($data["SKU"], $data["name"], $data["price"], $data["productType"],  $data["productDetail"]);
            // print_r( $productObject); 
            $this->service->addProduct($productObject);
            return json_encode([
                "message" => "Product Added"
            ]);
        }
        try {
            if (strtolower($method) == 'delete') {
                $data = json_decode(file_get_contents("php://input"), true);
                $this->service->massDelete($data);

                return json_encode([
                    "message" => "Product Deleted"
                ]);
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
