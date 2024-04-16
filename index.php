<?php

// Cargar la configuración y las funciones de la base de datos
// require_once 'src/config.php';
// require_once 'src/db.php';

// Definir el controlador y la acción por defecto si no se proporcionan en la URL
$defaultController = "login";
$defaultAction = "login";

if (!isset($_GET["controller"])) {
  $_GET["controller"] = $defaultController;
}
if (!isset($_GET["action"])) {
  $_GET["action"] = $defaultAction;
}

// Ruta al controlador
$controllerName = ucfirst($_GET["controller"]) . 'Controller';
$controllerPath = 'src/controllers/' . $controllerName . '.php';

// Si el controlador no existe, cargar el controlador por defecto
if (!file_exists($controllerPath)) {
  $_GET["controller"] = $defaultController;
  $controllerName = ucfirst($defaultController) . 'Controller';
  $controllerPath = 'src/controllers/' . $controllerName . '.php';
}

// Cargar el controlador
require_once $controllerPath;
$controller = new $controllerName();

// Verificar si la acción está definida en el controlador
$action = $_GET["action"];

if (!method_exists($controller, $action)) {
  $_GET["action"] = $defaultAction;
}

$controller->$action();