<?php

class LoginModel
{
  public function getUserByEmail($email)
  {
    require "src/db.php";
    $query = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $query->bindParam(":email", $email);
    $query->execute();

    if ($query->rowCount() == 0) {
      return null;
    }

    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function addUser($email, $password)
  {
    require 'src/db.php';
    $query = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);
    $success = $query->execute();
    return $success;
  }
}
