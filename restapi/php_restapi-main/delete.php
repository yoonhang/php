<?php

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

// 인스턴스 생성
$product = new Product($db);

$product->id = $id;
if ($product->delete()) {
  $a = ["message" => "Product deleted."];
  echo json_encode($a); 
} else {
  $a = ["message" => "Product not deleted."];
  echo json_encode($a); 
}