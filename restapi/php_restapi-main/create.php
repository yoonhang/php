<?php
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

// 인스턴스 생성
$product = new Product($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));
$product->name = $data->name;
$product->price = $data->price;
$product->stock = $data->stock;

if ($product->create()) {
  $a = ["message" => "Product created"];
  echo json_encode($a); // { "message" : "Product created" }
} else {
  $a = ["message" => "Product not created"];
  echo json_encode($a); // { "message" : "Product not created" }
}