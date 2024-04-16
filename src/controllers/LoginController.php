<?php

require_once "src/models/LoginModel.php";

class LoginController
{
  private $model;

  public function __construct()
  {
    $this->model = new LoginModel();
  }

  private function validateEmail($email)
  {
    $error = null;

    if (empty($email)) {
      return $error = "Email is required";
    }
  }

  private function validatePassword($password)
  {
    $error = null;

    if (empty($password)) {
      return $error = "Email is required";
    }
  }


  public function login()
  {
    $method = $_SERVER["REQUEST_METHOD"];

    // Validate method is GET to show the form
    if ($method == "GET") {
      require "src/views/LoginView.php";
      return;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email
    $error = $this->validateEmail($email);
    if ($error != null) {
      require "src/views/LoginView.php";
      return;
    }

    // Validate password
    $error = $this->validatePassword($password);
    if ($error != null) {
      require "src/views/LoginView.php";
      return;
    }

    // Validate if the user exits
    $user = $this->model->getUserByEmail($email);
    if ($user == null) {
      $error = "Invalid credentials.";
      require "src/views/LoginView.php";
      return;
    }

    // Verify password
    if (!password_verify($password, $user["password"])) {
      $error = "Invalid credentials.";
      require "src/views/LoginView.php";
      return;
    }

    // session
    session_start();
    unset($user["password"]);
    $_SESSION["user"] = $user;
    header("Location: index.php?controller=home&action=show");
  }

  public function register()
  {
    $method = $_SERVER["REQUEST_METHOD"];

    // Validate method is GET to show the form
    if ($method == "GET") {
      require "src/views/RegisterView.php";
      return;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email
    $error = $this->validateEmail($email);
    if ($error != null) {
      require "src/views/RegisterView.php";
      return;
    }

    // Validate password
    $error = $this->validatePassword($password);
    if ($error != null) {
      require "src/views/RegisterView.php";
      return;
    }

    // Validate if the user exits
    $user = $this->model->getUserByEmail($email);
    if ($user != null) {
      $error = "This email is taken";
      require "src/views/RegisterView.php";
      return;
    }

    // Create user
    $result = $this->model->addUser($email, password_hash($password, PASSWORD_BCRYPT));

    // session
    session_start();
    unset($user["password"]);
    $_SESSION["user"] = $this->model->getUserByEmail($email);
    header("Location: index.php?controller=home&action=show");
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header("Location: index.php?controller=login&action=login");
  }
}
