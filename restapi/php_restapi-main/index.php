<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$part = explode('/', $_SERVER['REDIRECT_URL']);

// GET PUT POST DELETE
// GEt /products/1
// POST /products
// /products
// PUT /products/1

if($part[1] == 'products') {

  include './core/config.php';
  include './core/product.php';
  
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(isset($part[2]) && is_numeric($part[2])) {
      $id = $part[2];
      include 'read_one.php';
    } else {
      include 'read_all.php';
    }

  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'create.php';
  } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    if(isset($part[2]) && is_numeric($part[2])) {
      $id = $part[2];
      include 'update.php';
    } else {
      $a = ["message" => "Id not found"];
      echo json_encode($a);      
    }
  } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    if(isset($part[2]) && is_numeric($part[2])) {
      $id = $part[2];
      include 'delete.php';
    } else {
      $a = ["message" => "Id not found"];
      echo json_encode($a);      
    }

  }

} else {
  $a = ["message" => "Not found"];
  echo json_encode($a);
}