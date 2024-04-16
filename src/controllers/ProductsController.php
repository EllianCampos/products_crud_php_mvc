<?php

require_once 'src/models/ProductsModel.php';

class ProductsController
{
  private $model;

  public function __construct()
  {
    $this->model = new ProductsModel();
  }

  private function validateData($name, $price)
  {
    $error = null;

    // Validate name
    if (empty($name)) {
      return $error = "The product name is required";
    }
    if (strlen($name) < 5) {
      return $error = "The product name must be at least 5 characters";
    }

    return $error;
  }

  public function show()
  {
    require "src/libs/mustBeLogged.php";
    $productId = $_GET["productId"];
    $product = $this->model->getProductByIdAndUserId($productId, $_SESSION['user']['id']);
    if ($product == null) {
      header("Location: index.php?controller=home&action=show");
      return;
    }
    require "src/views/products/showProduct.php";
  }

  public function add()
  {
    require "src/libs/mustBeLogged.php";

    $method = $_SERVER["REQUEST_METHOD"];
    $name = $price = "";
    $error = null;

    // Validate method is GET to show the form
    if ($method == "GET") {
      require "src/views/products/AddProduct.php";
      return;
    }

    $name = $_POST["name"];
    $price = $_POST["price"];

    // Validate data
    $error = $this->validateData($name, $price);
    if ($error != null) {
      require "src/views/products/AddProduct.php";
      return;
    }

    // Special validation for the price
    if (empty($price)) {
      $price = 0;
    }

    $result = $this->model->addProduct($name, $price, $_SESSION['user']['id']);
    header("Location: index.php?controller=home&action=show");
  }

  public function edit()
  {
    require "src/libs/mustBeLogged.php";

    // Search product
    $productId = $_GET["productId"];
    $product = $this->model->getProductByIdAndUserId($productId, $_SESSION['user']['id']);

    // Validate if the product exists
    if ($product == null) {
      header("Location: index.php?controller=home&action=show");
      return;
    }

    $name = $product["name"];
    $price = $product["price"];
    $error = null;

    // Validate method is GET to show the form
    $method = $_SERVER["REQUEST_METHOD"];
    if ($method == "GET") {
      require "src/views/products/EditProduct.php";
      return;
    }

    $name = $_POST["name"];
    $price = $_POST["price"];

    // Validate data
    $error = $this->validateData($name, $price);
    if ($error != null) {
      require "src/views/products/EditProduct.php";
      return;
    }

    // Special validation for the price
    if (empty($price)) {
      $price = 0;
    }

    // Update
    $result = $this->model->editProduct($productId, $name, $price);
    header("Location: index.php?controller=home&action=show");
  }

  public function delete()
  {
    require "src/libs/mustBeLogged.php";

    $productId = $_GET["productId"];
    $product = $this->model->getProductByIdAndUserId($productId, $_SESSION['user']['id']);
    if ($product == null) {
      header("Location: index.php?controller=home&action=show");
      return;
    }

    // Delete
    $result = $this->model->delteProduct($productId);
    header("Location: index.php?controller=home&action=show");
  }
}
