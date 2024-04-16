<?php

session_start();

if (!isset($_SESSION["user"])) {
  header("Location: index.php?controller=login&action=login");
  return;
}