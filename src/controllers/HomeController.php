<?php

require_once 'src/models/ProductsModel.php';

class HomeController
{
  private $model;

  public function __construct()
  {
    $this->model = new ProductsModel();
  }

  public function show()
  {
    require "src/libs/mustBeLogged.php";
    $products = $this->model->getProductsByUserId($_SESSION['user']['id']);
    require "src/views/HomeView.php";
  }
}