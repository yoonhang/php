<?php
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

// 인스턴스 생성
$product = new Product($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

$product->name  = $data->name;
$product->price = $data->price;
$product->stock = $data->stock;
$product->id    = $id;

if ($product->update()) {
  $a = ["message" => "Product updated."];
  echo json_encode($a); 
} else {
  $a = ["message" => "Product not updated"];
  echo json_encode($a); 
}