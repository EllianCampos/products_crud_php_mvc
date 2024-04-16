<?php

require "config.php";

try {
  $conn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
} catch (PDOException $e) {
  die("PDO Connection Error: " . $e->getMessage());
}