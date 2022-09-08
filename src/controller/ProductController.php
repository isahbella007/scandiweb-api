<?php

include('./src/model/product.php');
class ProductController{ 

    public $service; 
    public function __construct(ProductService $service)
    {
        $this->service = $service; 
    }
    public function processRequest($method): void{ 
        // base the request on the process method
        // if there is an id, that means I am dealing with a specific data else I am dealing with a collection. 
        $this->processCollectionRequest($method); 
    }
    
    private function processCollectionRequest($method){ 
        if(strtolower($method) == 'get'){ 
            echo json_encode($this->service->getAll()); 
        }
        if(strtolower($method) == 'post'){ 
            $data = json_decode(file_get_contents("php://input"), true) ; 
            $productObject = new model\Product($data["SKU"], $data["name"], $data["price"], $data["productType"],  $data["productDetail"]);
            // print_r( $productObject); 
            $this->service->AddProduct($productObject);
            return json_encode([
                "message" => "Product Added"
            ]);
        }
        try{ 
            if(strtolower($method) == 'delete'){ 
                $data = json_decode(file_get_contents("php://input"), true) ; 
                $this->service->MassDelete($data); 
    
                return json_encode([
                    "message" => "Product Deleted"
                ]);
            }
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
        
    }
}
