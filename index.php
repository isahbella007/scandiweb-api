<?php

declare(strict_types=1);

use src\Config\Connection;
use src\Controller\ProductController;
use src\Services\ProductService;

require './vendor/autoload.php';

// set_exception_handler("ErrorHandler::handleException");
header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Origin: https://fancy-marshmallow-3cf372.netlify.app"); 
header("Access-Control-Allow-Origin: http://localhost:3000"); 
// header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header("Accept-Encoding: deflate");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$parts = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode("/", $parts);

$parts3 = $parts[1] ??  null;
if ($parts3 != "products") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$database = new Connection();

$service = new ProductService($database);

$controller = new ProductController($service);

$controller->processRequest($_SERVER['REQUEST_METHOD']);

?>