<?php

namespace src\Services;

use PDO;
use src\Config\Connection;

class ProductService
{

    private $databaseConnection;

    public function __construct(Connection $conn)
    {
        $this->databaseConnection = $conn->connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM products ORDER BY SKU";
        $stmt = $this->databaseConnection->query($query);
        $product_arr = array();
        $product_arr['data'] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $product_item = array(
                'SKU' => $SKU,
                'name' => $name,
                'price' => $price,
                'productType' => $product_type,
                'productDetail' => $product_detail
            );
            array_push($product_arr['data'], $product_item);
        }

        return $product_arr;
    }

    public function addProduct($data)
    {
        $query = "INSERT INTO products (SKU, name, price, product_type, product_detail) VALUES (:SKU, :name, :price, :productType, :productDetail)";
        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute(array(
            ":SKU" => $data->getSKU(),
            ":name" => $data->getName(),
            ":price" => $data->getPrice(),
            ":productType" => $data->getProductType(),
            ":productDetail" => $data->getProductDetail()
        ));

        return $this->databaseConnection->lastInsertId();
    }

    public function massDelete($id)
    {
        $productIds =  implode("','", $id);
        $query = "DELETE FROM products WHERE SKU IN ('" . $productIds . "')";
        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute();
    }
}
