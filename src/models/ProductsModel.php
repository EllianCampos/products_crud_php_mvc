<?php

class ProductsModel
{
  public function getProductsByUserId($userId)
  {
    require_once 'src/db.php';
    $query = $conn->prepare("SELECT * FROM products WHERE userId = :userId");
    $query->bindParam(":userId", $userId);
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  public function getProductByIdAndUserId(int $productId, $userId)
  {
    require_once "src/db.php";
    $query = $conn->prepare("SELECT * FROM products WHERE id = :id AND userId = :userId");
    $query->bindParam(":id", $productId);
    $query->bindParam(":userId", $userId);
    $query->execute();

    if ($query->rowCount() == 0) {
      return null;
    }

    $product = $query->fetch(PDO::FETCH_ASSOC);
    return $product;
  }

  public function addProduct($name, $price, $userId)
  {
    require_once 'src/db.php';
    $query = $conn->prepare("INSERT INTO products (name, price, userId) VALUES (:name, :price, :userId)");
    $query->bindParam(":name", $name);
    $query->bindParam(":price", $price);
    $query->bindParam(":userId", $userId);
    $success = $query->execute();
    return $success;
  }

  public function editProduct($productId, $name, $price)
  {
    require 'src/db.php';
    $query = $conn->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
    $query->bindParam(":id", $productId);
    $query->bindParam(":name", $name);
    $query->bindParam(":price", $price);
    $success = $query->execute();
    return $success;
  }

  public function delteProduct($productId)
  {
    require "src/db.php";
    $query = $conn->prepare("DELETE FROM products WHERE id = :id");
    $query->bindParam(":id", $productId);
    $success = $query->execute();
    return $success;
  }
}